<?php require_once('../../data/initialize.php') ?>
<?php login_check(); ?>
<?php check_permission_availability(); ?>
<?php include('../../data/adminheader.php') ?>
<?php
$result_set = find_all_drugs();

 ?>

    <section id="top-btn">
      <div class="row">
        <div class="col-6">
          <a href="add.php"><i style="color: #006600;" class="fas fa-plus-circle fa-5x"></i></a>
        </div>
        <div class="col-6">
          <a href="<?php echo url_for('admin/logout.php'); ?>"><i style="color: #ff0000;" class="fas fa-sign-out-alt fa-5x"></i></a>
        </div>
      </div>
    </section>

    <section id="table-admin">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Drug</th>
            <th scope="col">Dosage Form</th>
            <th scope="col">Availability</th>
            <th scope="col">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php while($result = mysqli_fetch_assoc($result_set)) { ?>
          <tr class="<?php  if ($result['Availability'] == 1) { echo 'table-success'; } else { echo 'table-danger'; } ?>">
            <td><?php echo h($result['drug_name']) ; ?></td>
            <td><?php echo h($result['dosage_form']) ; ?></td>
            <td class="text-center">
              <form class="" action="<?php echo url_for('/admin/drug_availability/onchange.php?id=') . u(h($result['id'])); ?>" method="post">
                <div class="form-check">
                  <input class="form-check-input position-static" type="checkbox" name="Availability" value="1" id="blankCheckbox" onChange="this.form.submit()" aria-label="..." <?php if ($result['Availability'] == 1) { echo 'checked';} ?>>
                </div>
              </form>
            </td>
            <td>
              <div class="row td-edit-delete">
                <div class="col-6">
                <a href="<?php echo 'edit.php?id=' . h(u($result['id'])) ; ?>"><i style="color: black;" class="fas fa-edit fa-2x"></i></a>
                </div>
                <div class="col-6">
                <a href="<?php echo 'delete.php?id=' . h(u($result['id'])) ; ?>"><i style="color: #ff0000;" class="fas fa-trash-alt fa-2x"></i></a>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </section>

  </div>
<?php mysqli_free_result($result_set); ?>
</body>

</html>
<?php db_disconnect($db) ?>
