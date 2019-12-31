FROM centos:7.4.1708

WORKDIR /root

RUN yum install -y wget yum-utils epel-release \
  && wget -O /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo \
  && wget -O /etc/yum.repos.d/epel.repo http://mirrors.aliyun.com/repo/epel-7.repo \
  && yum clean all \
  && yum install -y https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm \
  && yum-config-manager --enable remi-php72 \
  && yum-config-manager --setopt=remi-php72.baseurl=https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/7/php72/`arch`/ --save \
  && yum install -y nginx php72 redis zip unzip p7zip rsync crontabs vim ntp supervisor

RUN curl --silent --location https://rpm.nodesource.com/setup_10.x | bash - \
  && yum install -y nodejs \
  && curl --silent --location https://dl.yarnpkg.com/rpm/yarn.repo | tee /etc/yum.repos.d/yarn.repo \
  &&  yum install -y yarn

RUN yum install -y php72-php-devel  php72-php-fpm  php72-php-mbstring php72-php-memcache php72-php-redis  php72-php-mysqli php72-php-mysqlnd \
  && yum install -y php72-php-pdo  php72-php-bcmath php72-php-dom php72-php-gd php72-php-gmp php72-php-igbinary php72-php-imagick \
  && yum install -y  php72-php-mcrypt  php72-php-pdo_mysql php72-php-posix php72-php-simplexml  php72-php-opcache php72-php-xsl \
  && yum install -y php72-php-xmlwriter php72-php-xmlreader php72-php-xml php72-php-swoole php72-php-zip php72-php-phalcon php72-php-yaml \
  && ln -s /usr/bin/php72 /usr/bin/php \
  && sed -i 's/user\ =\ apache/user\ =\ nginx/g' /etc/opt/remi/php72/php-fpm.d/www.conf \
  && sed -i 's/group\ =\ apache/group\ =\ nginx/g' /etc/opt/remi/php72/php-fpm.d/www.conf 
  
  
RUN yum install -y mariadb \
  && curl https://setup.ius.io | sh \
  && yum remove -y git \
  && yum install -y git2u \
  && git config --global core.autocrlf false \
  && git config --global core.safecrlf false \
  && git config --global user.name 'test' \
  && git config --global user.email 'test@qq.com' \
  && curl -s http://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/ \
  && chmod a+x /usr/local/bin/composer.phar \
  && ln -s /usr/local/bin/composer.phar  /usr/local/bin/composer \
  && composer config -g repo.packagist composer https://packagist.laravel-china.org 

EXPOSE 80 443 6379



	
	
