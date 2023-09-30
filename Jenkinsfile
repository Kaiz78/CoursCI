pipeline {
    agent any

    stages {
        stage('Verify version') {
            steps {
                // Récupérer le code source depuis Gits
                 php --version
            }
        }

        stage('test') {
            steps {
                // Exécuter Composer pour installer les dépendances
                 php test.php
            }
        }

        
    }

}
