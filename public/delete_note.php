<?php

require("../includes/config.php"); 

if(!isset($_GET['id'])){
	redirect("index.php");
}

query("DELETE FROM notes WHERE id = ? AND user_id = ?", $_GET['id'], $_SESSION['id']);
$_SESSION['notes_count'] -= 1;
redirect("index.php");

?>