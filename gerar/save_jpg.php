<?php 
$random = $_POST['nome'];
$savefile = @file_put_contents("imagens/$random.jpg", base64_decode(explode(",", $_POST['data'])[1]));
if($savefile){
	echo $random;
}
?>