pipeline {
  agent {
    node {
      label 'master'
    }

  }

   tools {
    // a bit ugly because there is no `@Symbol` annotation for the DockerTool
    // see the discussion about this in PR 77 and PR 52: 
    // https://github.com/jenkinsci/docker-commons-plugin/pull/77#discussion_r280910822
    // https://github.com/jenkinsci/docker-commons-plugin/pull/52
    docker 'org.jenkinsci.plugins.docker.commons.tools.DockerTool' '18.09'
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

    stage('foo') {

      environment{
        DOCKER_CERT_PATH = credentials('id-for-a-docker-cred')
      }
      steps {
        sh "docker version" // DOCKER_CERT_PATH is automatically picked up by the Docker client
      }
    }
  
  }
  environment {
    test = 'hello from env'
    
  }
}