<?php $this->load->view('workshop/header'); ?> 
         <div class="wrapper-page">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel profile">
                                <img src="<?php echo base_url() ?>assets/img/dotdev-pro.jpg" class="profile-img-top">
                                <div class="panel-body text-center">
                                    <div class="pro-img">
                                        <?php if(!empty($profile->image)){ ?>
                                            <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $profile->image; ?>" height="250" width="167">
                                        <?php } else { ?>
											<img src="<?php echo base_url(); ?>assets/img/user/default.jpg" height="250" width="167">
										<?php } ?>
                                    </div>
                                    <h3><?php echo $profile->full_name; ?></h3>
                                    <button class="btn badge badge-profile mt-15">
											<?php if(!empty($profile->image)) { ?>
											<a href="<?php echo base_url()?>crud/Download_image?image=<?php echo $profile->image;?>" class="">
												Download
											</a>
											<?php } ?>
                                    </button>
                                    <div class="row">
                                        <div class="col-xs-4 text-center mt-25 profile-link">
                                            <a href="">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 text-center mt-25 profile-link">
                                            <a href="">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </div>
                                        <div class="col-xs-4 text-center mt-25 profile-link">
                                            <a href="">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel">
                                <div class="panel-body panel-heading-wrapper">
                                    <h5 class="pull-left">Basic  info</h5>
										<button type="button" data-id="<?php echo $profile->user_id; ?>" name="submit" class="btn btn-custom pull-right userbutton"> Edit info </button>                                    
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">First name</span>
                                            </div>
                                            <div class="col-sm-9">
                                               <span class="profile-info"><?php echo $profile->full_name; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Position</span>
                                            </div>
                                            <div class="col-sm-9">
                                               <span class="profile-info"><?php echo $profile->position; ?></span>
                                            </div>
                                        </div>
                                    </div>


                                     <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Department</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->department; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Country</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->country; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Mailing Address</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->address; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Phone</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->contact; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Date of birth</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->dob; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Gender</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info"><?php echo $profile->gender; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="flashmessage"></span>
                  
                </div>
            </div>
        </div>   

		<div class="modal fade" id="usermodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                            <div class="modal-header modal-primary">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modal-label">User Modal</h4>
							</div>
                          <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
			            <form role="form"  id="UserValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
								<div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">user Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control" id="inputMaxLength" value='' placeholder="" required >
                                    </div>
                                </div>								
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">user email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" id="email" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div> 
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">user Contact</label>
                                    <div class="col-md-9">
                                        <input type="number" name="contact" id="contact" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">User Address</label>
                                    <div class="col-md-9">
                                        <input type="text" name="address" id="address" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="text" name="dob" id="dob" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div>
								
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Country</label>
                                    <div class="col-md-9">
                                        <input type="text" name="country" id="country" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div>									
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Gender</label>
								    <div class="col-md-9">
                                        <select name="gender" id="gender" class="form-control" style="width: 100%" required>                                    
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>  
                                        </select>                        
                                    </div>
                                </div>	

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Position</label>
                                    <div class="col-md-9">
                                        <select name="position" id="position" class="form-control" required>
                                            <option value="">Select Here</option>
                                            <option value="Hod">Head Of Department</option>
                                            <option value="Workshop">Workshop Supertendent</option>  
                                            <option value="Store">Store keeper</option>  
                                            <option value="Librarian">Librarian</option>  

                                        </select>                        
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Department</label>
    								<div class="col-md-9">
                                        <select name="department" id="department" class="form-control" required>
                                            <option value="">Select Here</option>
                                            <option value="Mech">Mechanical Engineering</option>
                                            <option value="Computer">Computer Technology</option>
                                            <option value="Civil">Civil Engineering</option>
                                            <option value="Electrical">Electrical Engineering</option>
                                            <option value="Electronics">Electronics & Telecommunication Engineering</option>  
                                            <option value="Workshop">Workshop Supertendent</option>  
                                            <option value="Store">Store keeper</option>  
                                            <option value="Librarian">Librarian</option>  

                                        </select>                        
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="file_prev">
                                            <?php if($profile->image){ ?>
                                                <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $profile->image; ?>" height="250" width="167">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/user/default.jpg" height="250" width="167">
                                            <?php } ?>
                                        </div>
                                        <label for="user_image" class="custom-file-upload">Upload image</label>
                                    </div>
                                    <div class="col-md-9 col-md-offset-3">
                                        <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp">
                                    </div>	
                                </div>									
                            </div>
                            <div class="modal-footer">
						        <div class="col-md-6">
                                    <input type="hidden" name="userid" id="userid" value=''>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" id="btnSubmit" name="submit" class="btn btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload();" class="btn btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
						</form>
                </div>
            </div>
        </div>
   <!--user information update system using jquery /Ajax-->
        <script type="text/javascript">
        $(document).ready(function () {
            $('.note_file').change(function() {
              $(this).parent().next('span').text('Image selected');
            });
        $("#btnSubmit").click(function (event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var formval = $('#UserValueUpdate')[0];

            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?php echo base_url(); ?>workshop/updateValue",
                dataType: 'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                window.setTimeout(function() {location.reload();}, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });

        });

    });
    </script> 
             			
<script type="text/javascript">
$(document).ready(function () {
    $(".userbutton").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#UserValueUpdate').trigger("reset");
        $('#usermodel').modal('show');
        $.ajax({
            url: 'viewUserDataBYID?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).done(function (response) {
            // Populate the form fields with the data returned from server
			$('#UserValueUpdate').find('[name="userid"]').val(response.uservalue.user_id).end();
            $('#UserValueUpdate').find('[name="name"]').val(response.uservalue.full_name).end();
            $('#UserValueUpdate').find('[name="email"]').val(response.uservalue.email).end();
			$('#UserValueUpdate').find('[name="contact"]').val(response.uservalue.contact).end();
            $('#UserValueUpdate').find('[name="address"]').val(response.uservalue.address).end();													
            $('#UserValueUpdate').find('[name="dob"]').val(response.uservalue.dob).end();
			$('#UserValueUpdate').find('[name="country"]').val(response.uservalue.country).end();
			$('#UserValueUpdate').find('[name="gender"]').val(response.uservalue.gender).end();
			$('#UserValueUpdate').find('[name="position"]').val(response.uservalue.position).end();
            $('#UserValueUpdate').find('[name="department"]').val(response.uservalue.department).end(); 
			$('#UserValueUpdate').find('[name="product_image"]').val(response.uservalue.image).end();
		});
    });
});
</script>			
<?php $this->load->view('workshop/footer'); ?> 			