<?php $this->load->view('electronics/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1><i class="icon-handbag"></i> View Product</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content_wrapper">
                                <div class="table_banner clearfix">
                                    <h5 class="table_banner_title">Product List</h5>
                                </div>
                                <div class="table_body text-left">
                                    <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Title</th>
                                                <th>Department</th>
                                                <th>Subcategory</th>
                                                <th>price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                        <?php $sr=1; foreach($productlist as $value): ?>
                                            <tr>
                                                <td><?php echo $sr; ?></td>
                                                      
                                                <td><a href="<?php echo base_url();?>electronics/product_details?P=<?php echo base64_encode($value->pro_id) ?>"><?php echo $value->pro_name ?><a/></td>
                                                <td><?php echo $value->cat_name ?></td>
                                                <td><?php echo $value->subcat_name ?></td>
                                                <td><?php echo $value->pro_price ?></td>
                                                <td><?php echo $value->selling_price ?></td>
                                                <td><?php echo $value->quantity ?></td>
                                                <td class="action-buttons">
                                                    <a href="<?php echo base_url();?>electronics/Getprodatabyid?P=<?php echo base64_encode($value->pro_id) ?>">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                    <a onclick="confirm('Are you sure want to delet this product?')" href="<?php echo base_url();?>electronics/Delet_ProductInfo?D=<?php echo base64_encode($value->pro_id) ?>">
                                                        <i class="icon-close"></i>
                                                    </a>                           
                                                </td>
                                            </tr>
                                            <?PHP $sr++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>		
<?php $this->load->view('electronics/footer'); ?>