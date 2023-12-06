<?php

setlocale(LC_ALL, 'fr_FR.utf8');

const SUPER_ADMIN_ID = 0;
const ROOT_PATH = __DIR__ . '/../';
define('CFG_PATH', realpath(ROOT_PATH.'/application/config'));
define('WWW_PATH', realpath(ROOT_PATH.'/application/www'));
define('URL_SITE', 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 's' : '') . '://' . preg_replace('#/$#', '', $_SERVER['SERVER_NAME']) . '/' . str_replace('/cron', '', preg_replace('#^/#', '', preg_replace('#/index.php.*$#i', '', dirname($_SERVER['PHP_SELF'])))) . '/');
define('DIR_LIBRARY', str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) . 'application/www/library/');
define('DIR_ASSETS', str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']) . 'application/www/assets/');
define('DIR_PHP_EXCEL', realpath(ROOT_PATH.'/library/PHPExcel') . '/');
define('DIR_XLSXWRITER', realpath(ROOT_PATH.'/library/xlsxwriter') . '/');
define('DIR_CLASSES', realpath(ROOT_PATH.'/application/classes') . '/');
define('DIR_EXTRACTS_VOLUMINOUS', realpath(ROOT_PATH.'/application/www/library/extract/voluminous') . '/');

const DIR_IMG = DIR_ASSETS . 'images/';
const DIR_CSS = DIR_ASSETS . 'css/';
const DIR_JS = DIR_ASSETS . 'js/';
const TYPES_ENTRY_TRANSFER = 1;
const TYPES_ENTRY_PURCHASE = 2;
const TYPES_ENTRY_SALE = 3;
const TYPES_ENTRY_ADJUSTMENT = 4;
const TYPES_ENTRY_RETURN = 5;
const TYPES_ENTRY_INIT = 6;
const SHOP_ID_TRANSPORTER = 1;

require_once '../library/Configuration.class.php';
$load = new Configuration();
$load->load('library');

require_once '../library/Database.class.php';
require_once '../library/FrontController.class.php';

require_once '../library/Http.class.php';
require_once '../library/MicroKernel.class.php';
require_once '../library/lessphp/lessc.inc.php';
//geoloc
/*require_once('./library/geoloc/geoip.inc');
require_once('./library/geoloc/geoipcity.inc');*/

/*//TCPDF
require_once './library/tcpdf/tcpdf.php';

// TFPDF
require_once './library/tfpdf/tfpdf.php';*/

// PHPMailer
require_once '../library/PHPMailer/PHPMailer.class.php';
require_once '../library/PHPMailer/PHPMailerAutoload.php';
require_once '../library/PHPMailer/POP3.class.php';
require_once '../library/PHPMailer/SMTP.class.php';

// // Include all classes
$classes = scandir(__DIR__ . "/../application/classes");
foreach ($classes as $class) {
     if($class == "PDF_Invoice.class.php"){
        //  echo $class ;die;
        continue;
     } 
        
    
    if (strpos($class, ".class.php") !== false ) {
        include_once(__DIR__ . "/../application/classes/" . $class);
    }
}
// // Include all models
$models = scandir(__DIR__ . "/../application/models");
foreach ($models as $model) {
    if (strpos($model, ".class.php") !== false)  {
        include_once(__DIR__ . "/../application/models/" . $model);
    }
}

$http = new Http();

// Test HomeController

$http = new Http();

// Reecrite la fonction sendJsonResponse

function sendJsonResponse($data,$i){
    echo "Test".$i ;
    echo "<pre>";var_dump($data);echo "</pre>";
    echo "<br>";
}


// Fonction boucle pour tester plusieurs fois la fonction 
function TestFunctionMultiple($formFields, $functionTest){
    for($i=0;$i<count($formFields);$i++){
        $functionTest($formFields[$i],$i);
    }
}



// Fonction à tester
// Fonction HomeControllerPost
function HomeControllerPost($formFields,$i = null){
    if($i == null){
        $i = 0;
    }
    $preOrdersModel = new PreOrdersModel();
    $top_products = $preOrdersModel->statBestProducts(Date("Y-m-d"));

    if(isset($formFields['view']) && $formFields['view'] == "monthly"){
        $top_products = $preOrdersModel->statBestProducts(Date("Y-m"));    
    }

    sendJsonResponse(["top_products" => $top_products],$i);
}


// Paramètres à tester
$formFields = [
    [
    "view" => "monthly"
    ],
    [
    "view" => "monthlys"
    ],
    [
    "vie" => "monthlys"
    ],
    [
    ],
    [
    "view" => "monthly"
    ],
    [
    "view" => "monthlys"
    ],
    [
    "vie" => "monthlys"
    ],
    [
    ]
];



TestFunctionMultiple($formFields, 'HomeControllerPost');


// Fonction HomeControllerPost
function HomeControllerGet($queryFields,$i) {
    $preOrdersModel = new PreOrdersModel();
    $preOrdersProductsModel = new PreOrdersProductsModel();
    //        $parcelsModel = new ParcelsModel();
    $packingListsModel = new PackingListsModel();
    //$preOrders = $preOrdersModel->getPreOrders(5);
    $ruptedProductsHistoryModel = new RuptedProductsHistoryModel();
    // Ajout de l'heure pour cibler la nuit lors de la recherche fait cette nuit
    $date_stats = Date("Y-m-d", strtotime("-1 days"));
    $stat_pre_orders = $preOrdersModel->getStatPreproductsCount($date_stats . " 2");
    $topRupted = $ruptedProductsHistoryModel->getTopRupted(Date("Y-m-d"));

    $shopsModel = new ShopsModel();
    $shops = $shopsModel->getShopsList(['ACCEPTED']);

    $productsToGroupModel = new ProductsToGroupModel();
    $productsTotal = $productsToGroupModel->getReferencingProductList(null, null, null, null, null, true, true);

    $widgetGlobalGenericModel = new WidgetGlobalGenericModel();
    $sources = ["GDT", "MOOD"];
    $indicators = [];
    foreach($sources as $source){
      $result = $widgetGlobalGenericModel->getWidgetGlobalByDate(Date("Y-m-d"), $source);
      if($result){
        $indicators[] = $result;
      }

    }

    $month = 
    [
        "Janvier" => "January", 
        "Février" => "February",
        "Mars" => "March",
        "Avril" => "April",
        "Mai" => "May",
        "Juin" => "June",
        "Juillet" => "July",
        "Août" => "August",
        "Septembre" => "September",
        "Octobre" => "October",
        "Novembre" => "November",
        "Décembre" => "December"
    ];

    $month_now =  array_search(Date('F'), $month);
    $top_products = $preOrdersModel->statBestProducts(Date("Y-m-d"));

    // vue mensuel
    if(isset($queryFields['view']) && $queryFields['view'] == "monthly"){
        $stat_pre_orders = $preOrdersModel->getStatPreproductsCount(Date("Y-m"));
        $topRupted = $ruptedProductsHistoryModel->getTopRupted(Date("Y-m"));
        $top_products = $preOrdersModel->statBestProducts(Date("Y-m"));    

    }

    // Vérification des commandes en cours de livraison
    $pre_orders_id_list = $preOrdersModel->getPreOrdersIdListInProgress(false, true, 10);
    $date_now_timestamp = strtotime(date('Y-m-d'));
    $pre_orders = [];
    
    if($pre_orders_id_list){
        foreach ($pre_orders_id_list as $pre_order_id) {
            $pre_order = $preOrdersModel->getPreOrdersById($pre_order_id);

            $pre_order['whishes_delivery_date'] = date('Y-m-d H:i:s', strtotime($pre_order['date_purchased'] . ' +2 days'));

            $whishes_delivery_date_timestamp = strtotime($pre_order['whishes_delivery_date']);
            $pre_order['day_late'] = (float)(round(($date_now_timestamp - $whishes_delivery_date_timestamp) / 24 / 3600, 0) + 1);
            $products_list = $preOrdersProductsModel->getPreOrderProductList($pre_order_id);
            $pre_order['count_products_list'] = count($products_list);
            
            $pre_order['tracking_numbers'] = [];

            // Si date de livraison prévue > today
            if ($date_now_timestamp >= $whishes_delivery_date_timestamp) {
                $packingLists = $packingListsModel->searchPackingListsByCriteria($pre_order_id)['data'] ?? [];
                
                foreach ($packingLists as $packing) {
                    if (!empty($packing['package_tracking_number'])) {
                        $pre_order['tracking_numbers'][$packing['package_tracking_number']] = ($packing['package_tracking_url'] ?? null);
                    }
                }
                
                $pre_orders[] = $pre_order;
            }
        }

    }  
        $moduleModel = new ModuleModel();
        $module = $moduleModel->getModuleByName("dashbord");   
        
       

    sendJsonResponse([ 
        "stat_pre_orders" => $stat_pre_orders,
        "topRupted" => $topRupted,
        "total_shops" => count($shops),
        "month_now" => $month_now,
        "pre_orders_delay" => $pre_orders,
        "total_products" => $productsTotal,
        "queryFields" => $queryFields,
        'top_products' => $top_products,
        'indicators' => $indicators,
        "module" => $module,
        "pre_orders_id_list" => implode(',', $pre_orders_id_list),
        "HEAD_JS" => ["plugins/velocity/velocity.min.js","plugins/velocity/velocity.ui.min.js","plugins/visualization/echarts/echarts.js"],
        "JS" => ['home.js'],
        "CSS" => ['home.css']
    ],$i);

}


$queryFields = [
    ["view" => "monthly"],
    ["vi" => "monthly"],
];
$i= 0;
TestFunctionMultiple($queryFields, 'HomeControllerGet');



?>