
	<h2><?=$title;?></h2>

	<?php echo validation_errors();?>
	<?php echo form_open_multipart('categories/create');?>
	<div class="form-group " style="margin-top: 10%;">
		<label style="font-weight: 600; font-size: 1.5em;">Category`s Name</label>
		<input type="text" name="name" placeholder="Category name" class="form-control">
	</div>
	<button type="submit" class="btn btn-info">Submit</button>
	<?php echo form_close();?>
