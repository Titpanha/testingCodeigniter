<h2>Lists User</h2>
            <div class="alert">
              <?php if ($this->session->flashdata('userRole_updated')) { ?>
                  <div class="alert alert-success"> <?= $this->session->flashdata('userRole_updated') ?> </div>
              <?php } ?>
            </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">User name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center">Create at</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userslist as $value) : ?>
        <tr>
          <td class="text-center"><?php echo $value['name']; ?></td>
          <td class="text-center"><?php echo $value['email']; ?></td>
          <td class="text-center"><?php echo $value['role_id']; ?></td>
          <td class="text-center"><?php echo $value['register_date']; ?></td>
          <td class="text-center">
            <a href="<?php echo base_url();?>users/editPermission/<?php echo $value['id'];?>" class="btn btn-info text-center">
              Edit
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>