// Sur jenkins j'execute un script bat pour lancer les tests postman

pipeline {
    agent any

    tools {nodejs "nodejs"}
    
    stages {
        stage('deploy') {
            steps {
                // Envoyer le code source depuis le serveur de build vers le serveur de production
                script {
                    echo 'Avant la commande scp'
                    sh 'npm config ls'
                    echo 'Après la commande scp'
                }

            }
        }

        
    }
}
