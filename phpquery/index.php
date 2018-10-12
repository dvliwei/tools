<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/10/11
 * Time: 上午10:31
 */
require __DIR__ . '/../vendor/autoload.php';
include_once "simple_html_dom.php";

$str = file_get_contents('file:///Users/liwei/Downloads/index.html');

//$reg='|js_2">(.*.)<script>|i';
//if(preg_match($reg , $str, $matches)){
//    $str = $matches[1];
//}
//if(preg_match_all($reg , $str , $matches)){
//    var_dump($matches);
//}
//exit;


$reg='|"permalink":"([^"]+)|is';
preg_match_all($reg , $str,$matches);

foreach ($matches[1] as $match){
    echo $match."\n";
}
exit;
$str = preg_replace( "|<style(.*?)</style>|is", "", $str );
//$reg ="|m-timeline-cover-section|";
//preg_match($reg , $str,$matches);
//var_dump($matches);
//exit;
$html= new simple_html_dom();
$html->load($str);

foreach ($html->find("a._5pcq") as $item){
    $href = 'https://www.facebook.com'.$item->href ."\n";

    echo $href;

}
exit;

phpQuery::newDocumentHTML($str);

$companies = pq('div#js_5 div#pagelet_timeline_main_column ._1xnd ._4-u2 a');
foreach($companies as $company)
{
    echo $company;
}

exit;
//echo pq("title")->text();
//exit;
$items = pq("div#m-timeline-cover-section:eq(0)")->html();
var_dump($items);
foreach ($items as $item){
    $url = $item->getAttribute("role");
    var_dump($url);
//    $img = pq($item)->find("a img:eq(0)")->attr("src");
//    echo $img."\n";
}


