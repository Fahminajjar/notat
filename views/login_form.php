<div class="container form-container">
  <div class="row">

    <form class="form-login" action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
      </div>
      <center><input type="submit" class="btn btn-success" value="Login"/></center>

      <?php if($_GET['notice'] == '1'){ ?>
      <center><h5 style="color:#FF3A3A">Invalid username/password!</h5></center>
      <?php } ?>
    </form>

  </div>
</div>
<center><h3 style="color:white">OR</h3></center>
<center><a href="register.php"><button class="btn btn-success" id="btn-signup">Register</button></a></center>