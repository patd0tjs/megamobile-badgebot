<?php
session_start();
// save cropped image
if(isset($_POST['image']))
{
	$data = $_POST['image'];

	$image_array_1 = explode(";", $data);


	$image_array_2 = explode(",", $image_array_1[1]);


	$data = base64_decode($image_array_2[1]);

	$image_name = './uploads/' . time() . '.png';

	file_put_contents($image_name, $data);


	$_SESSION['image_name'] = $image_name;	
}

?>