<?php

$url_to_image = "";
$raum = "";
if(isset($_POST['raum']) && !empty($_POST['raum'])) {
	$raum = $_POST['raum'];
    //$url_arr = array("url" => $url_to_image);
}
if(isset($_FILES['file']) && !empty($_FILES['file']))
{
	$url_to_image = basename($_FILES["file"]["name"]);
    //echo $url_to_image;
}

//$url_to_image = 'https://dev.blanx.de/HardwareID.png';

//$ch = curl_init($url_to_image);

$my_save_dir = $raum."/";
$final_name = $my_save_dir.$url_to_image;
 if (! is_dir($raum)) {
                mkdir($raum);
}
//echo $final_name;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $final_name)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
             echo "Sorry, there was an error uploading your file.";
            // exit();
          }
// $filename = basename($url_to_image);
// $complete_save_loc = $my_save_dir . $filename;

// $fp = fopen($complete_save_loc, 'wb');

// curl_setopt($ch, CURLOPT_FILE, $fp);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_exec($ch);
// curl_close($ch);
// fclose($fp);


// if(file_exists($my_save_dir . $filename))
// 	echo "File Uploaded Successfully!";
// else
// 	echo "File Couldn't Upload!";
?>