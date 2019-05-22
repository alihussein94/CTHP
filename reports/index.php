<?php require_once('../data/initialize.php') ?>
<?php login_check_user();
if(!check_permission_user_type()) {
  redirect_to(url_for('/index.php'));
}
?>
<?php include('../data/adminheader.php') ?>
<?php


//number of rows per page
$result_per_page = 30;
//get the total number of rows in the database
$sql = "SELECT * FROM reports";
$number_of_results_arr = mysqli_query($db, $sql);
$number_of_results = mysqli_num_rows($number_of_results_arr);
//number of pages appear in the trader_cdlladderbottom
$number_of_pages = ceil($number_of_results/$result_per_page);
//determin which page is now active
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
//determine the start of limit
$this_page_start_from = ($page-1)*$result_per_page;
//query fuction as normally do but add Limit
$sql = "SELECT * FROM reports ";
$sql .= "ORDER BY id DESC ";
$sql .= "LIMIT " . db_escape($db, $this_page_start_from) . ", " . db_escape($db, $result_per_page) . "";
//make sure charset =  utf-8 so arabic names still available
$sSQL= 'SET CHARACTER SET utf8';
mysqli_query($db,$sSQL);
$result_set = mysqli_query($db, $sql);
confirm_result_set($result_set);






 ?>
<br>
 <a href="<?php echo url_for('/index.php'); ?>">&laquo Back To Main Menu</a>
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
                <!-- <td><?php //$dt = new DateTime($result['created_at']);echo $dt->format('d M Y'); ?></td> -->
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
          </form>
        </div>

      </section>


      <nav aria-label="Page navigation example" >
        <ul class="pagination justify-content-center">
          <li class="page-item <?php if ($page == 1) {echo " disabled";} ?>"><a class="page-link" href="<?php if ($page > 1) {echo "?page=".($page - 1);} else {echo "#";} ?>">Previous</a></li>
          <?php for ($page = 1; $page <= $number_of_pages; $page++) { ?>
          <li class="page-item"><a class="page-link" href="<?php echo "?page=" . $page ;?>"><?php echo $page; ?></a></li>
          <?php } ?>
          <li class="page-item <?php if ($page >= $number_of_pages) {echo " disabled";} ?>"><a class="page-link" href="<?php if ($page < $number_of_pages) {echo "?page=".($page + 1);} else {echo "#";} ?>">Next</a></li>
        </ul>
      </nav>
    </div>


  </div>
<?php mysqli_free_result($result_set); ?>
</body>

</html>
<?php db_disconnect($db) ?>
