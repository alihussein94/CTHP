<?php require_once('../../data/initialize.php') ?>
<?php login_check(); ?>
<?php check_permission_reports(); ?>
<?php include('../../data/adminheader.php') ?>
<?php
if(!isset($_GET['id'])) {
  redirect_to(url_for('/admin/reports/index.php'));
} else {
  $id = $_GET['id'];
}

$sql = "SELECT * FROM reports ";
$sql .= "WHERE id='" . db_escape($db, $id) . "' ";
$sql .= "LIMIT 1";
//make sure charset =  utf-8 so arabic names still available
$sSQL= 'SET CHARACTER SET utf8';
mysqli_query($db,$sSQL);

$result_set = mysqli_query($db, $sql);
$result = mysqli_fetch_assoc($result_set);
confirm_result_set($result_set);


 ?>

      <section id="details-info">
        <div class="report-grid-1">
          <div>
            <h4>Name:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-name" value="<?php echo h($result['report_name']) ; ?>" disabled>
          </div>
          <div>
            <h4>Ward:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-ward" value="<?php echo ward_name(h($result['report_ward'])) ; ?>"  disabled>
          </div>
          <div>
            <h4>Date:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-Date" value="<?php echo date('Y/m/d', strtotime($result['created_at'])); ?>"  disabled>
          </div>
        </div>
      </section>

      <section id="table-admin">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Drug Name</th>
              <th scope="col">Dosage Form</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $sql = "SELECT * FROM report_details ";
            $sql .= "WHERE reports_id='" . db_escape($db, $id) . "'";
            //make sure charset =  utf-8 so arabic names still available
            $sSQL= 'SET CHARACTER SET utf8';
            mysqli_query($db,$sSQL);

            $result_set = mysqli_query($db, $sql);
            confirm_result_set($result_set);

            while($result = mysqli_fetch_assoc($result_set)) { ?>

              <tr>
                <td><?php echo h($result['drug_name']) ; ?></td>
                <td><?php echo h($result['dosage_form']) ; ?></td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
        <hr>
        <a href="<?php echo url_for('admin/reports/index.php'); ?>" class="btn btn-danger btn-lg btn-block">Back</a>

      </section>




  </div>
</body>
<?php mysqli_free_result($result_set); ?>
</html>
<?php db_disconnect($db) ?>
