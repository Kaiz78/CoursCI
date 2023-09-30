pipeline {
    agent any

    stages {
        stage('Verify version') {
            steps {
                // Récupérer le code source depuis Gits
                sh 'php --version'
            }
        }

        stage('test') {
            steps {
                // Exécuter Composer pour installer les dépendances
                sh php test.php
            }
        }

        
    }

}
