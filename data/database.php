<?php

// define("DB_SERVER", "localhost");
// define("DB_USER", "drugchec_admin");
// define("DB_PASSWORD", "drugchec_3EN");
// define("DB_NAME", "drugchec_database");

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "drugs");

$db = mysqli_connect(DB_SERVER, DB_USER,DB_PASSWORD, DB_NAME);
confirm_db_connect();

function db_disconnect($db) {
  if (isset($db)) {
    mysqli_close($db);
  }
}

function confirm_db_connect() {
  if(mysqli_connect_errno()) {
    $msg = "Database connection Failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ") ";
    exit($msg);
  }
}

function confirm_result_set($result_set) {
  if(!$result_set) {
    exit("Database query failed. ");
  }
}

 ?>
