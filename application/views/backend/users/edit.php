<h1>User Management</h1>

<div class="container" style="margin-top: 15%;">
	<h3 class="text-center"><b>User Role</b></h3>
	<?php echo form_open_multipart(''); ?>
		<select name="userRole" class="form-control">
			<?php foreach ($getRole as $role) :?>
				<option value="<?php echo $role['id']; ?>" <?php if($role['id'] == $getUserData['role_id']){echo $se="selected";}else{echo $se="";} ?>>
					<?php echo $role['role_name']; ?>
				</option>
			<?php endforeach; ?>
		</select>
		<div class="text-center">
			<button type="submit" class="btn btn-success">Save update</button>
		</div>
	<?php form_close(); ?>
</div>



