pipeline {
    agent any
    stages{
        stage("Clone Code"){
            steps{
                git url: "https://github.com/Kaiz78/CoursCI", branch: "main"
            }
        }
        stage("Build Project") {

            steps{
               sh "mv dist/  react/" 
               sh "rsync -av dist ubuntu@52.47.136.150:/var/www/html/"
            }
        }
        // stage("Deploy Project") {
        //     steps{
        //        // rename dist folder 
        //         sh "mv dist/  react/" 
        //        sh "rsync -av dist ubuntu@52.47.136.150:/var/www/html/"
        //     }
        // }

    }
}




