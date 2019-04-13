<?php require_once('data/initialize.php') ?>
<?php include('data/adminheader.php') ?>
<?php login_check_user(); ?>
<?php

$result_set = find_all_drugs();

 ?>

    <section id="title">

      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand h1" href="index.php">Drugs Availability Checker</a>&nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>
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



    <section id="table">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Drug</th>
            <th scope="col">Dosage Form</th>
            <th scope="col">Availability</th>
          </tr>
        </thead>
        <tbody>
          <?php while($result = mysqli_fetch_assoc($result_set)) { ?>
          <tr>
            <td><?php echo h($result['drug_name']) ; ?></td>
            <td><?php echo h($result['dosage_form']) ; ?></td>
            <td class="text-center"><?php if ($result['Availability'] == '1') {
              echo '<i style="color: #006600;" class="fas fa-check-circle fa-2x"></i>';
            } else {
              echo '<i style="color: #ff0000;" class="fas fa-times-circle fa-2x"></i>';
            } ; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </section>

    <!-- Footer -->

    <footer id="footer">

      <p><?php echo $copyright; ?></p>

    </footer>

  </div>

</body>
<?php mysqli_free_result($result_set); ?>

</html>
<?php db_disconnect($db) ?>
