<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.png">

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
                        <h5>College Inventory | Login</h5>
                    </div>
                </div>
            </div>
            <div class="form-wrapper">
				<?php if(!empty($this->session->flashdata('feedback'))){ ?>
    				<div class="message">
    				    <?php echo $this->session->flashdata('feedback')?>
    				</div>
				<?php
				    }
				?>                            
				<?php if(!empty($message)){ ?>
    				<div class="message">
                        <?php echo validation_errors(); ?>
                        <?php echo @$message; ?>
    				    <?php echo @$captchaMessage; ?>
    				</div>
				<?php
				    }
				?>							
				<?php echo form_open('login/signIn'); ?>
                <div class="form">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" aria-describedby="" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" class="form-control" id="password" aria-describedby="" placeholder="Enter password" required>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me plz!</label>
                    </div>

                    <!--<div class="form-group">-->
                    <!--    <div class="g-recaptcha" data-sitekey="6Lep8j8UAAAAAPzS5eNVxLxQ6Higp1C10qTCwbbZ"></div>-->
                    <!--</div>                                    -->

                    <input type="submit" class="btn btn-custom btn-fullwidth" id="loginBtn" data-id="dashboard" value="Submit">
                </div>
				<?php echo form_close(); ?>
    	        <div class="login-footer">
                    <a href="<?php echo base_url(); ?>login/forgotten_page">Forgot Password</a><!--  | <a href="<?php echo base_url(); ?>login/viewSignUp">Register</a> -->
                </div>       
            </div>
        </div>
    </div>   
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
            $('form').validate();
    </script>

</body>

</html>