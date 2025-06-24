<?php $this->load->view('admin/header'); ?>
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
                                    <h5 class="table_banner_title">Product Request</h5>
                                </div>
                                <div class="table_body text-left">
                                    <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Product Name</th>
                                                <th>Department</th>
                                                <th>Subcategory</th>
                                                <th>price</th>
                                                <th>Selling Price</th>
                                                <th>Available Quantity</th>
                                                <th>Request By</th>
                                                <th>Requested Quantity</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                        <?php foreach($productlist as $value): ?>
                                            <tr>
                                            
                                                    
                                                <td><a href="<?php echo base_url();?>admin/product_details?P=<?php echo base64_encode($value->pro_id) ?>"><?php echo $value->pro_name ?><a/></td>
                                                <td><?php echo $value->cat_name ?></td>
                                                <td><?php echo $value->subcat_name ?></td>
                                                <td><?php echo $value->pro_price ?></td>
                                                <td><?php echo $value->selling_price ?></td>
                                                <td><?php echo $value->quantity ?></td>
                                                <td><?php echo $value->requested_by; ?></td>
                                                <td><?php echo $value->req_quantity ?></td>
                                               <!--  <td class="action-buttons">
                                                    <a href="<?php echo base_url();?>admin/product_details?P=<?php echo base64_encode($value->pro_id) ?>">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url();?>admin/Getprodatabyid?P=<?php echo base64_encode($value->pro_id) ?>">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                    <a onclick="confirm('Are you sure want to delet this product?')" href="<?php echo base_url();?>admin/Delet_ProductInfo?D=<?php echo base64_encode($value->pro_id) ?>">
                                                        <i class="icon-close"></i>
                                                    </a>                           
                                                </td> -->
<td>
    <?php echo $value->principal_approval ?>
</td>
                                            <td>  

<button type="button" name="submit" class="userbutton btn btn-default btn-custom" data-id="<?php echo $value->pro_id; ?>">Request</button>


</td>
                                            </tr>
                                            <?PHP endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </div>		

<span class="flashmessage"></span>
    <div class="modal fade" id="usermodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Request</h4>
            </div>
            <form role="form" action="updateProValue" id="UserValueUpdate" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                     <div class="form-group clearfix">
                        <label for="textareaMaxLength" class="col-md-3">Status</label>
                        <div class="col-md-9">
                            <select name="principal_approval" id="principal_approval" class="form-control" style="width: 100%" required>                                       
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>  
                                <option value="Cencel">Cencel</option>  
                            </select>                        
                        </div>
                    </div>
                
                  
                   
                </div>

                <div class="modal-footer">
                    <div class="col-md-6">
                      
                        <input type="hidden" name="pro_id" id="pro_id" value=''>
                        <span class="pull-left"></span>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" id="btnSubmit" name="submit" class="btn btn-default btn-custom">Submit</button>
                        <button type="button" class="btn btn-success btn-custom" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $(".userbutton").click(function(e) {
            e.preventDefault(e);

            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');

            $('#UserValueUpdate').trigger("reset");
            $('#usermodel').modal('show');

            $.ajax({
                url: '<?php echo base_url(); ?>admin/viewProDataBYID?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {

                // Populate the form fields with the data returned from server
                var theForm = $('#UserValueUpdate');

                theForm.find('[name="userid"]').val(response.uservalue.user_id).end()
                        .find('[name="pro_id"]').val(response.uservalue.pro_id).end()
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#btnSubmit").click(function(event) {

            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var formval = $('#UserValueUpdate')[0];

            // Create an FormData object
            var data = new FormData(formval);
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "<?php echo base_url(); ?>admin/updateProValue",
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(response) {
                    if (response.status == 'error') {
                        $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                    } else if (response.status == 'success') {
                        $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                        var table = $('#example').DataTable();
                        var editedTrIndex = $('[data-id=' + response.id + ']').closest('tr').index();
                        var tr = $('#example tbody tr:eq(' + editedTrIndex + ')');
                        tr.find('td:eq(3)').text(response.data['pro_id']);
                        table.rows(tr).invalidate().draw(); 
                    }
                },
                error: function(response) {
                    
                }
            });

        });

    });
</script>

<?php $this->load->view('admin/footer'); ?>