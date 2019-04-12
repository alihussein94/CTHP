<?php require_once('../../../private/initialize.php') ?>
<?php

  unset($_SESSION['admin_id']);
  unset($_SESSION['user_name']);
  unset($_SESSION['last_login']);
  session_destroy();

  redirect_to(url_for('/index.php'));




 ?>
