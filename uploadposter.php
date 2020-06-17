<?php

$url_to_image = "";
if(isset($_POST['vidurl']) && !empty($_POST['vidurl'])) {
    $url_to_image = $_POST['vidurl'];
    $url_arr = array("url" => $url_to_image);
}
//$url_to_image = 'https://dev.blanx.de/HardwareID.png';

$ch = curl_init($url_to_image);

$my_save_dir = 'uploads/posters/';
$filename = basename($url_to_image);
$complete_save_loc = $my_save_dir . $filename;

$fp = fopen($complete_save_loc, 'wb');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);


if(file_exists($my_save_dir . $filename))
	echo "File Uploaded Successfully!";
else
	echo "File Couldn't Upload!";
?>