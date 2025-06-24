<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In | CI CRUD | DotDEv</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
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
                        <h6>Admin Template | Register</h6>
                    </div>
                </div>
            </div>
            <div class="form-wrapper">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Fullname">
                </div>                                
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                </div>                                
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm password">
                </div>
                
                <input type="submit" class="btn btn-custom btn-fullwidth">
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/bootstrap3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
</body>

</html>