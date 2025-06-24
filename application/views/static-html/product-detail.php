<?php $this->load->view('backend/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Product details</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="product-full">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="<?php echo base_url(); ?>assets/img/khai.jpg" alt="Los Angeles">
                                            </div>
                                            <div class="item">
                                                <img src="<?php echo base_url(); ?>assets/img/banana.jpg" alt="Chicago">
                                            </div>
                                            <div class="item">
                                                <img src="<?php echo base_url(); ?>assets/img/sarah.jpg" alt="New York">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel">
                                <div class="panel-body">
                                    <div class="elevate-wrapper">
                                        <div class="elevate-wrapper">
                                            <a href="" class="elevate-img-link">
                                                <img id="zoom_03" src="<?php echo base_url(); ?>assets/img/product/pro1.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/pro1.jpg"/>
                                            </a>                                   
                                        </div>
                                    </div>


                                    <div class="elevate-gallery">
                                        <div id="gallery_01">
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/pro1.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/pro1.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/pro1.jpg" />
                                        </a>
                                                                                                                     
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/pro2.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/pro2.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/pro2.jpg" />
                                        </a>
                                                                                       
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/pro3.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/pro3.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/pro3.jpg" />
                                        </a>
                                                                                       
                                        <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/Untitled-3.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/Untitled-3.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/Untitled-3.jpg" />
                                        </a>
                                           
                                        </div>                           
                                    </div>

                                </div>
                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2>Hand bag mama</h2>
                                            <span class="price d-block"> $230 – $242 </span>
                                            <hr class="header-divider">
                                            <span class="availability d-block">23 in stock</span>
                                            <p class="product-description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                                            </p>
                                            <div class="color-size">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label for="product_color">Color</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="value">
                                                            <div class="variation-selector variation-select-label hidden">
                                                                <select id="product_color" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes">
                                                                    <option value="">Choose an option</option>
                                                                    <option value="red" class="">L</option>
                                                                    <option value="green" class="">M</option>
                                                                    <option value="darkorange" class="">S</option>
                                                                </select>
                                                            </div>
                                                            <div class="product-switches" data-attribute_name="attribute_pa_size">

                                                            <span class="switch switch-label switch-color switch-red" title="Red" data-value="red" style="background-color: red"></span>
                                                            <span class="switch switch-label switch-color switch-green" title="Green" data-value="green" style="background-color: green"></span>
                                                            <span class="switch switch-label switch-color switch-darkorange" title="Dark orange" data-value="darkorange" style="background-color: darkorange"></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">
                                                            <label for="product_size">Size</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="value">
                                                            <div class="variation-selector variation-select-label hidden">
                                                                <select id="product_size" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes">
                                                                    <option value="">Choose an option</option>
                                                                    <option value="l" class="">L</option>
                                                                    <option value="m" class="">M</option>
                                                                    <option value="s" class="">S</option>
                                                                    <option value="xl" class="">XL</option>
                                                                    <option value="xxl" class="">XXL</option>
                                                                </select>
                                                            </div>
                                                            <div class="product-switches" data-attribute_name="attribute_pa_size">

                                                            <span class="switch switch-label switch-l" title="L" data-value="l">L</span>
                                                            <span class="switch switch-label switch-m" title="M" data-value="m">M</span>
                                                            <span class="switch switch-label switch-s" title="S" data-value="s">S</span>
                                                            <span class="switch switch-label switch-xl" title="XL" data-value="xl">XL</span>
                                                            <span class="switch switch-label switch-xxl" title="XXL" data-value="xxl">XXL</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div><!-- /.color-size  -->
                                            <div class="stock-sku">
                                                <div class="sku mt-25">
                                                    SKU: <span>DRX69</span>
                                                </div>
                                                <div class="sku mt-25">
                                                    Category: <span>Bello</span>
                                                </div>
                                                <div class="sku mt-25">
                                                    Tag: <span>Balla</span>
                                                </div>
                                            </div>
                                            <div class="btn btn-custom mt-15">Add to cart</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body list-heading">
                                    <h5>Description</h5>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel">
                                    <div class="panel-body list-heading">
                                        <h5>Related products</h5>
                                    </div>
                                        <div class="panel-body">
                                        <div class="row">
                                        <div class="col-md-3 col-xs-12 col-sm-12 pb-15 mb-15">
                                <div class="related-products" style="background-image: url(http://localhost/crud/assets/img/product/pro1.jpg); background-size: cover;">
                                                    <a href="#">
                                                        <div class="overlay"></div>
                                                        <div class="related-products-link">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="related-name">
                                                         Pete Bellis                                                     </div>
                                                    <div class="related-price">
                                                        $250                                                    </div>
                                                    <div class="product-info-icon">
                                                        <a href="viewpro?P=UDExMA==">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>

                                            </div>
                                            <div class="col-md-3 col-xs-12 col-sm-12 pb-15 mb-15">
                                                <div class="related-products" style="background-image: url(http://localhost/crud/assets/img/product/pro4.jpg); background-size: cover;">
                                                    <a href="#">
                                                        <div class="overlay"></div>
                                                        <div class="related-products-link">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="related-name">
                                                        Portrait of a cute blonde                                                    </div>
                                                    <div class="related-price">
                                                        $250                                                    </div>
                                                    <div class="product-info-icon">
                                                        <a href="viewpro?P=UDY3NA==">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>

                                            </div>                                                                 <div class="col-md-3 col-xs-12 col-sm-12 pb-15 mb-15">
                                                <div class="related-products" style="background-image: url(
                                                                                                        http://localhost/crud/assets/img/product/bag1.jpg                                                                                                    ); background-size: cover;">
                                                    <a href="viewpro?P=UDI5Ng==">
                                                        

                                                        
                                                        <div class="overlay"></div>
                                                        <div class="related-products-link">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="related-name">
                                                        TWIST TOTE                                                    </div>
                                                    <div class="related-price">
                                                        $250                                                    </div>
                                                    <div class="product-info-icon">
                                                        <a href="viewpro?P=UDI5Ng==">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>

                                            </div>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row  -->
                </div>
                <!-- /.container-fluid  -->
            </div>
            <!-- /.page-content  -->
        </div>
<?php $this->load->view('backend/footer'); ?>