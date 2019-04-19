<?php require_once('data/initialize.php') ?>
<?php login_check_user(); ?>

<?php
//check if request is post
if(request_is_post()) {
  // open empty array to store data
  $report_data = [];
  //user name and ward name are fixed so write then first
  $report_data['report_name'] = $_POST['report-name'] ?? '';
  $report_data['report_ward'] = $_POST['report-ward'] ?? '';



// start mysqli_query function to add name and ward to their table
  $sql1 = "INSERT INTO reports ";
  $sql1 .= "(report_name, report_ward) ";
  $sql1 .= "VALUES (";
  $sql1 .= "'" . db_escape($db, $report_data['report_name']) . "', ";
  $sql1 .= "'" . db_escape($db, $report_data['report_ward']) . "'";
  $sql1 .= ")";
  //make sure charset =  utf-8 so arabic names still available
  $sSQL= 'SET CHARACTER SET utf8';
  mysqli_query($db,$sSQL);
  $result = mysqli_query($db, $sql1);
  if ($result) {
    //request the id of last added report ti use it in the report_details table
    $last_id = mysqli_insert_id($db);
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
//number of drugs added by user = (number of $_POST array element - 2[name and ward] / 2[drug name & dosage form])
  $drugs_number = ((count($_POST))-2)/2;
  //create loop to retrive all fields data
for ($i = 0; $i < $drugs_number ; $i++ ) {
  //if statement to exclude empty fields
  if ($_POST["report-drug-name-" . $i] !== '') {

    $report_data["report-drug-name-" . $i] = $_POST["report-drug-name-" . $i] ?? '';
    $report_data["report-drug-dosage-" . $i] = $_POST["report-drug-dosage-" . $i] ?? '';

    $sql2 = "INSERT INTO report_details ";
    $sql2 .= "(drug_name, dosage_form, reports_id) ";
    $sql2 .= "VALUES (";
    $sql2 .= "'" . db_escape($db, $report_data["report-drug-name-" . $i]) . "', ";
    $sql2 .= "'" . db_escape($db, $report_data["report-drug-dosage-" . $i]) . "', ";
    $sql2 .= "'" . db_escape($db, $last_id) . "'";
    $sql2 .= ")";
    //make sure charset =  utf-8 so arabic names still available
    $sSQL= 'SET CHARACTER SET utf8';
    mysqli_query($db,$sSQL);

    $result = mysqli_query($db, $sql2);
    if (!$result) {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

}

}


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Report has been sent successfully</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div style="width: 50%; margin: 10% auto; background-color: green; color: #fff; padding: 1rem; text-align: center;">
      <h4> Report has been sent successfully</h4>
    </div>
    <script>
    var timer = setTimeout(function() {
      window.location='<?php echo url_for('/index.php') ?>'
    }, 3000);
    </script>
  </body>
</html>

<?php db_disconnect($db) ?>
