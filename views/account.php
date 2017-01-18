<div class="container">
	<div class="row">

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header nav">
						<img src="../public/img/profile.png"/>
						<h4 class="nav-text"><?php echo $_SESSION['username'] ?></h4>
						<h4 class="nav-text">| #Notes: <?php echo $_SESSION['notes_count'] ?></h4>
						<div class="nav-buttons">
							<a href="index.php"><button class="btn btn-primary">Dashboard</button></a>
							<a href="logout.php"><button class="btn btn-danger">Logout</button></a>
						</div>
				</div>
			</div>
		</nav>

		<div class="account">
			<form class="account" method="POST" action="account.php">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username'] ?>" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" id="password" name="password" placeholder="New password">
				</div>
				<button type="submit" class="btn btn-success">Save</button>
			</form>
			<?php if(isset($notice)){ ?>
				<span class="label label-warning" style="font-size: 13px"><?php echo $notice ?></span>
			<?php } ?>
		</div>

	</div>
</div>