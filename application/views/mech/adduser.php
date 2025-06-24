<?php $this->load->view('mech/header'); ?>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-user"></i> Add Teacher</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">                   
                <div class="row">
                    <div class="col-md-8">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Create Teacher</h5>
                            </div>
                            <form role="form" action="addUserInfo"  id="UserValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                <div class="p2415">
    								<div class="form-group clearfix">
                                        <label for="inputMaxLength" class="col-md-3">Username</label>
                                        <div class="col-md-9">
                                            <input type="text" name="name" id="name" class="form-control" id="inputMaxLength" value='' placeholder="" minlength="5" maxlength="25" required >
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="textareaMaxLength" class="col-md-3">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" name="email" id="email" class="form-control" value='' placeholder="" required>
                                        </div>
                                    </div> 
                                    <div class="form-group clearfix">
                                        <label for="textareaMaxLength" class="col-md-3">Contact number</label>
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
                                        <label for="textareaMaxLength" class="col-md-3">Date of birth</label>
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
                                                <option selected>Select here</option>
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>  
                                            </select>                        
                                        </div>
                                    </div>	

                                   
                                    <div class="form-group clearfix">
                                        <div class="col-md-9 col-md-offset-3">
                                            <div class="file_prev"></div>
                                            <label for="user_image" class="custom-file-upload">Upload image</label>
                                        </div>
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp" required>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="hidden" name="userid" id="userid" value=''>
                                            <button type="submit" id="btnSubmit" name="submit" class="btn btn-custom">Submit</button>
                                            <span class="flashmessage"></span>
                                        </div>
                                    </div>								
                                </div>
    						</form>
                        </div>
                    </div>
                </div>          
            </div>            
        </div>
        </div>	


<?php $this->load->view('mech/footer'); ?>
