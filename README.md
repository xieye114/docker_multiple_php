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


## 安装 docker-compose 项目
1. 域名映射
修改hosts文件
~~~
192.168.99.100 www.d1.com
192.168.99.100 www.d2.com
~~~
这里的重点是：每个域名对应的是nginx的一个虚拟主机。

2. 安装好docker toolbox，
3. 设置好docker镜像加速器。
4. 下载项目
c盘根目录下，
执行
~~~
git clone https://github.com/xieye114/docker_multiple_php.git code
~~~
然后就可以删除.git这个隐藏文件夹了。

5. 安装共享目录
然后，
   在虚拟机里设置目录code，对应windows下的c盘的code目录。然后重启虚拟机。
   设置共享目录可以打开virtualbox进行设置，其余都可以使用命令
~~~   
docker-machine stop
docker-machine start
docker-machine ssh # 这个命令进入docker环境。
~~~
 6. 安装docker-compose  
  进入docker环境

    sudo curl -L https://get.daocloud.io/docker/compose/releases/download/1.22.0/docker-compose-`uname -s`-`uname -m` > /code/docker-compose

    sudo chmod +x  /code/docker-compose

之所以放这个目录，是因为docker-toolbox好像每次重启虚拟机，都会重置。所以放共享目录最保险。

7. 安装镜像
~~~
cd /code/myapp/build
docker-cmopose build
~~~
这个过程会执行很长时间，主要是在php那里。

8. 启动容器
~~~   
   docker-cmopose up -d
~~~
9. 验证
打开浏览器，分别输入
~~~
http://www.d1.com/index.php
http://www.d2.com/index.php
~~~
应该能看见不同版本的phpinfo。至此环境搭建完毕。
~~~
http://www.d1.com/redis_db_test.php
http://www.d1.com/redis_db_test.php
~~~
验证redis和mysql，访问成功。
其中mysql和redis的数据都保存在windows上，就算容器关闭，下次再打开，数据依然保留。
其实和windows下直接安装mysql效果完全一样。

另外，d1.com和d2.com，分别访问的是不同的项目。








