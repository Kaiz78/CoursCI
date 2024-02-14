// Sur jenkins j'execute un script bat pour lancer les tests postman

pipeline {
    agent any
   
    stages {
        stage('deploy') {
            steps {
                // Envoyer le code source depuis le serveur de build vers le serveur de production
                script {
                    echo 'Avant la commande scp'
                    bat 'ssh amine@ns3173836.ip-51-195-234.eu'
                    
                }

            }
        }

        
    }
}
