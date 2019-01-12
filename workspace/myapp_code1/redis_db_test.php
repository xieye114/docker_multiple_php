<?php


header("Content-type: text/html; charset=utf-8");

echo "<h1>this is app1</h1>";		


$redis = Sys::getredis();
$redis->set('aa',1234);
echo $redis->get('aa');
echo "<br>上面一行显示1234,表示redis连接正确。";

echo "<h1>下面是数据库信息</h1>";		
$db = Sys::getdb();
$sql="show databases";
$arr = $db->query($sql)->fetch_all(MYSQLI_ASSOC);  

var_dump($arr);
		
class Sys
{
	
    /**
     * 得到redis
     * @return \Redis
     */
    public static function getredis()
    {
        static $redis = null;
        if ($redis == null) {
            $redis = new \Redis();
            $redis->connect('redis-db','6379');
            
        }
        return $redis;
    }
	
	
	public static function getdb(){
		  $mysqli = new mysqli('mysql-db', 'root', 'root', 'myapp');  
        $sql="set names utf8";  
        $mysqli->query($sql);  
		return $mysqli;
	}
}

