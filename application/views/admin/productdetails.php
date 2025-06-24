<?php $this->load->view('admin/header'); ?>
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
                                    <img src="<?php echo base_url(); ?>assets/img/product/banana.jpg" alt="Chicago">
                                    <div class="product-banner-title middle text-center">
                                        <h3>Product details</h3>
                                        <small>choose and buy</small>
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
                                           <?php if(!empty($productimage[0])){ ?>
                                            <a href="" class="elevate-img-link">
                                                <img id="zoom_03" src="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url; ?>" data-zoom-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url; ?>"/>
                                            </a>
                                         <?php } else{ ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/sample.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/sample.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/sample.jpg" />
                                          </a>
                                          <?php } ?>                                            
                                        </div>
                                    </div>

                                    <div class="elevate-gallery">
                                        <div id="gallery_01">
                                         <?php if(!empty($productimage[0])){ ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url;  ?>" data-zoom-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url;  ?>">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url;  ?>" />
                                          </a>
                                         <?php } else{ ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/default.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/default.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/default.jpg" />
                                          </a>
                                          <?php } ?>
                                          <?php if(!empty($productimage[1])){ ?>                                  
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[1]->img_url;  ?>" data-zoom-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[1]->img_url; ; ?>">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[1]->img_url;  ?>" />
                                          </a>
                                         <?php } else { ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/sample.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/sample.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/sample.jpg" />
                                          </a>
                                          <?php } ?>
                                          <?php if(!empty($productimage[2])){ ?>    
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[2]->img_url;  ?>" data-zoom-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[2]->img_url; ; ?>">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[2]->img_url;  ?>" />
                                          </a>
                                         <?php } else{ ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/sample.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/sample.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/sample.jpg" />
                                          </a>
                                          <?php } ?>
                                          <?php if(!empty($productimage[3])){ ?>    
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[3]->img_url;  ?>" data-zoom-image="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[3]->img_url;  ?>">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/<?php echo $productimage[3]->img_url;  ?>" />
                                          </a>
                                         <?php } else{ ?>
                                          <a href="#" data-image="<?php echo base_url(); ?>assets/img/product/sample.jpg" data-zoom-image="<?php echo base_url(); ?>assets/img/product/sample.jpg">
                                            <img id="img_01" src="<?php echo base_url(); ?>assets/img/product/sample.jpg" />
                                          </a>
                                          <?php } ?>  
                                        </div>                           
                                    </div>
                                </div>
                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h2><?php echo $productdetails->pro_name; ?></h2>
                                            <?php if(!empty($productdetails->discount)){ ?>
                                            <span class="price d-block"><del><?php echo $settingsvalue->symbol.$productdetails->selling_price; ?></del> – <?php echo $settingsvalue->symbol.$productdetails->discount; ?> </span>
                                            <?php } else { ?>
                                            <span class="price d-block"><?php echo $settingsvalue->symbol.$productdetails->selling_price; ?></span>                                            
                                            <?php } ?>
                                            <hr class="header-divider">
                                            <span class="availability d-block"><?php echo $productdetails->quantity; ?> in stock</span>
                                            <p class="product-description">
                                                <?php echo $productdetails->pro_summery; ?>
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
                                                                    <?php foreach($productcolor as $value): ?>
                                                                    <option value="<?php echo $value->color_name; ?>" class=""><?php echo $value->color_name; ?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <div class="product-switches" data-attribute_name="attribute_pa_size">
                                                            <?php foreach($productcolor as $value): ?>
                                                            <span class="switch switch-label switch-color switch-red" title="<?php echo $value->color_name; ?>" data-value="<?php echo $value->color_name; ?>" style="background-color: <?php echo $value->color_name; ?>"></span>
                                                            <?php endforeach;?>
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
                                                                   <?php foreach($productsize as $value): ?>
                                                                    <option value="$value->size_id; " class=""><?php echo $value->size_name; ?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <div class="product-switches" data-attribute_name="attribute_pa_size">
                                                            <?php foreach($productsize as $value): ?>
                                                            <span class="switch switch-label switch-l" title="<?php echo $value->size_name; ?>" data-value="<?php echo $value->size_name; ?>"><?php echo $value->size_name; ?></span>
                                                            <?php endforeach;?> 
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div><!-- /.color-size  -->
                                            <div class="stock-sku">
                                                <div class="sku mt-25">
                                                    SKU: <span><?php echo $productdetails->pro_sku; ?></span>
                                                </div>
                                                <div class="sku mt-25">
                                                    Category: <span><?php echo $productdetails->cat_name; ?></span>
                                                </div>
                                                <div class="sku mt-25">
                                                    Tag: <span><?php echo $productdetails->subcat_name; ?></span>
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
                                        <?php echo $productdetails->pro_details; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $catid = $productdetails->cat_id;
                        $proid = $productdetails->pro_id;
                        
                        $productvalue = $this->crud_model->GetRelatedproduct($catid, $proid); 
    /*                                   echo '<pre>';
                        print_r($settingsvalue);*/
                        if(!empty($productvalue)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel">
                                    <div class="panel-body list-heading">
                                        <h5>Related products</h5>
                                    </div>
                                    
                                    <div class="panel-body">
                                        <div class="row">
                                           <?php foreach($productvalue as $value): ?>
                                            <?php $productimage = $this->db->get_where('product_image', array('pro_id' => $value->pro_id))->result(); ?>
                                            <div class="col-md-3 col-xs-12 col-sm-12 pb-15 mb-15">
                                                <div class="related-products" style="background-image: url(
                                                    <?php if(!empty($productimage[0])){ ?>
                                                    <?php echo base_url(); ?>assets/img/product/<?php echo $productimage[0]->img_url ?>
                                                    <?php } else { ?>
                                                    <?php echo base_url(); ?>
                                                    <?php }?>
                                                ); background-size: cover;">
                                                    <a href="<?php echo base_url(); ?>crud/product_details?P=<?php echo base64_encode($value->pro_id) ?>">
                                                        <div class="overlay"></div>
                                                        <div class="related-products-link">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="related-name">
                                                        <a href="<?php echo base_url(); ?>crud/product_details?P=<?php echo base64_encode($value->pro_id) ?>">
                                                            <?php echo $value->pro_name; ?>
                                                        </a>
                                                    </div>
                                                    <div class="related-price">
                                                        <?php echo $settingsvalue->symbol.$value->discount; ?>
                                                    </div>
                                                    <a href="<?php echo base_url(); ?>crud/product_details?P=<?php echo base64_encode($value->pro_id) ?>">
                                                        <div class="product-info-icon">
                                                            <i class="icon-eye"></i>
                                                        </div>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>

                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row  -->
                    <?php } ?>
                </div>
                <!-- /.container-fluid  -->
            </div>
            <!-- /.page-content  -->
        </div>
<?php $this->load->view('admin/footer'); ?>