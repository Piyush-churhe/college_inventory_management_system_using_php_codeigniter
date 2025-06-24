<?php $this->load->view('admin/header'); ?> 
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-handbag"></i> Product</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="content_wrapper">				        						
                                <div class="table_banner clearfix">
                                    <h5 class="table_banner_title">Add product</h5>
                                </div>
                                <div class="table_body p2415">
                                
                                    <form role="form" action="addProductData" id="fileUploadForm" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                        <div class="form-group clearfix">
                                            <label for="product_sku" class="col-md-3">Product SKU</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="" placeholder="Product SKU" required>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="product_name" class="col-md-3">Product name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name" required>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="product_price" class="col-md-3">Purchase price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Purchase price">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="selling_price" class="col-md-3">Selling price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="selling_price" id="selling_price" placeholder="Selling price" required>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount" class="col-md-3">Discounted Price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="discount" id="discount" placeholder="Discounted Price">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount_starts" class="col-md-3">Discount Starts</label>
                                            <div class="col-md-9">
                                                <input class="form-control datetimepicker" type="text" name="discount_starts" value="" id="discount_starts">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount_ends" class="col-md-3">Discount Ends</label>
                                            <div class="col-md-9">
                                                <input class="form-control datetimepicker" type="text" name="discount_ends" value="" id="discount_ends">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="category" class="col-md-3">Category</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="catid" onchange="OnCategory()" name="catid" required>
                                                <option>Select Here..</option>
                                                <?php foreach($category as $value): ?>
                                                <option value="<?php echo $value->cat_id; ?>"><?php echo $value->cat_name;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="sub-category" class="col-md-3">Sub-category</label>
                                            <div class="col-md-9">
                                                <select class=" form-control" id="subcatlist" name="subcatlist"></select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="category" class="col-md-3">Brand</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="brand" name="brand">
                                                    <option>Select Here..</option>
                                                    <?php foreach($brand as $value): ?>
                                                    <option value="<?php echo $value->brand_id; ?>"><?php echo $value->brand_name;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group clearfix">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="image-preview clearfix"></div>
                                                
                                                <label for="product_image" class="custom-file-upload ajaxified">Upload image</label>
                                                
                                                <input type="file" multiple class="" id="product_image" name="product_image[]" aria-describedby="fileHelp" required>
                                                <input type="file" class="" id="user_image" name="user_image" aria-describedby="fileHelp" accept="image/jpg,image/jpeg,image/png">
                                            </div>                                            
                                        </div>                           
                                        <div class="form-group clearfix">
                                            <label for="summary" class="col-md-3">Summary</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="details" class="col-md-3">Details</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="details" name="details" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="" class="col-md-3">Color</label>
                                            <div class="form-check col-md-9">
                                            <?php foreach($color as $value): ?>
                                                <input type="checkbox" class="form-check-input" name="color[]" id="<?php echo $value->color_id; ?>" value="<?php echo $value->color_id; ?>" required>
                                                <label class="form-check-label"  for="<?php echo $value->color_id;?>">
                                                    <?php echo $value->color_name; ?>
                                                </label>
                                            <?php endforeach; ?> 
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="" class="col-md-3">Size</label>
                                            <div class="form-check col-md-9">
                                            <?php foreach($size as $value): ?>
                                                <input type="checkbox" class="form-check-input" name="size[]" id="<?php echo $value->size_name; ?>" value="<?php echo $value->size_id; ?>" required> 
                                                <label class="form-check-label" for="<?php echo $value->size_name;?>"><?php echo $value->size_name; ?></label>
                                            <?php endforeach; ?>
                                            </div>
                                        </div>   
                                        <div class="form-group clearfix">
                                            <label for="quantity" class="col-md-3">Quantity</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" name="submit" id="btnSubmit" class="btn btn-custom">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="flashmessage"></span>
<script type="text/javascript">
	function OnCategory(){
		var x = document.getElementById("catid").value;
		//console.log(x);
    $.ajax({
      type: "GET",
      url: 'getCategoryByID?c=' + x,
      success: function(response) {
        $("#subcatlist").html(response);
        //console.log(response);
      }

    }); 					
	}
</script>        						
<?php $this->load->view('admin/footer'); ?>			