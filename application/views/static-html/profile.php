<?php $this->load->view('backend/header'); ?> 
         <div class="wrapper-page">
            <div class="page-title">
                <h1>Profile</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel profile">
                                <img src="<?php echo base_url() ?>assets/img/dotdev-pro.jpg" class="profile-img-top">
                                <div class="panel-body text-center">
                                    <div class="pro-img">
                                        <img src="<?php echo base_url(); ?>assets/img/user/default.jpg" height="250" width="167">
                                    </div>
                                    <h3>Nihar Roy</h3>
                                    <button class="btn badge badge-profile mt-15">
                                            <a href="#" class="">
                                                CTO
                                            </a>
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
                                        <button type="button" data-id="" data-toggle="modal" data-target="#usermodel" name="submit" class="btn btn-custom pull-right userbutton"> Edit info </button>                                    
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">First name</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">Nihar Roy</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Country</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">India</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Mailing Address</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">321/1, Mumbai, MB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Phone</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">+555 987 765</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Date of birth</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">12 october, 2018</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="profile-row clearfix">
                                            <div class="col-sm-3">
                                                <span class="profile-cat">Gender</span>
                                            </div>
                                            <div class="col-sm-9">
                                                <span class="profile-info">Male</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="flashmessage"></span>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body list-heading">
                                    <h5>User Notes</h5>
                                </div>
                                <div class="panel-body">
                                        <div class="form-group">
                                            <textarea name="description" cols="30" rows="6" class="form-control"></textarea>
                                        </div>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label class="hidden-input-label btn btn-custom">
                                                    <input type="file" name="note_file" class="note_file">
                                                    <span>Upload image</span>
                                                </label>
                                                <span class="note_file_link"></span>
                                            </div>
                                            <div class="form-group pull-right media-left">
                                                <input type="submit" name="submit" id="" class="btn btn-custom">
                                            </div>
                                        </div>
                                </div>
                                <div class="panel-body">
                                    <div class="media user-comments">
                                        <div class="media-left">
                                            <img src="<?php echo base_url(); ?>assets/img/user/default.jpg" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                                Nihar Roy
                                                <small><i>12-20-2017 6 hours ago</i></small>
                                            </h5>
                                            <p>Uploaded an image here!</p>
                                            <div class="uploaded_image">
                                                <a href="<?php echo base_url()?>assets/img/note/banana.jpg">
                                                    <img src="<?php echo base_url()?>assets/img/note/banana.jpg">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
                                <h4 class="modal-title" id="modal-label">Update profile</h4>
                            </div>
                        
    
                          <div style="color:green;padding:10px;font-size:20px" class="successUpdate"> </div>  
                        <form role="form"  id="UserValueUpdate" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group clearfix">
                                    <label for="inputMaxLength" class="col-md-3">Username</label>
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
                                        <input type="text" name="dob" id="dob" class="form-control datetimepicker" value='' placeholder="" required>
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
                                    <label for="textareaMaxLength" class="col-md-3">Role</label>
                                    <div class="col-md-9">
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="">Select Here</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>  
                                        </select>                        
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-md-9 col-md-offset-3">
                                        <div class="file_prev">
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
            });
        </script>                             
<?php $this->load->view('backend/footer'); ?>           