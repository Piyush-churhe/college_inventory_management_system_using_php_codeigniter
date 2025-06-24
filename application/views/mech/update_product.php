<?php $this->load->view('mech/header'); ?>

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
                                            <label for="product_sku" class="col-md-3">Product Serial Number</label>
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
                url: "<?php echo base_url()?>mech/unlinkImage?UN=" +iid,
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
                     		
			
<?php $this->load->view('mech/footer'); ?>			