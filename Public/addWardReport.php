<?php require_once('../private/initialize.php') ?>
<?php include('../private/adminheader.php') ?>
<?php login_check_user(); ?>


    <section id="title">

<!-- navigation Bar -->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand h1" href="#">Drugs Availability Checker</a>&nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>

        <!-- change CPTH => True in order to not give information -->
        <?php if ($_SESSION['user_name_user'] == 'CPTH') { ?> &nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/admin/index.php'); ?>">Admin Panel</a> <?php } ?>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <form class="form-inline" action="<?php echo url_for('/search.php') ?>" method="post">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" onkeydown="searchq();">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </section>



    <section id="content" class="report-content">

      <div class="box-1">
      <form class="ward-form" action="<?php echo url_for('/sample.php') ?>" method="post">
            <div class="report-grid-1">
              <div>
                <h4>Name:</h3>
              </div>
              <div>
                <input class="form-control" type="text" name="report-name" placeholder="Please Enter Your Name">
              </div>
              <div>
                <h4>Ward:</h3>
              </div>
              <div>
                <input class="form-control" type="text" name="report-ward" placeholder="from index.php $ward_name"  disabled>
              </div>
            </div>
            <hr>
            <div class="report-grid-2" id="newFieldContainer">
              <div>
                <h4>Drug Name:</h3>
              </div>
              <div>
                <h4>Dosage Form:</h3>
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-name" placeholder="Drug Name">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-dosage" placeholder="Dosage Form">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-name-1" placeholder="Drug Name">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-dosage-1" placeholder="Dosage Form">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-name-2" placeholder="Drug Name">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-dosage-2" placeholder="Dosage Form">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-name-3" placeholder="Drug Name">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-dosage-3" placeholder="Dosage Form">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-name-4" placeholder="Drug Name">
              </div>
              <div>
                <input class="form-control" type="text" name="report-drug-dosage-4" placeholder="Dosage Form">
              </div>
            </div>
            <button type="button" class="btn btn-danger buton" onclick="addFields()">Add Drug</button>
            <div class="buton">
              <hr>
              <button type="submit" class="btn btn-success btn-lg buton-report" style="width: 50%;">Send Report</button>
            </div>
      </form>
      </div>

    </section>

    <!-- Footer -->

    <footer id="footer">

      <p><?php echo $copyright; ?></p>

    </footer>

  </div>

</body>

</html>
