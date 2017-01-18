<?php

require('../includes/config.php');

if($_SERVER["REQUEST_METHOD"] === "GET"){
	render("login_form.php");
}

elseif($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];

	$user = query("SELECT id, username, password FROM users WHERE username = ?", $username);
	
	if(password_verify($password, $user[0]["password"])){
		$_SESSION['id'] = $user[0]['id'];
		$notes_count = query("SELECT COUNT(*) FROM notes WHERE user_id = ?", $_SESSION['id'])[0]['COUNT(*)'];
		$_SESSION['username'] = $user[0]['username'];
		$_SESSION['notes_count'] = $notes_count;

		redirect("index.php");
	}else{
		redirect("login.php?notice=1");
	}
}

?>