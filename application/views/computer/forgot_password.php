<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CRUD :: DotDev</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
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
                                        <h5>Admin Template | Request Reset</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wrapper">
                            <div class="form-info">
                                Insert a valid email address to reset your password.
                            </div>
							<?php if($this->session->flashdata('feedback')){ ?>
							<div class="message">
							<?php echo $this->session->flashdata('feedback');?>
							</div>
							<?php
							}
							?>							
							<?php echo form_open('login/forgot_password'); ?>
                            <div class="form">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                </div>
                                <input type="submit" class="btn btn-custom btn-fullwidth" value="Submit">
                            </div>
							<?php echo form_close(); ?>
							<div class="login-footer">
                                <a href="<?php echo base_url(); ?>login/viewSignUp">Register</a> | <a href="<?php echo base_url(); ?>login/signIn">Login</a>
                            </div>
                        </div>
						
                    </div>
                </div>
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/main.js"></script> -->

    <script type="text/javascript">
            $('form').validate();
    </script>

</body>

</html>