<?php require_once('../../../private/initialize.php') ?>
<?php login_check(); ?>
<?php include('../../../private/adminheader.php') ?>
<?php

 ?>

      <section id="details-info">
        <a href="<?php echo url_for('admin/reports/index.php'); ?>" class="btn btn-danger btn-lg btn-block">Back</a>
        <hr>
        <div class="report-grid-1">
          <div>
            <h4>Name:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-name" placeholder="name" disabled>
          </div>
          <div>
            <h4>Ward:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-ward" placeholder="ward"  disabled>
          </div>
          <div>
            <h4>Date:</h3>
          </div>
          <div>
            <input class="form-control" type="text" name="report-ward" placeholder="Date"  disabled>
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
              <tr>
                <td></td>
                <td></td>
              </tr>
          </tbody>
        </table>
      </section>




  </div>
</body>

</html>
<?php db_disconnect($db) ?>
