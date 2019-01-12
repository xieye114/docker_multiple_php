# docker_multiple_php
docker创建多版本php共存项目

## blog地址

https://xieye.iteye.com/blog/2436363  
docker创建多版本php共存项目

https://xieye.iteye.com/blog/2425200
上面这个链接是安装docker-toolbox

## 安装环境
windows是宿主机，使用docker-toolbox，镜像加速器请自行百度。

镜像加速器修改位置：
进入docker环境后，

    sudo vi /var/lib/boot2docker/profile

然后

    EXTRA_ARGS='
    --label provider=virtualbox
    --registry-mirror=xxxxx
    '

上面这个xxxxx替换为实际的镜像加速器地址。然后dos命令重启虚拟机。

大概也是如下操作

    docker-machine ssh default 
    sudo sed -i "s|EXTRA_ARGS='|EXTRA_ARGS='--registry-mirror=加速地址 |g" /var/lib/boot2docker/profile 
    exit 
    docker-machine restart default


#### 域名映射
修改hosts文件

192.168.99.100 www.d1.com
192.168.99.100 www.d2.com

这里的重点是：每个域名对应的是nginx的一个虚拟主机。

#### 安装文件
c盘根目录下，
执行

    git clone https://github.com/xieye114/docker_multiple_php.git




#### 验证
打开浏览器，分别输入
http://www.d1.com/index.php
http://www.d2.com/index.php

应该能看见不同版本的phpinfo。至此环境搭建完毕。






