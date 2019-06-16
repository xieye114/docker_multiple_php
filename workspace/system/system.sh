#!/bin/bash

echo "config start ..\n"
timedatectl set-timezone Asia/Shanghai
localectl set-locale LANG=zh_CN.utf8


systemctl start php72-php-fpm
systemctl start redis
systemctl start nginx

systemctl start crond
systemctl start ntpd





echo "all ok\n"
