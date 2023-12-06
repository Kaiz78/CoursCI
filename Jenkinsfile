pipeline {
    agent any

    stages {
        stage('Verify version') {
            steps {
                // Récupérer le code source depuis Gits
                 bat 'php --version'
            }
        }

        stage('launch test') {
            steps {
                // Exécuter Composer pour installer les dépendancess
                bat 'cd test '
                bat 'newman run tests_postman.json -e environment.json' 
            }
        }

        
    }

}
