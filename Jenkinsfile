// Sur jenkins j'execute un script bat pour lancer les tests postman

pipeline {
    agent any
   
    stages {
        stage('deploy') {
            steps {
                // Envoyer le code source depuis le serveur de build vers le serveur de production
                script {
                    echo 'Avant la commande scp'
                     withCredentials([string(credentialsId: 'password-preprod', variable: 'MOT_DE_PASSE_SUDO')]) {
                        bat 'plink -ssh  -l amine -pw ${MOT_DE_PASSE_SUDO}  -hostkey SHA256:QKBTBLa9aqO+BM1UciloehOEpEPoOfpNVEUZlJLaNPg ns3173836.ip-51-195-234.eu "echo \'${MOT_DE_PASSE_SUDO}\' | sudo -S mv dist /var/www/html"'
                     }
                }

            }
        }

        
    }
}
