<?php
	include('assets/php/password.php');
	$password = $_POST["password"];
	$id = $_POST["id"];
	
	$db = new PDO("mysql:dbname=webapp; host=localhost", "root", "root");
	$id = $db -> quote($id);
	$db_pw = $db -> query("SELECT password FROM Answer WHERE id=$id");
	foreach($db_pw as $pw){
		$origin_pw = $pw["password"];
	}

	if((string)$password == $origin_pw){
		$db -> exec("DELETE FROM Answer WHERE id=$id");
		header('Location:qna-slide.php');
	}
	else{
		header('Location:alert.php');
	}
?>