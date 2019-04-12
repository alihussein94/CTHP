<?php require_once('../../private/initialize.php') ?>
<?php login_check(); ?>
<?php include('../../private/adminheader1.php') ?>
<?php

if (!isset($_GET['id'])) {
  redirect_to(url_for('/admin/index.php'));
} else {
  $id = $_GET['id'];
}

if(request_is_post()) {
  $sql = "DELETE FROM drugs ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  if ($result) {
    redirect_to(url_for('/admin/index.php'));
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
} else {
  $result = find_one_drug($id);
}

 ?>
    <section id="sds">

      <a href="<?php echo url_for('/admin/index.php'); ?>">&laquo Back To Main Menu</a>
      <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
          <div class="user_card">
            <div class="d-flex justify-content-center form_container text-center">
              <p style="color: #fff; font-size: 1.3rem;">Are you sure ? you want to delete <?php echo h($result['drug_name']) .' | ' . $result['dosage_form']; ?> ?</p>
            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
              <form action="<?php echo url_for('/admin/delete.php?id=') . u(h($id)); ?>" method="post">
               <button type="submit"  name="button" class="btn login_btn">Delete Drug</button>
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
