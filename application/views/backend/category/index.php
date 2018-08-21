
	<h2><?=$title;?></h2>
	<div class="alert">
		<?php if ($this->session->flashdata('category_created')) { ?>
			<div class="alert alert-success"> <?= $this->session->flashdata('category_created') ?> </div>
		<?php } ?>
		<?php if ($this->session->flashdata('category_updated')) { ?>
			<div class="alert alert-success"> <?= $this->session->flashdata('category_updated') ?> </div>
		<?php } ?>
	</div>	
	 <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">Category`s name</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach($categories as $category) :?>
    		<tr>
	    		<td class="text-center">
	    			<a href="<?php echo site_url('/categories/post/'.$category['id']); ?>">
	    				<?php echo $category['name']; ?>
	    			</a>
	    		</td>
	    		<td class="text-center">
	    			<?php if($this->session->userdata('user_id') == 1 ):?>
		    				<a href="<?php echo base_url();?>categories/edit/<?php echo $category['id'];?>" >
		    					<i class="fas fa-edit"></i>
		    				</a>
	    				<?php elseif ($this->session->userdata('user_id') == $category['user_id']) :?>
	    					<a href="<?php echo base_url();?>categories/edit/<?php echo $category['id'];?>" >
	    						<i class="fas fa-edit"></i>
	    					</a>
	    			<?php endif;?>
	    			<!-- <?php //if($this->session->userdata('user_id') == $category['user_id']):?>
						<?php //echo form_open('categories/delete/'.$category['id'],'style="display:inline-block;"'); ?>
							<input type="submit" class=" text-danger" value="[X]">
						</form>
					 -->
	    		</td>
    		</tr>
    	<?php endforeach; ?>
    </tbody>
	


