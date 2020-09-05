FROM jenkins/jenkins:lts
COPY jenkins.plugins.txt /usr/share/jenkins/ref/plugins.txt
RUN /usr/local/bin/install-plugins.sh < /usr/share/jenkins/ref/plugins.txt
USER root

RUN uname -a && cat /etc/*release

RUN curl -fsSL https://get.docker.com -o get-docker.sh && sh get-docker.sh

RUN apt update \
    && apt install -y sudo \
    && rm -rf /var/lib/apt/lists/*

RUN usermod -a -G root jenkins
RUN usermod -aG docker jenkins

USER jenkins
