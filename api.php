<?php


$text = $_GET["text"];
$text1 = str_replace(" ", "+", $text);

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://pandorabots.com/pandora/talk?botid=fd5c287f1e357db6&skin=talk");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "botcust2=e40228de6e6c4188&message=".$text1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "Authority: pandorabots.com";
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Origin: https://pandorabots.com";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$headers[] = "Referer: https://pandorabots.com/pandora/talk?botid=fd5c287f1e357db6&skin=talk";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: en-US,en;q=0.9,id;q=0.8";
$headers[] = "Cookie: botcust2=e40228de6e6c4188";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);curl_close ($ch);
$response = getStr($result,'var elizaresponse= "','";');
$datas = json_encode([
    'your_text' => $text,
    'answer' => $response
    ]);
echo $datas;
