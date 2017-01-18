<?php

require('../includes/config.php');

if($_SERVER["REQUEST_METHOD"] === "GET"){
	render("register_form.php");
}

elseif($_SERVER["REQUEST_METHOD"] === "POST"){
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);

	$user = query("SELECT id FROM users WHERE username = ?", $username);
	if($user){
		apologize("User exist");
	}else{
		$res = query("INSERT INTO users(username, password) VALUES(?, ?)", $username, $hash);
		if($res){
			$user = query("SELECT id FROM users WHERE username = ?", $username);
			$_SESSION['id'] = $user[0]['id'];
			$_SESSION['username'] = $username;
			$_SESSION['notes_count'] = 0;

			redirect("index.php");
		}else{
			apologize("Something went wrong!");
		}
	}

}

?>