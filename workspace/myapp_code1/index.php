<?php
echo "<h1>app1</h1>";

echo "
<p>
 <a href='redis_db_test.php'>测试数据库和 redis 连接</a>
</p>

";
echo "
<p>
 <a href='beanstalkd_test.php'>测试队列 beanstalkd 连接，请事先 composer install </a>
</p>

";

phpinfo();
