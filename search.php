<?php require_once('data/initialize.php') ?>
<?php include('data/adminheader.php') ?>
<?php login_check_user(); ?>

<?php
if (request_is_get()) {
  $search = $_GET['search'];
  //$search = preg_replace("#[^0-9a-z]#i", "", $search);
  $sql = "SELECT * FROM drugs WHERE drug_name LIKE '%" . $search . "%'";
  $result_set = mysqli_query($db, $sql);
  confirm_result_set($result_set);
  $count = mysqli_num_rows($result_set);

}
 ?>
    <section id="title">

      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand h1" href="index.php">Drugs Availability Checker</a>&nbsp; &nbsp; &nbsp; <a href="<?php echo url_for('/logout.php'); ?>">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

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
          <?php
          if ($count == 0) {
            echo '<h2> Theres no search results.</h2>' ;
          } else {

            while($result = mysqli_fetch_assoc($result_set)) { ?>


          <tr>
            <td><?php echo h($result['drug_name']) ; ?></td>
            <td><?php echo h($result['dosage_form']) ; ?></td>
            <td class="text-center"><?php if ($result['Availability'] == '1') {
              echo '<i style="color: #006600;" class="fas fa-check-circle fa-2x"></i>';
            } else {
              echo '<i style="color: #ff0000;" class="fas fa-times-circle fa-2x"></i>';
            } ; ?></td>
          </tr>
        <?php } }?>
        </tbody>
      </table>
    </section>

    <!-- Footer -->

    <footer id="footer">

      <p><?php echo $copyright; ?></p>

    </footer>

  </div>
  <?php mysqli_free_result($result_set); ?>

</body>

</html>
<?php db_disconnect($db) ?>
