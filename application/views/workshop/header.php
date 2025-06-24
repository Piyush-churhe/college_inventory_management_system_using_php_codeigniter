<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>icon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap3.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.standalone.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css">
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <style type="text/css">
        nav .navbar-nav li > a {
            color: #fff;
        }
        nav.navbar {
            background-color: rgba(123, 31, 162, 0.79);
        }
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: rgba(123, 31, 162, 0.79);
            border-color: rgba(123, 31, 162, 0.79);
            border-color: #0288d0;
            color: #fff;
        }
        .navbar-nav>.open>a, .nav>li>a:focus, .nav>li>a:hover {
            background-color: transparent;
            color: #fff;
        }
        
        .left-sidebar {
            background-color: rgb(41, 64, 98);
        }
        .sidebar-nav ul > li a {
            color: #fff;
        }
        .sidebar-nav ul > li.menu-header {
            color: #fff;
        }
        .sidebar-nav>ul>li.active>a {
            background-color: rgba(255, 255, 255, 0.09);
        }
        .sidebar-nav ul li.active a i, .sidebar-nav ul li a:hover i {
            color: #fff;
        }
    </style>
</head>
<?php $settingsvalue = $this->workshop_model->getSettingsValue(); ?>
<?php if(!empty($this->session->userdata('user_login_id'))){
    $userid = $this->session->userdata('user_login_id');
    $profilevalue = $this->workshop_model->GetProfileValue($userid);
}
?>
<body>
    <div class="wrapper-main">
        <header class="topbar clearfix">
            <nav class="navbar navbar-fixed-top bg-white">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-options-vertical"></span>
                        </button>
                        <button id="sidebar-toggle" type="button" class="navbar-toggle toggle-sidebar-bars" data-target="#sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-menu"></span>
                        </button>
                        <a class="navbar-brand text-center" href="<?php echo base_url(); ?>">
                            <span style="color:white">Inventory</span>
                            </a>
                    </div>
                    <?php /*echo $this->session->flashdata('feedback');*/ ?>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="hidden-xs">
                                <a href="#" class="sidebar-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown notification-parent">
                                <style>
                                    .notification-count i:after {
                                        content: attr(data-badge);
                                        position: absolute;
                                        top: -8px;
                                        right: -8px;
                                        font-size: 8px;
                                        background: #F44336;
                                        color: white;
                                        width: 15px;
                                        height: 15px;
                                        text-align: center;
                                        line-height: 14px;
                                        border-radius: 50%;
                                    }
                                    .notification-count-changed i:after {
                                        content: '0' !IMPORTANT;
                                    }
                                </style>
                              
                            </li>
                          
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="user-img pull-left">
                                        <img alt="Dotdev" src="<?php echo base_url(); ?>assets/img/user/<?php echo $profilevalue->image; ?>">
                                    </span><?php echo $profilevalue->full_name; ?> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu topbar-dropdown-wrapper" role="menu">
                                    <ul class="dropdown-user-inner">
                                        <li>
                                            <div class="dd-userbox">
                                                <div class="dd-img">
                                                    <img alt="product management" src="<?php echo base_url(); ?>assets/img/user/<?php echo $profilevalue->image; ?>">
                                                </div>
                                                <div class="dd-info">
                                                    <h4>
                                                        <?php echo $profilevalue->full_name; ?>
                                                    </h4>
                                                    <p>
                                                        <?php echo $profilevalue->email; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li> 
                                        <li data-id="users" class="main"><a href="<?php echo base_url();?>workshop/View_profile?U=<?php echo base64_encode($this->session->userdata('user_login_id')); ?>"><i class="icon-user mr10"></i> Profile</a></li>
                                        <li><a id="resetmodal" href=""><i class="icon-key mr10"></i> Change Password</a></li>
                                        <li class="divider"></li>
                       
                                      
                                        <li data-id="dashboard" class="main"><a href="<?php echo base_url();?>login/logout"><i class="icon-logout mr10"></i> Sign Out</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
      
        </header>
        <aside class="left-sidebar">
            <div class="slimscroll-left-sidebar">
                <nav class="sidebar-nav">
                    <ul>
                        <li data-id="dashboard" id="dashboard" class="main">
                            <a class="" href="<?php echo base_url(); ?>" aria-expanded="false">
                                <i class="icon-grid"></i>
                                <span class="">
                                    Dashboard
                                </span>
                            </a>
                        </li>
               
                        <li data-id="product" id="product" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-tag"></i>
                                <span class="">
                                    Product
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>workshop/product_list">List Product</a></li>
                            </ul>
                        </li>
                     
                      
                                            
                </nav>
            </div>
        </aside>        	