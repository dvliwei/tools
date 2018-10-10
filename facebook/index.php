<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/10/10
 * Time: 下午2:06
 */


$link = urldecode($_GET['url']);

require __DIR__ . '/../vendor/autoload.php';


$redis = new \Predis\Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
]);

$key = "www.facebook.com".sha1($link);
//$redis->setex('xxxxxxx', 7200,"aaaa");
//
//echo $redis->get('xxxxxxx');




use JonnyW\PhantomJs\Client;

if(!$redis->exists($key)){
    //require_once("../vendor/jonnyw/php-phantomjs/src/JonnyW/PhantomJs/Client.php");
//$client = Client:
    $client = Client::getInstance();

    $client->getEngine()->setPath("/opt/onemena/wwwroot/mobibookapp.com/project_web_tools/bin/linux/phantomjs");
//$client->getEngine()->setPath("/Applications/MAMP/htdocs/project_web_tools/bin/mac/phantomjs");
    $client->isLazy(); // 让客户端等待所有资源加载完毕

    $request  = $client->getMessageFactory()->createRequest();
    $response = $client->getMessageFactory()->createResponse();
    $request->setTimeout(5000); // 设置超时时间(超过这个时间停止加载并渲染输出画面)

//$link = "https://www.facebook.com/AmrDiabsLovers/";
//设置请求方法
    $request->setMethod('GET');
//$request->setHeaders(["user-agent"=>"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36"]);
//$request->getEngine()->addOption('--cookies-file=cookies.txt');

//设置请求连接
    $request->setUrl($link);
//发送请求获取响应
    $client->send($request, $response);

    if($response->getStatus() === 200) {
        //输出抓取内容
        $str =base64_encode(gzdeflate($response->getContent()));
        $redis->setex($key, 3600,$str);
        //获取内容后的处理
    }
}else{
    $str = $redis->get($key);
}

echo $str;