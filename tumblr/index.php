<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/10/12
 * Time: 下午4:27
 */

require __DIR__ . '/../lib/Tumblr/Client.php';


$consumerKey='xzec9Nq2su5lKz2poawVIyVDWgQYM1sFJTE5svDd4CT7b67s3d';
$consumerSecret = 'PYUeWJmSmWCpdHnIXn40p10MbwPp06KHVLTGiKAvlWS0xK620h';
$token='jtJbuDL90L4FhIucHI11BZHdCCLu99BLkLeWxu6BjvLMfMR767';
$secret = 'kiMt6Xstntq7lUiUIxhclviHRXdkXd5IFobKqqIpOWGG0nC2ON';


$client = new Tumblr\API\Client($consumerKey, $consumerSecret,$token,$secret);


foreach ($client->getUserInfo()->user->blogs as $blog) {
    echo $blog->name . "\n";
}
