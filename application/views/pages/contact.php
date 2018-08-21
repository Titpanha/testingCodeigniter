
<div class="map">
		<iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+PhnomPenh+Capital+Region,+Combodia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
		</iframe>
	</div>
	
	<section class="contact-page">
        <div class="container">
            <div class="text-center">        
                <h2>Drop Your Message</h2>
                <p></p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php echo form_open('contact/sendMail','class="contact-form" id="main-contact-form" name="contact-form"');?>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" >
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="phonenum" id="phonenum" type="number" class="form-control">
                        </div>
                       <!--  <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>   -->                      
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg send-email" required="required">Submit message</button>
                        </div>
                    </div>
                    <?php echo form_close();?>
                <!-- </form>  -->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->


    <script type="text/javascript">
        $('.send-email').click(function(){
                    $.ajax({
                        url: 'http://localhost/codeIgnitor/addTemplate/contact/sendMail',
                        type: 'post',
                        data: {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            phonenum:$('#phonenum').val(),
                            subject: $('#subject').val(),
                            message: $('#message').val()
                        },
                        success:function(data)
                        {
                            console.log(data);
                            alert('Your email has been sent to our HR. Thank you...!<br>Please wait for further information contact to you later.');
                            window.location.href = "<?php echo site_url('pages/contact')?>";
                        }
                    });
                });

    </script>