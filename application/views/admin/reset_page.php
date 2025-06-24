<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
    <style type="text/css">
        .form-wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 50px;
            background-color: #fff;
            animation: flip;
            animation-duration: 320ms;
        }
        @keyframes flip {
            from {
                transform: rotateY(180deg);
            }
            to {
                transform: rotateY(0deg);
            }
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://chrome.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <div id="wrapper" class="wrapper-login">
        <div class="login-inner">
            <div class="panel mb-5">
                <div class="panel-body p2050">
                    <div class="form-header">
                        <h5>Admin Template | Register</h5>
                    </div>
                </div>
            </div>
                        <div class="form-wrapper">
							<?php if($this->session->flashdata('feedback')){ ?>
							<div class="message">
							<strong>Danger! </strong><?php echo $this->session->flashdata('feedback');?>
							</div>
							<?php
							}
							?>							
							<?php echo form_open('login/resetPasswordValidation'); ?>
                            <div class="form">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>
                                </div>
                            </div>                            
							<div class="form">
                                <div class="form-group">
                                    <input type="password" name="confirm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <input type="hidden" name="reset_key" value="<?php echo $key ?>">
							<input type="submit" class="btn btn-custom btn-fullwidth">
							<?php echo form_close(); ?>
							<div class=""><a href="SignUp">Register</a></div>
                        </div>
						
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap-select.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/main.js"></script> -->

</body>

</html>