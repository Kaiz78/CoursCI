pipeline {
    agent any

    stages {
        stage('Verify version') {
            steps {
                // Récupérer le code source depuis Gits
                 bat 'php --version'
            }
        }

        stage('test') {
            steps {
                // Exécuter Composer pour installer les dépendances
                 bat 'php test.php'
            }
        }

        
    }

}
