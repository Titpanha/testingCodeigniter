<div class="container bootstrap snippet">
  <div class="row">
    <div class="col-sm-12">
      <h1 align="center" style="font-weight: 700;"><?=$title?></h1>
      <hr>
    </div>
  </div>
  <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">

       <div class="tab-content">
            <div class="tab-pane active" id="home">
               <?php echo form_open_multipart('users/updateProfile','class="form" id="registerForm"') ?>

                 <div class="form-group">
                    <img src="<?php echo site_url();?>assets/images/profile/<?php echo $getUserProfile['profileImage'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    <div align="center">
                      <hr>
                      <h6 >Upload a different photo...</h6>
                      <input style="left:40%" type="file" class="text-center center-block file-upload" name="userfile">
                    </div>
                    
                  </div>

                  <div class="form-group">
                      <label for="first_name"><h4>Name</h4></label>
                      <input type="text" class="form-control" name="name" value="<?php echo $getUserProfile['name']; ?>" placeholder="<?php echo $getUserProfile['name'];?>" title="enter your first name if any.">
                  </div>
      
                  <div class="form-group">
                    <label for="email"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" value="<?php echo $getUserProfile['email']; ?>" placeholder="<?php echo $getUserProfile['email']; ?>" title="enter your email.">
                  </div>
                  <div class="form-group">
                    <label for="email"><h4>Zipcode</h4></label>
                    <input type="text" class="form-control" name="zipcode" value="<?php echo $getUserProfile['zipcode']; ?>" placeholder="Zipcode Your location" title="enter a location">
                  </div>
                  
                  <div class="form-group">
                       <div class="col-xs-12 text-center">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save Change</button>
                        </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
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