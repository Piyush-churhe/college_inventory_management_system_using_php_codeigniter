<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Steller | Madcoderz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>icon.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css"> 
    
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

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

<?php $settingsvalue = $this->crud_model->GetSettingsValue(); ?>
<?php if(!empty($this->session->userdata('user_login_id'))){
    $userid = $this->session->userdata('user_login_id');
    $profilevalue = $this->crud_model->GetProfileValue($userid);     
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
                            <img src="<?php echo base_url(); ?>assets/img/<?php echo $settingsvalue->sitelogo; ?>" alt="C">
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
                                <a href="" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                                    <i class="icon-bell notification-icon"></i> <span class="hidden-sm hidden-md hidden-lg notification-text">Notification</span>
                                </a>
                                <ul class="dropdown-menu dropdown-box">
                                    <li class="dropdown-head">
                                        Notifications
                                    </li>
                                    <li class="box-list">
                                        <a href="">
                                            <div class="media">
                                                <div class="media-left box-img">
                                                    <img src="<?php echo base_url(); ?>assets/img/clients-thumb/six.png">
                                                </div>
                                                <div class="media-body box-text">
                                                    <h6>Tom Baier</h6>
                                                    <p>Lorem ipsum dolor sit amet amra</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="media">
                                                <div class="media-left box-img">
                                                    <img src="<?php echo base_url(); ?>assets/img/clients-thumb/three.png">
                                                </div>
                                                <div class="media-body box-text">
                                                    <h6>John Doe</h6>
                                                    <p>Ipsum, quam, corporis.</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="media">
                                                <div class="media-left box-img">
                                                    <img src="<?php echo base_url(); ?>assets/img/clients-thumb/two.png">
                                                </div>
                                                <div class="media-body box-text">
                                                    <h6>Bella Bose</h6>
                                                    <p>This text is not supposed to be here.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="dropdown-foot">
                                        View all
                                    </li>
                                </ul>
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
                                        <li data-id="users" class="main"><a href="<?php echo base_url();?>crud/View_profile?U=<?php echo base64_encode($this->session->userdata('user_login_id')); ?>"><i class="icon-user mr10"></i> Profile</a></li>
                                        <li><a id="resetmodal" href=""><i class="icon-key mr10"></i> Change Password</a></li>
                                        <li class="divider"></li>    
                                        <li data-id="configuration" class="main"><a href="<?php echo base_url()?>crud/Site_Settings"><i class="icon-settings mr10"></i> Configuration</a></li>
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
                        <li data-id="users" id="users" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="">
                                    Users
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>crud/List_user_updated">List User</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/Add_User">Add User</a></li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata('user_type') == 'Admin'){ ?>
                        <li data-id="user-role" id="user-role" class="main">
                            <a class="" href="<?php echo base_url(); ?>crud/ListGroup" aria-expanded="false">
                                <i class="icon-shuffle"></i>
                                <span class="">
                                    Users Role
                                </span>
                            </a>
                        </li>
                        <?php } ?>
                        <li data-id="product" id="product" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-tag"></i>
                                <span class="">
                                    Product
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li><a href="<?php echo base_url(); ?>crud/view_category">Category</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/view_subcategory">Subcategory</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/view_size">Size</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/view_color">Color</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/view_brand">Brand</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/product_list">List Product</a></li>
                                <li><a href="<?php echo base_url(); ?>crud/View_Product">Add Product</a></li>
                            </ul>
                        </li>
                         <?php if($this->session->userdata('user_type') == 'Admin'){ ?>
                        <li data-id="configuration" id="configuration" class="main">
                            <a class="" href="<?php echo base_url(); ?>crud/Site_Settings" aria-expanded="false">
                                <i class="icon-settings" aria-hidden="true"></i>
                                <span class="">
                                    Configuration
                                </span>
                            </a>
                        </li>
                        <?php } ?> 
                        <li data-id="backup" id="backup" class="main">
                            <a class="" href="<?php echo base_url(); ?>crud/Backup_page" aria-expanded="false">
                               <i class="icon-arrow-down-circle" aria-hidden="true"></i>
                                <span class="">
                                    Backup
                                </span>
                            </a>
                        </li>
                        
                        <li class="main menu-header">
                            Static HTML
                        </li>   
                        <li data-id="pages" id="pages" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                               <i class="icon-cursor" aria-hidden="true"></i>
                               <span>
                                   Pages
                               </span>
                            </a>
                            <ul aria-expanded="true" class="">                               
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/Blank">
                                        Blank
                                    </a>
                                </li>                                
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/Login">
                                        Login
                                    </a>
                                </li>                                
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/profile">
                                        Profile
                                    </a>
                                </li>                                 
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/product">
                                        Product
                                    </a>
                                </li>                              
                                <li class="main">
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                        <i class="icon-exclamation"></i>
                                        <span class="">
                                            Errors
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a class="" href="<?php echo base_url();?>Static_html/demo_404">
                                                404
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="<?php echo base_url();?>Static_html/demo_403">
                                                403
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="<?php echo base_url();?>Static_html/demo_500">
                                                500
                                            </a>
                                        </li>
                                    </ul>
                                </li>                               
                            </ul> 
                        </li>    
                        <li data-id="charts" id="charts" class="main">
                            <a class="" href="<?php echo base_url();?>Static_html/Chart" aria-expanded="false">
                               <i class="icon-chart" aria-hidden="true"></i>
                                <span class="">
                                    Charts
                                </span>
                            </a>
                        </li>
                        <li data-id="products" id="products" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-bag"></i>
                                <span class="">
                                    Products
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">                               
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/product_list">
                                        Product List
                                    </a>
                                </li>                                
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/product_details">
                                        Product details
                                    </a>
                                </li>                              
                                <li>
                                    <a class="" href="<?php echo base_url();?>Static_html/invoice">
                                        Invoicing
                                    </a>
                                </li>                               
                            </ul> 
                        </li>
                        <li data-id="forms" id="forms" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-tag"></i>
                                <span class="">
                                    Forms
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">                         
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/forms_elements">
                                        Form Elements
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/Forms_validation">
                                        Form Validation
                                    </a>
                                </li>                         
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/forms_wizard">
                                        Form Wizard
                                    </a>
                                </li>                         
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/dropzone">
                                        Dropzone
                                    </a>
                                </li>                           
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/text_editor">
                                        Text Editor
                                    </a>
                                </li>                          
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/select_two">
                                        Select
                                    </a>
                                </li>                          
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/datepicker">
                                        Datepicker
                                    </a>
                                </li>                       
                           </ul>                        
                        </li> 
                        <li data-id="tables" id="tables" class="main">
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="icon-list"></i>
                                <span class="">
                                    Tables
                                </span>
                            </a>
                            <ul aria-expanded="true" class="">
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/Datatable">
                                        Datatable
                                    </a>
                                </li>                     
                                <li>
                                    <a href="<?php echo base_url();?>Static_html/Table_normal">
                                        Normal table
                                    </a>
                                </li>                                                   
                           </ul>                        
                        </li>   
                        <li data-id="calendar-static" id="calendar-static" class="main">
                            <a class="" href="<?php echo base_url();?>Static_html/Calendar" aria-expanded="false">
                               <i class="icon-calendar" aria-hidden="true"></i>
                                <span class="">
                                    Calender
                                </span>
                            </a>
                        </li>
                    </ul>                      
                </nav>
            </div>
        </aside>   
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Form Wizard</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body wizard-content">
                                    <form id="example-form" action="#">
                                        <div>
                                            <h6>Account</h6>
                                            <section>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userName"> Username </label>
                                                        <input type="text" class="form-control required" id="userName" name="userName" aria-required="true" aria-invalid="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password"> Password </label>
                                                        <input type="text" class="form-control required" id="password" name="password" aria-required="true" aria-invalid="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm"> Confirm </label>
                                                        <input type="text" class="form-control required" id="confirm" name="confirm" aria-required="true" aria-invalid="true">
                                                    </div>
                                                </div>
                                            </section>
                                            <h6>Profile</h6>
                                            <section>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name"> First name </label>
                                                        <input type="text" class="form-control required" id="name" name="name" aria-required="true" aria-invalid="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="surname"> Last name </label>
                                                        <input type="text" class="form-control required" id="surname" name="surname" aria-required="true" aria-invalid="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email"> Email </label>
                                                        <input type="text" class="form-control required email" id="email" name="email" aria-required="true" aria-invalid="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address"> Address </label>
                                                        <input type="text" class="form-control required" id="address" name="address" aria-required="true" aria-invalid="true">
                                                    </div>
                                                </div>
                                            </section>
                                            <h6>Finish</h6>
                                            <section>
                                                <div class="form-group">
                                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="form-control required">
                                                    <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                                </div>
                                            </section>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            © 2018 Codeigniter Starter Kit by madcoderz.dotdev.pro
        </div>
    </div>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.slimscroll.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.sidebar-toggle').on('click', function(e) {
                e.preventDefault();
                $('.left-sidebar').toggleClass('aside-margin');
                $('.wrapper-page').toggleClass('wrapper-margin');
                $(".footer").toggleClass("wrapper-margin");
            });
            $("#sidebar-toggle").on("click", function() {
                $(".left-sidebar").toggleClass("aside-margin-sm");
                $(".wrapper-page").toggleClass("wrapper-margin");
            });
            $(".toggle-sidebar-bars").click(function(event) {
                event.preventDefault();
                $(".left-sidebar").toggleClass("toggle-sidebar");
            });
            expandSidebarMenuItem();
            setMenuItemActive();
        });

        function expandSidebarMenuItem() {
            $(".sidebar-nav  ul  li  a").click(function() {
                var $target = $(this).parent();
                if ($target.hasClass("main")) {
                    if ($target.hasClass("active")) {
                        $target.removeClass("active");
                    } else {
                        $(".sidebar-menu > li").removeClass("active");
                        $target.addClass("active");
                    }
                    if (!$(this)
                        .closest("li")
                        .find("ul")
                        .children().length == 0) {
                        return false;
                    }
                }
            });
        }

        function setMenuItemActive() {
            $("li.main").click(function(e) {
                localStorage.setItem("thisLink", $(this).attr("data-id"));
                e.stopPropagation();
            });

            $(".navbar-brand, #loginBtn").click(function(e) {
                localStorage.setItem("thisLink", "dashboard");
                e.stopPropagation();
            });

            thisLink = localStorage.getItem("thisLink");
            if (thisLink) {
                $("#" + thisLink).addClass("active");
            }
        }

        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            autoFocus: true,
            enableKeyNavigation: true,
            enablePagination: true,
            suppressPaginationOnFocus: true,
            enableContentCache: true,
            enableFinishButton: true,
            startIndex: 0,
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                alert("Submitted!");
            },
            labels: {
                finish: "Finish",
                next: "Next",
                previous: "Previous",
            }
        });
    </script>
    <script type="text/javascript">
    $(function() {
        $('.slimscroll-left-sidebar').slimScroll({
            height: '100%',
            color: '#878787',
            disableFadeOut: true,
            borderRadius: 0,
            size: '4px',
            alwaysVisible: false
        });

        /*SELECT OPTIONS*/
        $('.switch-label').click(function() {
            $('#product_color').val($(this).data('value')).trigger('change');
            $(this).addClass('selected');
            $(this).siblings().removeClass('selected');
            $('#product_size').val($(this).data('value')).trigger('change');
            $(this).addClass('selected');
            $(this).siblings().removeClass('selected');
        });

    });
</script>
</body>

</html>