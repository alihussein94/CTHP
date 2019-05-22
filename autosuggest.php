<?php require_once('data/initialize.php') ?>
<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }

  if(!is_ajax_request()) {
    exit;
  }


  $search = isset($_GET['search']) ? $_GET['search'] : '';
  $search = preg_replace("#[^0-9a-z]#i", "", $search);
  $sql = "SELECT * FROM drugs WHERE drug_name LIKE '%" . $search . "%' LIMIT 5";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $count = mysqli_num_rows($result_set);

  $suggestions = [];

  if ($count == 0) {
    $suggestions[] = ["name" => "Theres no search results.", "dosage" => " "] ;
    echo json_encode($suggestions);
    exit;
  } else {

    while($result = mysqli_fetch_assoc($result_set)) {
      $suggestions[] = [ "name" => $result['drug_name'] , "dosage" => $result['dosage_form']];
 }
}

echo json_encode($suggestions);

mysqli_free_result($result_set);


 ?>
