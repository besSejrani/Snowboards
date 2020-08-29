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
        sh 'echo "Building hello world"'
      }
    }

    stage('Testing2') {
      steps {
        sh 'echo "Testing hello world"'
      }
    }

    stage('Test Environment variable') {
      steps {
        sh 'echo $test'
      }
    }
  }
  
  environment {
    test = 'hello from env'
    
  }
}