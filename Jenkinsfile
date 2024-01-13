// Sur jenkins j'execute un script bat pour lancer les tests postman

pipeline {
    agent any
    stages {
        stage('deploy') {
            steps {
                // Envoyer le code source depuis le serveur de build vers le serveur de production
                script {
                    // Copier les fichiers vers le serveur de production
                    sh 'scp -r /var/lib/jenkins/workspace/Automated-Pipeline ubuntu@13.39.51.174:test'
                }
            }
        }

        
    }
}
