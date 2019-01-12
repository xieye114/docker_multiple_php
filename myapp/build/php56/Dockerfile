FROM devilbox/php-fpm:5.6-mods

# set timezome
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY ./sources.list /etc/apt/sources.list

RUN apt-get update \
 && apt-get upgrade -y \
 && apt-get install -y software-properties-common \
 && apt-get install -y git \
			vim \
			wget \
			zip \
			unzip \
			redis-server \
			mysql-client \
			memcached  
 

			
ENV COMPOSER_HOME /root/composer
WORKDIR	/usr/local/bin
RUN  curl -s http://getcomposer.org/installer | php \
 &&  chmod a+x composer.phar \
 &&  ln -s /usr/local/bin/composer.phar /bin/composer \
 &&  composer config -g repo.packagist composer https://packagist.laravel-china.org
 
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH

WORKDIR /var/www

 