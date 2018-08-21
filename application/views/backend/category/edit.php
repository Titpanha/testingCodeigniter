<h2><?=$title?></h2>
<div class="container">
	<div class="row">
<?php echo validation_errors();?>
		<div class="col-sm-12 text-center" style="margin-top: 15%;">
			<?php echo form_open('categories/update'); ?>
			<input type="hidden" name="id" value="<?php echo $getCategory['id'];?>">
				<div class="form-group">
					<label><h4>Category`s Name</h4></label>
					<input class="form-control" type="text" name="category" value="<?php echo $getCategory['name']; ?>">
				</div>
				<button type="submit" class="btn btn-info">Save Change</button>
			<?php form_close(); ?>
		</div>
	</div>
</div>
	