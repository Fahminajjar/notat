<?php

require("../includes/config.php"); 

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	$user = query("SELECT username FROM users WHERE id = ? LIMIT 1", $_SESSION['id'])[0];
	// $notes_count = query("SELECT COUNT(*) FROM notes WHERE user_id = ?", $_SESSION['id'])[0]['COUNT(*)'];

	render("account.php", ["title" => "Account", "user" => $user, "notes_count" => $notes_count]);

}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];

	if(empty($username)){
		render("account.php", ["title" => "Account", "notice" => "Username is empty!"]);
	}else{
		$q = false;
		if(empty($password)){
			$q = query("UPDATE users SET username = ? WHERE id = ?", $username, $_SESSION['id']);
		}else{
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$q = query("UPDATE users SET username = ?, password = ? WHERE id = ?", $username, $hash, $_SESSION['id']);
		}
		if($q){
			$user = ["username" => $username];
			$_SESSION['username'] = $username;
			render("account.php", ["title" => "Account", "user" => $user, "notice" => "Account updated successfully!"]);
		}else{
			apologize("Something went wrong!");
		}
	}
}

?>