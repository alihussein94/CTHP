<?php require_once('../data/initialize.php') ?>
<?php login_check_user();
if(!check_permission_user_type()) {
  redirect_to(url_for('/index.php'));
}
?>
<?php include('../data/adminheader.php') ?>
<?php

if (request_is_post()) {
  $filter = [];
  $filter['ward'] = $_POST['name_ward'] ?? '';
  $filter['date'] = date('Y-m-d', strtotime($_POST['report_date'])) ?? '';

  $sql = "SELECT * FROM reports ";
  $sql .= "WHERE report_ward='" . $_POST['name_ward'] . "'" ;
  $sql .= "AND date(created_at) = '" . $filter['date'] . "'";
  //make sure charset =  utf-8 so arabic names still available
  $sSQL= 'SET CHARACTER SET utf8';
  mysqli_query($db,$sSQL);

  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);

}



// echo date('Y-m-d', strtotime($_POST['report_date']));
// echo "<br />" . h($_POST['name_ward']) ;
 ?>

    <div id="report_container">

      <section id="table-admin">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Ward</th>
              <th scope="col">Date</th>
              <th scope="col">Name</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>

            <?php while($result = mysqli_fetch_assoc($result_set)) { ?>

              <tr>
                <td><?php echo ward_name(h($result['report_ward'])) ; ?></td>
                <td><?php echo date('Y/m/d', strtotime($result['created_at'])); ?></td>
                <td><?php echo h($result['report_name']) ; ?></td>
                <td style="text-align: center;">
                  <a href="<?php echo 'details.php?id=' . h(u($result['id'])) ; ?>"><i style="color: black;" class="fas fa-eye fa-2x"></i></a>
                </td>
              </tr>

            <?php } ?>

          </tbody>
        </table>
      </section>

      <section id="reports-filter" >
        <div class="filter">
          <h4>Filter</h4>
          <hr>
          <form class="" action="filter.php" method="post">
            <div class="form-group row">
              <label for="filter-ward-inpu" class="col-sm-2 col-form-label">Ward</label>
              <div class="col-sm-10">
              <select class="form-control" id="filter-ward-input" name="name_ward">
                <option value="1">RCU</option>
                <option value="2">الوحدة الاولى</option>
                <option value="3">الوحدة الثانية</option>
                <option value="4">الوحدة الثالثة</option>
                <option value="5">الوحدة الرابعة</option>
                <option value="6">الوحدة الخامسة</option>
                <option value="7">الوحدة الرابعة (كيمو)</option>
                <option value="8">الوحدة الخامسة (كيمو)</option>
                <option value="9">الوحدة السادسة</option>
                <option value="10">الخدج</option>
                <option value="11">الخاص</option>
                <option value="12">الكلى</option>
                <option value="13">الجراحية</option>
                <option value="14">الانتقالية</option>
              </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="filter-date-input" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
              <input type="date" class="form-control" id="filter-date-input" name="report_date" required>
              </div>
            </div>
            <hr>
            <div class="buton">
              <button type="submit" class="btn btn-success btn-lg buton-report" >Search</button>
            </div>
            <hr>
            <div class="buton">
              <a type="button" class="btn btn-danger btn-lg buton-report" href="<?php echo url_for('/reports/index.php'); ?>">Remove Filter</a>
            </div>

          </form>
        </div>

      </section>


    </div>


  </div>
</body>
<?php mysqli_free_result($result_set); ?>
</html>
<?php db_disconnect($db) ?>
