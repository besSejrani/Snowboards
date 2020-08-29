pipeline {
    
agent {
        node {
            label 'master'
        }
    }
    
stages {
        stage('Download') {
            steps {
                git 'https://github.com/besSejrani/Snowboards.git'
            }
        }

        stage('Building') {
            steps {
                sh label: '', script: 'mvn compile'
            }
        }
        
        stage('Testing') {
            steps {
                sh label: '', script: 'mvn verify'
            }
        }
    }
}