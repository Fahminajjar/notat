<div class="container">
	<div class="row">

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header nav">
						<img src="../public/img/profile.png"/>
						<h4 class="nav-text"><?php echo $_SESSION['username'] ?></h4>
						<h4 class="nav-text">| #Notes: <?php echo $_SESSION['notes_count']; ?></h4>
						<div class="nav-buttons">
							<a href="account.php"><button class="btn btn-primary">Account</button></a>
							<a href="logout.php"><button class="btn btn-danger">Logout</button></a>
						</div>
				</div>
			</div>
		</nav>

		<form class="form-inline new-note" action="index.php" method="POST">
			<textarea class="form-control" name="content" rows="2" style="width:400px;" required></textarea>
			<input class="btn btn-success" type="submit" name="submit" value="Add" style="height:50px"/>
		</form>

		<?php if(count($notes) == 0){ ?>
		<center><h3 style="margin-top:40px; margin-bottom:40px; color:#337AB7">There is no notes, add your first note now!</h3></center>
		<?php }else{ ?>

		<div class="cards">

			<?php for($i = 0; $i < count($notes); $i++){ ?>
			<div class="card" id="<?php echo $notes[$i]['id'] ?>" style="background-color: <?php echo $notes[$i]['color'] ?>">
				<a href="delete_note.php?id=<?php echo $notes[$i]['id'] ?>"><div class="exitButton"><img src="../public/img/x.png" style="width:10px; height:10px"/></div></a>
				<div class="note"><?php echo $notes[$i]['content'] ?></div>
				<div class="lowerOptions">
					<div class="optionButtonsBox" id="<?php echo $notes[$i]['id'] ?>">
						<div class="optionButtons" id="red"></div>
						<div class="optionButtons" id="green"></div>
						<div class="optionButtons" id="blue"></div>
					</div>
				</div>
			</div>
			<?php } ?>

		</div>

		<?php } ?>

	</div>
</div>