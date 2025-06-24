<?php $this->load->view('civil/header'); ?>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-ghost"></i>User list</h1>
            </div>
            <span class="flashmessage"></span>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Users</h5>
                            </div>
                            <div class="table_body text-left">
                                <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>                                           
                                            <th>User Id</th>
                                            <th>Full name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($userlist as $value): ?>
                                        <tr>
                                            <td>
                                            <?php if(!empty($value->image)){ ?>
                                            <a href="<?php echo base_url(); ?>civil/View_profile?U=<?php echo base64_encode($value->user_id) ?>">
                                                <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $value->image ?>" alt="Starter kit"></a>
                                            <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/user/default.jpg" alt="Starter kit">                                           
                                            <?php } ?>
                                            </td>
                                            <td><?php echo $value->user_id ?></td>
                                            <td><a href="<?php echo base_url(); ?>civil/View_profile?U=<?php echo base64_encode($value->user_id) ?>"><?php echo $value->full_name ?></a></td>
                                            <td><?php echo $value->email ?></td>
                                            <td><?php echo $value->gender ?></td>
                                            <td><?php echo $value->country ?></td>
                                            
                                            <td class="action-buttons">
                                                <a href="<?php echo base_url(); ?>civil/View_profile?U=<?php echo base64_encode($value->user_id) ?>">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                <button type="button" name="submit" class="userbutton" data-id="<?php echo $value->user_id; ?>">
                                                    <i class="icon-pencil"></i>
                                                </button>
                                                <a onclick="return confirm('Are you sure to delete this data?')" href="user_delet?id=<?php echo $value->user_id; ?>"<?php if($value->user_id == $this->session->userdata('user_login_id')){ echo 'hidden'; } ?> >
                                                    <i class="icon-close"></i>
                                                </a>                            
                                            </td>
                                        </tr>
                                        <?PHP endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>          

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
 	
                            
			            <form role="form" action="updateValue"  id="UserValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="modal-body">
    							<div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" class="form-control" id="inputMaxLength" value='' placeholder="" required >
                                    </div>
                                </div>								
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" id="email" class="form-control" value='' placeholder="" required>
                                    </div>
                                </div> 
                                <div class="form-group clearfix">
                                <label for="textareaMaxLength" class="col-md-3">Contact</label>
                                <div class="col-md-9">
                                    <input type="number" name="contact" id="contact" class="form-control" value='' placeholder="" required>
                                </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">Address</label>
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
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>  
                                        </select>                        
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="textareaMaxLength" class="col-md-3">User Role</label>
    								<div class="col-md-9">
                                        <select name="role" id="role" class="form-control" style="width: 100%" required>                                    
                                            <option value="">Select Here</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>  
                                        </select>                        
                                    </div>
                                </div>                                
                                <div class="form-group clearfix">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="file_prev" style="display: inline-block;"></div>
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
                                    <span class="pull-left"></span>                  
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" id="btnSubmit" name="submit" class="btn btn-default btn-custom">Ok</button>
                                    <button type="button" onclick="location.reload()" class="btn btn-success btn-custom" data-dismiss="modal">Close</button>
                                </div>
                            </div>
						</form>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        $(document).ready(function () {
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
                url: "<?php echo base_url(); ?>civil/updateValue",
                data: data,
                dataType:'json',
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
                if (response.status == 'error') {
                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                } else if (response.status == 'success') {
                    console.log(response.status);
                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                    window.setTimeout(function() {
                        location.reload();
                    }, 3000);
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
                url: '<?php echo base_url(); ?>civil/viewUserDataBYID?id=' + iid,
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
				$('#UserValueUpdate').find('[name="role"]').val(response.uservalue.user_type).end();
				$('#UserValueUpdate').find('[name="product_image"]').val(response.uservalue.image).end();
			});
        });
    });
</script>

			
<?php $this->load->view('civil/footer'); ?>