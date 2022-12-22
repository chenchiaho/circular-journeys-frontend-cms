<?php

if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['admin'])) {

  echo "<script>location.href='../home-login/login.php';</script>";

  // header('Location: login.php');
  // exit;
}
