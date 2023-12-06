<?php

class Curl{

	private $api_url;

    public function __construct($hosts){
        $this->api_url = $hosts;
    }

    /**
     * REQUETTE HTTP GET
     * @param String $url = $http->api_url + 'products'
    */
    public function get($url){
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // --------------- FOR DEV (webteam) ---------------- \\
        // curl_setopt($ch, CURLOPT_USERPWD, "loic:loiclenoob");
        // --------------- FOR DEV (webteam) ---------------- \\
        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $result = json_decode($output); 
 
        return json_decode(json_encode($result), true);
    }

    /**
     * Requette HTTP POST
     * @param Array $params = array("name" => "🍏✨","sku"=>"ia")
    */
    public function post($url, $params){
        $ch = curl_init();
        
        // Vérifie s'il est de type array
        if(gettype($params) === "array"){
            $params = json_encode($params);
        }
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // curl header envoi data en json 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params))
        );
        $output = curl_exec($ch);

        curl_close($ch);
        $result = json_decode($output);
        return $result;
    }
}


?>