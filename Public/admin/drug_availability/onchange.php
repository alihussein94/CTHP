<?php require_once('../../../private/initialize.php') ?>
<?php

  $id = $_GET['id'];

  if(request_is_post()) {

    $Availability = $_POST['Availability'] ?? '';

    $sql = "UPDATE drugs SET ";
    $sql .= "Availability= '" . db_escape($db, $Availability) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if ($result) {
      redirect_to(url_for('/admin/drug_availability/index.php'));
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
