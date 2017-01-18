<!DOCTYPE html>

<html>
	<head>
		<?php if (isset($title)): ?>
    	<title>Notat App - <?= htmlspecialchars($title) ?></title>
    <?php else: ?>
			<title>Notat App</title>
    <?php endif ?>
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../public/css/style.css">
		
		 <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>		
	</head>
	
	<body>
		<div class="header">
      <center><h1 id="logo">Notat App</h1></center>
    </div>

    <div id="middle">