<?php
// index controller

// configuration
require("../includes/config.php"); 

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	
	$notes = query("SELECT * FROM notes WHERE user_id = ?", $_SESSION['id']);
	
	print(json_encode($notes));
	
}else if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$data = json_decode(file_get_contents('php://input'), true);

	query("INSERT INTO notes(content, user_id) VALUES(?, ?)", $data['note'], $data['user_id']);
	
	$notes = query("SELECT * FROM notes WHERE user_id = 1;");
	print(json_encode($notes));
	
}else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
	query("DELETE FROM notes WHERE id = ?", $_GET['id']);
}

?>
