<?php require_once('../data/initialize.php') ?>
<?php login_check(); ?>
<?php include('../data/adminheader1.php') ?>
<?php
if(request_is_post()) {

  $drug = [];
  $drug['drug_name'] = $_POST['drug_name'] ?? '';
  $drug['dosage_form'] = $_POST['dosage_form'] ?? '';
  $drug['Availability'] = $_POST['Availability'] ?? '';

  $errors = validation($drug);
  if (empty($errors)) {

    $sql = "INSERT INTO drugs ";
    $sql .= "(drug_name, dosage_form, Availability) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $drug['drug_name']) . "', ";
    $sql .= "'" . db_escape($db, $drug['dosage_form']) . "', ";
    $sql .= "'" . db_escape($db, $drug['Availability']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if ($result) {
      redirect_to(url_for('/admin/index.php'));
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
} else {

}

 ?>

    <section id="sds">

<a href="<?php echo url_for('/admin/index.php'); ?>">&laquo Back To Main Menu</a>
      <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
          <div class="user_card">
            <div style="color: red;">
              <?php echo errors_display($errors); ?>
            </div>
            <div class="d-flex justify-content-center form_container">
              <form action="<?php echo url_for('/admin/add.php'); ?>" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-prescription"></i></span>
                  </div>
                  <input type="text" name="drug_name" class="form-control input_user" value="" placeholder="Drug Name">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-pills"></i></span>
                  </div>
                  <input type="text" name="dosage_form" class="form-control input_user" value="" placeholder="Dosage Form">
                </div>
                <div class="input-group mb-3">
                  <div class="custom-control custom-switch">
                    <input type="hidden" name="Availability" value="0">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="Availability" value="1">
                    <label class="custom-control-label" for="customSwitch1">Availability</label>
                  </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                  <button type="submit" class="btn login_btn">Add New Drug</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </section>



    <!-- Footer -->


  </div>

</body>

</html>
<?php db_disconnect($db) ?>
