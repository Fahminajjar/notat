<?php

  // requirements
  require("helpers.php");
  require("db.php");

  // enable sessions
  session_start();

  if(!contains($_SERVER['PHP_SELF'], ["/login.php", "/logout.php", "/register.php"])){
    if(empty($_SESSION['id'])){
      redirect('login.php');
    }
  }

?>
