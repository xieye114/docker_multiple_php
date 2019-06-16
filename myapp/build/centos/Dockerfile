FROM centos:7.4.1708

WORKDIR /var/www

RUN timedatectl set-timezone Asia/Shanghai \
  && localectl set-locale LANG=zh_CN.utf8 \
  && yum install -y wget epel-release \
  && yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
  && yum install -y yum-utils \
  && yum-config-manager --enable remi-php72 \
  && yum install -y nginx php72 redis zip unzip rsync crontabs vim ntp \
  && yum install -y php72-php-devel  php72-php-fpm  php72-php-mbstring php72-php-memcache php72-php-redis  php72-php-mysqli php72-php-mysqlnd  php72-php-pdo  php72-php-bcmath php72-php-dom php72-php-gd php72-php-gmp php72-php-igbinary php72-php-imagick   php72-php-mcrypt  php72-php-pdo_mysql php72-php-posix php72-php-simplexml  php72-php-opcache php72-php-xsl php72-php-xmlwriter php72-php-xmlreader php72-php-xml php72-php-swoole php72-php-zip php72-php-phalcon \
  && ln -s /usr/bin/php72 /usr/bin/php \
  && sed -i 's/user\ =\ apache/user\ =\ nginx/g' /etc/opt/remi/php72/php-fpm.d/www.conf \
  && sed -i 's/group\ =\ apache/group\ =\ nginx/g' /etc/opt/remi/php72/php-fpm.d/www.conf \
  && systemctl enable php72-php-fpm \
  && systemctl enable crond \
  && systemctl enable redis \
  && systemctl enable ntpd  \
  && systemctl start ntpd \
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



	
	
