<?php $this->load->view('admin/header'); ?>

        <div class="wrapper-page">
            <div class="page-title">
                <h1>Product details</h1>
            </div>
            <span class="flashmessage"></span>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="content_wrapper">
                                <div class="table_banner clearfix">
                                   <div class="table_banner_title">
                                       <h5>Edit product</h5>
                                   </div> 
                                </div>
                                <div class="table_body">
                                    <form action="updateProduct" id="fileUploadForm" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                        <div class="form-group clearfix">
                                            <label for="product_sku" class="col-md-3">Product SKU</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="" value="<?php echo $productvalue->pro_sku; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="product_name" class="col-md-3">Product name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $productvalue->pro_name; ?>" placeholder="Product name">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="purchase_price" class="col-md-3">Purchase price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="product_price" id="product_price" value="<?php echo $productvalue->pro_price; ?>" placeholder="Purchase price">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="selling_price" class="col-md-3">Selling price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="selling_price" id="selling_price" value="<?php echo $productvalue->selling_price; ?>" placeholder="Selling price">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount" class="col-md-3">Discounted Price</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="discount" value="<?php echo $productvalue->discount; ?>" id="discount" placeholder="Discount percentage">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount_starts" class="col-md-3">Discount Starts</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="date" name="discount_starts" value="<?php echo $productvalue->discount_starts; ?>" id="discount_starts">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="discount_ends" class="col-md-3">Discount Ends</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="date" name="discount_ends" value="<?php echo $productvalue->discount_end; ?>" id="discount_ends">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="category" class="col-md-3">Category</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="catid" onchange="OnCategory()" name="catid">
                                                    <option value="<?php echo $productvalue->cat_id; ?>"><?php echo $productvalue->cat_name; ?></option>
                                                    <?php foreach($category as $value): ?>
                                                    <option value="<?php echo $value->cat_id; ?>"><?php echo $value->cat_name;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="sub-category" class="col-md-3">Sub-category</label>
                                            <div class="col-md-9">
                                                <select class=" form-control" id="subcatlist" name="subcatlist">
                                                    <option value="<?php echo $productvalue->subcat_id; ?>"><?php echo $productvalue->subcat_name; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="category" class="col-md-3">Brand</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="brand" name="brand">
                                                    <option value="<?php echo $productvalue->brand_id; ?>"><?php echo $productvalue->brand_name; ?></option>
                                                    <?php foreach($brand as $value): ?>
                                                    <option value="<?php echo $value->brand_id; ?>"><?php echo $value->brand_name;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label class="col-md-3">Upload images</label>
                                            <div class="col-md-9">
                                                <div class='image-preview clearfix'>
                                                   <?php foreach($productimage as $value): ?>
                                                    <div class="image-delete Deletimg" data-id="<?php echo $value->id ?>" id="" onclick="confirm('Are you sure want to delet this image?')">
                                                        <img src="<?Php echo base_url() ?>assets/img/product/<?php echo $value->img_url ?>" height="110px" width="110px" alt="mamacita">
                                                        <div class="img-id"><i class="fa fa-trash middle"></i></div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <label for="product_image" class="custom-file-upload ajaxified">Upload image</label>
                                                <input type="file" multiple class="" id="product_image" name="product_image[]" aria-describedby="fileHelp">
                                            </div>                                            
                                        </div>                                    
                                        <div class="form-group clearfix">
                                            <label for="summary" class="col-md-3">Summary</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="summary" name="summary" rows="3"><?php echo $productvalue->pro_summery;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="details" class="col-md-3">Details</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="details" name="details" rows="6"><?php echo $productvalue->pro_details;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="" class="col-md-3">Color</label>
                                            <div class="form-check col-md-9">
                                            <?php foreach($productcolor as $value): ?>
                                                <input type="checkbox" class="form-check-input" name="color[]" id="<?php echo $value->color_id; ?>" value="<?php echo $value->color_id; ?>" checked>
                                                <label class="form-check-label"  for="<?php echo $value->color_id;?>">
                                                    <?php echo $value->color_name; ?>
                                                </label>
                                            <?php endforeach; ?> 
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="" class="col-md-3">Size</label>

                                            <div class="form-group col-md-9">
                                            <?php foreach($productsize as $value): ?>
                                                    <input type="checkbox" class="form-check-input" name="size[]" id="<?php echo $value->size_name; ?>" value="<?php echo $value->size_id; ?>" checked> 
                                                    <label class="form-check-label" for="<?php echo $value->size_name;?>"><?php echo $value->size_name; ?></label>
                                                    <?php endforeach; ?>
                                            </div>
                                        </div>
                                                                             
                                        <div class="form-group clearfix">
                                            <label for="discount" class="col-md-3">Quantity</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $productvalue->quantity; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="col-md-9 col-md-offset-3">
                                                <input type="hidden" name="pro_id" value="<?php echo $productvalue->pro_id; ?>">
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
       
<script type="text/javascript">
	function OnCategory(){
		var x = document.getElementById("catid").value;
		console.log(x);
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
    <script type="text/javascript">
        $(document).ready(function () {
        $("#btnSubmit").click(function (event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var formval = $('#fileUploadForm')[0];

            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "updateProduct",
                dataType:'json',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
          success: function(response) {
              if(response.status == 'error') { 
              $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
              } else if(response.status == 'success'){
                  $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                window.setTimeout(function() {location.reload();}, 3000);
              }              
          },
          error: function(response) {
            console.error();
          }
            });

        });

    });
    </script>	            
        <script type="text/javascript">
        $(document).ready(function () {
        $(".Deletimg").click(function (event) {
        event.preventDefault();
        var iid = $(this).attr('data-id');
            //console.log(iid);
            $.ajax({
                url: "<?php echo base_url()?>crud/unlinkImage?UN=" +iid,
                method: 'GET',
                data:'',
                dataType:'json',
          success: function(response) {
            $(".flashmessage").fadeIn('fast').delay(30000).fadeOut('fast').html(response.message);
			window.setTimeout(function(){location.reload()},2000)
          },
          error: function(response) {
            console.log(response)
          }
            });

        });

    });
    </script> 
                     		
			
<?php $this->load->view('admin/footer'); ?>			