<h2 class="upperletter">List Posts</h2>
<div class="alert">
    <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<h3 class="alert alert-warning">'.$this->session->flashdata('post_deleted').'</h3>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('post_created').'</h3>';?>
    <?php endif;?>
    <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('post_updated').'</h3>';?>
    <?php endif;?>
</div>       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">Title</th>
        <th class="text-center">Post Image</th>
        <th class="text-center">Description</th>
        <!-- <th class="text-center">User_id</th> -->
        <th class="text-center">Category_id</th>
        <th class="text-center">Create_at</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($lists as $list) : ?>
            <?php if($this->session->userdata('user_id') == $list['user_id']) : ?>
                <?php if($list > 0)  { ?>
                        <tr>
                            <td class="text-center">
                                <p><?php echo word_limiter($list['title'],4);?></p>
                            </td>
                            <td>
                                <img src="<?php echo site_url();?>assets/images/posts/<?php echo $list['post_image'];?>" width="80px" height="60px">
                            </td>
                            <td class="text-center">
                                <?php echo word_limiter($list['body'],10); ?>
                            </td>
                            <!--   <td class="text-center">
                                <?php //echo $list['user_id'];?>      
                            </td> -->
                            <td class="text-center">
                                <?php echo $list['category_id'];?>
                            </td>
                            
                            <td class="text-center">
                                <small><?php echo $list['created_at']; ?></small>
                            </td> 
                            <td class="text-center">
                                <a href="<?php echo base_url();?>posts/edit/<?php echo $list['slug'];?>" ><i class="fas fa-pencil-alt"></i></a>
                                
                                <!-- <a href="<?php //echo site_url('posts/delete/'.$list['slug'])?>"><i class="far fa-trash-alt"></i></a> -->
                                
                                <?php echo anchor('posts/delete/'.$list['id'], '<i class="far fa-trash-alt"></i>', array('onclick'=>"return confirmDialog();")); ?>
                            </td>
                        </tr>
                    <?php } elseif($list == 0) { 

                        echo '<h2> Opps, you dont have any post yet.</div>';
                 } ?>
            <?php endif; ?>
      <?php endforeach;?>
    </tbody>
  </table>
  <script>
    function confirmDialog() {
        return confirm("Are you sure you want to delete this post?")
    }
</script>
