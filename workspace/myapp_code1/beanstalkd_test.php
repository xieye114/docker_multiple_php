<?php

require_once( __DIR__ . '/vendor/autoload.php' );
use Pheanstalk\Pheanstalk;



header("Content-type: text/html; charset=utf-8");

echo "<h1>this is app1</h1>";		



$beanstalkd =Sys::get_beanstalkd();

//这是消息数据
$delay=0;
$data=['a'=>66,'time'=>time() ];
$queue_name ="q1";
// 把消息放入队列,1024 是优先级
//$delay 非常重要，假设设置10，则该消息10秒后才被放入队列！非常好使。
$beanstalkd->useTube( $queue_name  )
            ->put(serialize($data), 1024, $delay);

echo "<br>现在已经往队列插入一条数据，是 ". serialize($data);


echo "<h1>下面是从队列取出一条数据，数据是：</h1>";		


$job = $beanstalkd->watch( $queue_name )->ignore('default')->reserve();
$job_data =  $job->getData() ;
var_dump( unserialize( $job_data ));

echo "<br><br>如果看到数据，说明队列服务端和客户端全部安装成功";

//删除千万不能忘记。
$beanstalkd->delete($job);

class Sys
{
	
    /**
     * 
     * @return 
     */
    public static function get_beanstalkd()
    {
        $beanstalkd = new Pheanstalk('beanstalkd','11300');
        return $beanstalkd;    
    }
	
	
	
}

