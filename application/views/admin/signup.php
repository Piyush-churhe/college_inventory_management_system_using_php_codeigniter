<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>College Inventory</title>
    <meta name="description" content="">
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
                                        <h5>College Inventory | Register</h5>
                                    </div>
                                </div>
                            </div>
                        <div class="form-wrapper">
                        <!--Validation error message-->
							<?php if(!empty($message)){ ?>
							<div class="message">
							<?php echo @$message;?>
							</div>
							<?php } else if ($this->session->flashdata('feedback')) { ?>
								<div class="message">
								<strong>Danger! </strong><?php echo $this->session->flashdata('feedback')?>
								</div>
							<?php } ?>								
							<?php echo form_open('login/user_SignUP'); ?>
                            <div class="form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter fullname" required>
                                </div>                                
								<div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="Enter password" required>
                                </div>                                
								<div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" id="confirmPassword" aria-describedby="confirmPassword" placeholder="Confirm password" equalTo="#password" required>
                                </div>
								
                                <input type="submit" class="btn btn-custom btn-fullwidth" value="Submit">
                            </div>
							<?php echo form_close(); ?>
                            <div class="login-footer">
                                <a href="<?php echo base_url(); ?>login/forgotten_page">Forgot Password</a> | <a href="<?php echo base_url(); ?>login/signIn">Login</a>
                            </div> 
                        </div>
                    </div>
                </div>
    <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    
    <script type="text/javascript">
            $('form').validate();
    </script>
</body>

</html>