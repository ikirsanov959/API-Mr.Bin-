<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<h2>Инфа по карте:</h2>
<?php
$data = ["fullBin" => trim(htmlspecialchars(strip_tags($_POST["fullBin"])))];
$data_string = json_encode ($data, JSON_UNESCAPED_UNICODE);
$curl = curl_init('https://mrbin.io/bins/bin/getFull');
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
// Принимаем в виде массива. (false - в виде объекта)
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Basic bXJiaW5pbzp0ZXN0X21yYmluaW8=',
   'Content-Length: ' . strlen($data_string))
);
$result = curl_exec($curl);
$array = json_decode($result, true);
curl_close($curl);
echo '<pre>';
print_r($array); 
echo '</pre>';
?>
 
 
 
 
 
