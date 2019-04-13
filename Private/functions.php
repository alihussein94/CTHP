<?php
function url_for($path) {
  if ($path[0] != '/') {
    $path = '/' . $path;
  }
  return WWW_ROOT . $path ;
}

function u($string="") {
  return urlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function request_is_post() {
  return $_SERVER['REQUEST_METHOD'] == 'POST' ;
}

function request_is_get() {
  return $_SERVER['REQUEST_METHOD'] == 'GET' ;
}

function find_all_drugs() {
  global $db;
  $sql = "SELECT * FROM drugs ";
  $sql .= "ORDER BY drug_name ASC";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  return $result_set;

}

function find_one_drug($id) {
  global $db;
  $sql = "SELECT * FROM drugs ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $result = mysqli_fetch_assoc($result_set);
  mysqli_free_result($result_set);
  return $result;

}

function is_blank($value) {
  return !isset($value) || trim($value) === '';
}

function validation($drug) {
  $errors = [];
  if (is_blank($drug['drug_name'])) {
    $errors[] = "Please insert drug name.";
  }
  if (is_blank($drug['dosage_form'])) {
    $errors[] = "Please insert dosage form.";
  }
  return $errors;
}

function admin_validation($admin) {
  $errors = [];
  if (is_blank($admin['username'])) {
    $errors[] = "Please insert user name.";
  }
  if (is_blank($admin['password'])) {
    $errors[] = "Please insert password.";
  }
  return $errors;
}

function errors_display($errors) {
  $output ='';
  if (!empty($errors)) {
    $output .= "<div>";
    $output .= "<ul>";
    foreach ($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output ;
}

function db_escape($connection, $string) {
  return mysqli_real_escape_string($connection, $string);
}

function login_admin($result) {
  session_regenerate_id();
  $_SESSION['admin_id'] = $result['id'];
  $_SESSION['user_name'] = $result['user_name'];
  $_SESSION['last_login'] = time();
  if ($result['user_name'] == 'CPTH') {
    $_SESSION['permission'] = 'drug_availability';
  } elseif ($result['user_name'] == 'reports') {
    $_SESSION['permission'] = 'drug_reports';
  } else {

  }
  return true ;
}

function check_permission_availability() {
  if ($_SESSION['permission'] == 'drug_availability') {
    //do nothing
  } else {
    redirect_to(url_for('/admin/login.php'));
  }
}

function check_permission_reports() {
  if ($_SESSION['permission'] == 'drug_reports') {
    //do nothing
  } else {
    redirect_to(url_for('/admin/login.php'));
  }
}


function redirect_admin() {
  if ($_SESSION['permission'] == 'drug_availability') {
    redirect_to(url_for('/admin/drug_availability/index.php'));
  } elseif ($_SESSION['permission'] == 'drug_reports') {
    redirect_to(url_for('/admin/reports/index.php'));
  } else {
   //do nothing
  }
}


function login_user($result) {
  session_regenerate_id();
  $_SESSION['user_id'] = $result['id'];
  $_SESSION['user_name_user'] = $result['user_name'];
  $_SESSION['last_user_login'] = time();
  return true ;
}

function login_check() {
  if (!isset($_SESSION['admin_id'])) {
    redirect_to(url_for('/admin/login.php'));

  } else {
    //do nothing
  }
}

function login_check_user() {
  if (!isset($_SESSION['user_id'])) {
    redirect_to(url_for('/login.php'));

  } else {

  }
}

function ward_name($value) {
  switch ($value) {
    case 1:
        return "RCU";
        break;
    case 2:
        return "الوحدة الاولى";
        break;
    case 3:
        return "الوحدة الثانية";
        break;

    case 4:
        return "الوحدة الثالثة";
        break;
    case 5:
        return "الوحدة الرابعة";
        break;
    case 6:
        return "الوحدة الخامسة";
        break;
    case 7:
        return "الوحدة الرابعة (كيمو)";
        break;
    case 8:
        return "الوحدة الخامسة (كيمو)";
        break;
    case 9:
        return "الوحدة السادسة";
        break;
    case 10:
        return "الخدج";
        break;
    case 11:
        return "الخاص";
        break;
    case 12:
        return "الكلى";
        break;
    case 13:
        return "الجراحية";
        break;
    case 14:
        return "الانتقالية";
        break;
    default:

}
}

 ?>
