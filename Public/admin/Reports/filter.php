<?php require_once('../../../private/initialize.php') ?>
<?php login_check(); ?>
<?php include('../../../private/adminheader.php') ?>
<?php
$result_set = find_all_drugs();

 ?>

    <div id="report_container">

      <section id="table-admin">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Ward</th>
              <th scope="col">Date</th>
              <th scope="col">Name</th>
              <th scope="col">NO.</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td></td>
                <td></td>
                <td class="text-center"></td>
                <td> </td>
                <td style="text-align: center;">
                  <a href="#"><i style="color: black;" class="fas fa-eye fa-2x"></i></a>
                </td>
              </tr>
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
              <select class="form-control" id="filter-ward-input">
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
              <input type="date" class="form-control" id="filter-date-input" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="filter-name-input" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" id="filter-name-input" placeholder="Name">
              </div>
            </div>
            <hr>
            <div class="buton">
              <button type="submit" class="btn btn-success btn-lg buton-report" >Search</button>
            </div>
          </form>
        </div>

        <div class="filter">
          <a class="btn btn-light btn-block" href="<?php echo url_for('/index.php'); ?>" role="button">Main Menu</a>
          <hr>
          <a class="btn btn-light btn-block" href="<?php echo url_for('/admindrug_availability/index.php'); ?>" role="button">Drug Availability Panel</a>
        </div>
      </section>


    </div>


  </div>
<?php mysqli_free_result($result_set); ?>
</body>

</html>
<?php db_disconnect($db) ?>
