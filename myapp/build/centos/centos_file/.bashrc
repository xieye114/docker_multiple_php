alias rm='rm -i'
alias cp='cp -i'
alias mv='mv -i'

# Source global definitions
if [ -f /etc/bashrc ]; then
        . /etc/bashrc
fi


alias cdd='cd /var/www/goquery'

PS1='[\u@centos in docker \W]\$ '



timedatectl set-timezone Asia/Shanghai
localectl set-locale LANG=zh_CN.utf8

cp -r /root/ssh /root/.ssh
chmod 755 /root/.ssh
chmod 644 /root/.ssh/id_rsa.pub
chmod 600 /root/.ssh/id_rsa

export PATH="$HOME/.yarn/bin:$HOME/.config/yarn/global/node_modules/.bin:$PATH"
yarn config set registry https://registry.npm.taobao.org

systemctl start php72-php-fpm
systemctl start redis
systemctl start nginx
systemctl start crond
systemctl start ntpd
# systemctl start supervisord




