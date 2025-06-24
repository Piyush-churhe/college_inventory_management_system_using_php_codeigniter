<?php $this->load->view('workshop/header'); ?> 
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
                                            <label for="product_sku" class="col-md-3">Product Serial Number</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="product_sku" id="product_sku" aria-describedby="" placeholder="Product Serial Number" required>
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
                                            <label for="category" class="col-md-3">Department</label>
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
<?php $this->load->view('workshop/footer'); ?>			