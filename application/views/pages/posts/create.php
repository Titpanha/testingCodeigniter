	
	<div class="container">
		<h2><?= $title;?></h2>
		<?php echo form_open_multipart('posts/create');?>

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" placeholder="Add Title">
			</div>
			<div class="form-group">
				<label>Body</label>
				<textarea id="editor" type="text" name="body" class="form-control" cols="30" rows="10" placeholder="body"></textarea>
			</div>
			<div class="form-group">
				<label>Category</label>	
				<select name="category_id" class="form-control">
					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label>Upload Image</label>
				<input type="file" name="userfile" size="20" class="form-control" accept="image/*" onchange="preview_image(event)">
				<img id="output_image"/>
				
			</div>
			<div class="text-center">
				<button type="submit" class=" btn btn-success ">Create Post</button>
			</div>
			
		<?php echo form_close();?>
	</div>

	<script type='text/javascript'>
		function preview_image(event) 
		{
		 var reader = new FileReader();
		 reader.onload = function()
		 {
		  var output = document.getElementById('output_image');
		  output.src = reader.result;
		 }
		 reader.readAsDataURL(event.target.files[0]);
		}
	</script>
	<script src="<?=base_url().'assets/ckeditor/ckeditor.js'?>"></script>
	<script>
		CKEDITOR.replace('editor',{
			filebrowserBrowseUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
			filebrowserUploadUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
			filebrowserImageBrowseUrl : '../../assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
		});
	</script>