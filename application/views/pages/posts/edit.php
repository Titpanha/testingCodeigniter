<div class="container">
	<h2><?= $title;?></h2>
	<?php print_r($post); ?>
	<?php echo form_open_multipart('posts/update');?>
	<input type="hidden" name="id" value="<?php echo $post['id'];?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" placeholder="Add Title" value="<?php echo $post['title'];?>">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea id="editor" type="text" name="body" class="form-control" cols="30" rows="10" placeholder="body"><?php echo $post['body'];?></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>	
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label>Upload Image</label>
		<input type="hidden" name="userfile"  class="form-control" value="<?php echo $post['post_image'];?>">
	</div>
	 <img src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>" class="">
	<button type="submit" class=" btn btn-primary">Submit</button>
	
</div>
<?php echo form_close();?>
<script>
	CKEDITOR.replace('editor',{
		filebrowserBrowseUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserUploadUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserImageBrowseUrl : '../../assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	});
</script>