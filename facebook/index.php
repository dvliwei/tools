<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/10/10
 * Time: 下午2:06
 */

$client = \JonnyW\PhantomJs\Client::getInstance();

$client->getEngine()->setPath("/opt/onemena/wwwroot/mobibookapp.com/project_web_tools/bin/linux/phantomjs");
$client->isLazy(); // 让客户端等待所有资源加载完毕

$request  = $client->getMessageFactory()->createRequest();
$response = $client->getMessageFactory()->createResponse();
$request->setTimeout(5000); // 设置超时时间(超过这个时间停止加载并渲染输出画面)

$link = "https://www.facebook.com/AmrDiabsLovers/";
//设置请求方法
$request->setMethod('GET');

$request->getEngine()->addOption('--cookies-file=cookies.txt');

//设置请求连接
$request->setUrl($link);
//发送请求获取响应
$client->send($request, $response);

if($response->getStatus() === 200) {
    //输出抓取内容
    echo $response->getContent();
    //获取内容后的处理
}