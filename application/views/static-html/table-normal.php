<?php $this->load->view('backend/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Normal Table</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Normal table</h5>
                            </div>
                            <div class="table_body table-responsive text-left">
                                <table class="table table_custom table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid #ddd !IMPORTANT;">Image</th>
                                            <th style="border: 1px solid #ddd !IMPORTANT;">Firstname</th>
                                            <th style="border: 1px solid #ddd !IMPORTANT;">Lastname</th>
                                            <th style="border: 1px solid #ddd !IMPORTANT;">Email</th>
                                            <th style="border: 1px solid #ddd !IMPORTANT;">Hobby</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/five.png" alt="User Image"></td>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john_doe@john_doe.com</td>
                                            <td>Biking and fishing</td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/four.png" alt="User Image"></td>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary.jane@maryjane.com</td>
                                            <td>Riding and travelling</td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/nine.png" alt="User Image"></td>
                                            <td>Hansen</td>
                                            <td>Blake</td>
                                            <td>hansen_blake@hansen_blake.net</td>
                                            <td>Speaking in public</td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/seven.png" alt="User Image"></td>
                                            <td>Sara</td>
                                            <td>Barkley</td>
                                            <td>sara_barkley@sarabarkley.pro</td>
                                            <td>Watching telly</td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/six.png" alt="User Image"></td>
                                            <td>Rio</td>
                                            <td>Zeniro</td>
                                            <td>riozeniro@domained.com</td>
                                            <td>Sleeping and coding</td>
                                        </tr>
                                        <tr>
                                            <td><img src="<?php echo base_url(); ?>assets/img/clients-thumb/ten.png" alt="User Image"></td>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                            <td>Coffee, coffee and coffee</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer'); ?>