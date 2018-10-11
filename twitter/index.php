<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/10/9
 * Time: 下午4:18
 */
require_once("../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php");

$settings = array(
    'oauth_access_token' => "853900032608575488-1nV6jSnWeSP8D5NigfgZX27D1MSzoPu",
    'oauth_access_token_secret' => "sjILHU0yRBW8zF1BdXCPVAfAsMFmIr2UkparOv58TrS1x",
    'consumer_key' => "LpqOR07ep4YZ9hF8F9ItFl48F",
    'consumer_secret' => "382DgiVxnRuYDm8txoQzi60fcIwwnWaX2XmETEXkJFeniNaIkB"
);

//$url = 'https://api.twitter.com/1.1/followers/ids.json';
//$getfield = '?screen_name=J7mbo';
//$requestMethod = 'GET';

//根据用户名称查询用户信息接口
$url = 'https://api.twitter.com/1.1/users/show.json';
$getfield = '?screen_name=SaudiVision2030';
$requestMethod = 'GET';

//根据关键字搜索推文信息接口
//$url = 'https://api.twitter.com/1.1/search/tweets.json';
//$getfield = '?q=nasa&result_type=popular';
//$requestMethod = 'GET';


//根据推文id获取具体信息包含推文用户信息
//twitter中的回复也是一条推文
//$url = 'https://api.twitter.com/1.1/statuses/show.json';
//$getfield = '?id=1043914454998515712';
//$requestMethod = 'GET';


//更具用户名获取用户最新的推文信息
//$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
//$getfield = '?screen_name=SaudiVision2030&count=6';
//$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);

echo $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();