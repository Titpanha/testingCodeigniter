<h2><?php $title ?></h2>


<?php if($this->session->flashdata('cur_pwd')): ?>
    <?php echo '<h3 class="alert alert-warning">'.$this->session->flashdata('cur_pwd').'</h3>';?>
<?php endif;?>
<?php echo form_open('users/changePwd'); ?>
	<div class="form-group">
		<label>Current Password</label>
		<input type="password" name="password" class="form-control" placeholder="Current Password">
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="newPassword" class="form-control" placeholder="New Password">
	</div>
	<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
	</div>
	<div class="form-group">
		<button type="submit" class="login-button btn btn-primary" >Change password</button>
	</div>
<?php echo form_close(); ?>

