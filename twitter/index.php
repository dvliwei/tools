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

$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';


$twitter = new TwitterAPIExchange($settings);
var_dump($twitter);
echo $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();