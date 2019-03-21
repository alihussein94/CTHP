<?php require_once('../data/initialize.php') ?>
<?php include('../data/adminheader1.php') ?>
<?php
if(request_is_post()) {
  $admin = [];
  $admin['username'] = $_POST['user_name'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';

  $errors = admin_validation($admin);
  if (empty($errors)) {
    $sql = "SELECT * FROM super_user ";
    $sql .= "WHERE user_name='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "LIMIT 1";

    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);

    if ($result) {
      //check password
      if (password_verify($admin['password'], $result['hashed_password'])) {
        //password true
        login_admin($result);
        redirect_to(url_for('/admin/index.php'));
      } else {
        //password wrong
        $errors[] = "incorrect username or password." ;
      }
    } else {
      //username not right
      $errors[] = "incorrect username or password." ;
    }
  }


} else {

}


 ?>

    <section id="sds">


      <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
          <div class="user_card">
            <div style="color: red;">
              <?php echo errors_display($errors); ?>
            </div>
            <div class="d-flex justify-content-center form_container">
              <form action="<?php echo url_for('admin/login.php'); ?>" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" name="user_name" class="form-control input_user" value="" placeholder="username">
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                  <button type="submit" class="btn login_btn">Login</button>
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
