<?php

require("../includes/config.php");

$data = json_decode(file_get_contents('php://input'), true);

query("UPDATE notes SET color = ? WHERE id = ? AND user_id = ?", $data['color'], $data['id'], $_SESSION['id']);

?>