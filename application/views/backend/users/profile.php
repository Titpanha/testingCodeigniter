
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-12 col-md-12 text-center">
  			<h1><?=$title?></h1>
  		</div>
    </div>
    <div class="alert">
      <?php if ($this->session->flashdata('profile_updated')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('profile_updated') ?> </div>
      <?php } ?>
      
      <?php if ($this->session->flashdata('user_loggedin')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('user_loggedin') ?> </div>
      <?php } ?>
    </div>
    <div class="row">
  		<div class="col-sm-5 col-md-6>"><!--left col-->
		    <div class="text-center">
		        <img src="<?php echo site_url();?>assets/images/profile/<?php echo $getUserProfile['profileImage'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
		        <!-- <input type="file" class="text-center center-block file-upload"> -->
		    </div></hr><br>
         	<ul class="list-group">
	            <li class="list-group-item text-right"><span class="pull-left"><strong>POSTS</strong></span>
	            	<h5><?php echo $getCountPost->n; ?></h5>
	            </li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>comments</strong></span>
                <h5><?php echo $getCountPost->n; ?></h5>
              </li>
          	</ul> 
        </div><!--/col-3-->
    	<div class="col-sm-7 col-md-6">    
          	<div class="tab-content">
            	<div class="tab-pane active" id="home">
                	<hr>
                  	<div class="form-group">
                      	<div class="col-xs-6 ">
                      		<table class="table table-hover" style="margin-top: 15%;">
							    <tbody>
							      <tr>
							        <td><h4>Name :</h4></td>
							        <td></td>
							        <td><b><?php echo $getUserProfile['name']; ?></b></td>
							      </tr>
							      <tr>
							        <td><h4>Email :</h4></td>
							        <td></td>
							        <td><b><?php echo $getUserProfile['email']; ?></b></td>
							      </tr>
							      <tr>
							        <td><h4>Zipcode:</h4></td>
							        <td></td>
							        <td><b><?php echo $getUserProfile['zipcode']; ?></b></td>
							      </tr>
							    </tbody>
						  	</table>
                		</div>
            		</div>
    			</div>
			</div>
			<div  class="text-center">
				<a href="<?php echo base_url();?>users/editProfile/<?php echo $this->session->userdata('user_id');?>" title="" class="btn btn-primary"></button><i class="fas fa-edit"></i> Edit Profile</a>
			</div>
		</div>
	</div>
</div>

                     <!--  <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Zipcode</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save change</button>
                               	
                            </div>
                      </div> -->
              		<!-- </form> -->
		          <!-- </div>/tab-pane -->
		      <!-- </div>/tab-content -->
		    <!-- </div>/col-9 -->
		<!-- </div>/row -->
 <script>
 	$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
 </script>