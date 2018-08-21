<div class="container">
	<h2 class="text-center"><?=$title ?></h2>
	<small class="post-date">Posted on: <?php echo $post['created_at'];?></small><br>
	<div align="center">
		<img  src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>">
	</div>
</div>
<div class="container">
	<div class="post-body">
		<?php echo $post['body']; ?>
	</div> 
	
<!-- <?php //if($this->session->userdata('user_id')== $post['user_id']): ?>
	<hr>
	<a href="<?php //echo base_url();?>posts/edit/<?php// echo $post['slug'];?>" class="btn btn-info pull-left" >Edit</a>
	<?php //echo form_open('/posts/delete/'.$post['id']);?>
		<input type="submit" value="Delete" class="btn btn-danger">
	<?php //echo form_close();?>
	<br>
<?php //endif;?> -->


<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach ($comments as $cmts) :?>
		<div class="well">
			<!-- <strong> <?php echo $cmts['name'];?></strong> -->
			<p><?php echo $cmts['created_at'];?></p>
			<h5><?php echo $cmts['body']; ?> [By <strong> <?php echo $cmts['name'];?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No comment to display.</p>
<?php endif;?>



<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<!-- <div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control">
	</div> -->
	<div class="form-group">
		<label>Body</label>
		<textarea type="" name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
	<button class="btn btn-primary" type="submit">Submit</button>
<?php echo form_close();?>
<hr>


</div>
