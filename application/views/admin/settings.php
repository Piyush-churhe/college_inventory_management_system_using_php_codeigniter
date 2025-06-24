<?php $this->load->view('admin/header'); ?>
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="fa fa-cog" aria-hidden="true"></i> Configuration</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="panel no-border">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <div class="table_banner_title">
                                    <h5>Configuration</h5>
                                </div>
                            </div>
                            <div class="table_body">
                                <form action="addSettings" id="fileUploadForm" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                    <div class="form-group clearfix">
                                        <label for="" class="col-md-3">Upload site logo</label>
                                        <div class="col-md-9">
                                            <div class="file_prev inb">
                                                <?php if($settingsvalue->sitelogo){ ?>
                                                <img src="<?php echo base_url(); ?>assets/img/<?php echo $settingsvalue->sitelogo; ?>" height="100" width="167">
                                                <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>assets/img/ci-logo.png" height="100" width="167">
                                                <?php } ?>
                                            </div>
                                            <label for="img_url" class="custom-file-upload"><i class="fa fa-camera" aria-hidden="true"></i> Upload Logo</label>
                                            <input type="file" value="" class="" id="img_url" name="img_url" aria-describedby="fileHelp">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="title" class="col-md-3">Site Title</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title" value="<?php echo $settingsvalue->sitetitle; ?>" id="title" placeholder="Title...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="description" class="col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="description" value="<?php echo $settingsvalue->description; ?>" name="description" rows="6"><?php echo $settingsvalue->description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="copyright" class="col-md-3">Copyright</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="copyright" value="<?php echo $settingsvalue->copyright; ?>" id="copyright" placeholder="copyright...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="contact" class="col-md-3">Contact</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="contact" value="<?php echo $settingsvalue->contact; ?>" id="contact" placeholder="contact...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="currency" class="col-md-3">Currency</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="currency" value="<?php echo $settingsvalue->currency; ?>" id="currency" placeholder="currency...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="currency" class="col-md-3">Symbol</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="symbol" value="<?php echo $settingsvalue->symbol; ?>" id="symbol" placeholder="symbol...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="email" class="col-md-3">System Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $settingsvalue->system_email; ?>" placeholder="email...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <label for="address" class="col-md-3">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $settingsvalue->address; ?>" placeholder="address...">
                                        </div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-9 col-md-offset-3">
                                            <input type="hidden" name="id" value="<?php echo $settingsvalue->id; ?>" />
                                            <button type="submit" name="submit" id="btnSubmit" class="btn btn-custom">Submit</button>
                                            <span class="flashmessage"><?php echo $this->session->flashdata('feedback'); ?></span>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/footer'); ?>