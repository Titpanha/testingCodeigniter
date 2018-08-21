
	<h2><?= $title;?></h2>
	<?php echo form_open_multipart('posts/update','id="uploadFile"');?>
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
				<option value="<?php echo $category['id']; ?>" 
					<?php 
						if($category['id'] == $post['category_id']){ 
							echo $selected = "selected"; 
						}else{ 
							echo $selected=""; 
						}?>>
						<?php echo $category['name']; ?>
							
				</option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label>Upload Image</label>
		
		<div class="well">
			<img src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>" class="img-circle img-thumbnail" attr="avatar" id="output_image"/>
		</div>
		<input type="file" name="userfile"  class="form-control" id="file-upload" value="<?php echo $post['post_image'];?>" accept="image/*" onchange="preview_image(event)">
		<!-- <img id="output_image"/> -->
	</div>
	<button type="submit" class=" btn btn-primary">Submit</button>
	

<?php echo form_close();?>



 <script src="<?=base_url().'assets/ckeditor/ckeditor.js'?>"></script>
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
<script>
	CKEDITOR.replace('editor',{
		filebrowserBrowseUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserUploadUrl : '../../assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserImageBrowseUrl : '../../assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	});

</script>