<?php require_once('../data/initialize.php') ?>
<?php

  unset($_SESSION['admin_id']);
  unset($_SESSION['user_name']);
  unset($_SESSION['last_login']);
  unset($_SESSION['permission']);
  session_destroy();

  redirect_to(url_for('admin/index.php'));




 ?>
