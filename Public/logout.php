<?php require_once('../Private/initialize.php') ?>
<?php

  unset($_SESSION['user_id']);
  unset($_SESSION['user_name_user']);
  unset($_SESSION['last_user_login']);
  session_destroy();

  redirect_to(url_for('/public/index.php'));




 ?>
