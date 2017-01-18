<?php
// index controller

// configuration
require("../includes/config.php"); 

if($_SERVER['REQUEST_METHOD'] === 'GET'){

	$notes = query("SELECT * FROM notes WHERE user_id = ?", $_SESSION['id']);
	render("index.php", ["title" => "Dashboard", "notes" => $notes]);

}else if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$content = $_POST['content'];

	$q = query("INSERT INTO notes(content, user_id) VALUES(?, ?)", $content, $_SESSION['id']);
	if($q){
		$_SESSION['notes_count'] += 1;
		redirect("index.php");
	}else{
		apologize("Error saving note");
	}

}

?>