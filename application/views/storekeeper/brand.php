<?php $this->load->view('storekeeper/header'); ?>
<div class="wrapper-page">
    <span class="flashmessage"></span>
    <div class="page-title">
        <h1><i class="icon-list"></i> View Brand</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Brand List</h5>
                            <div class="buy_button">
                                <button id="brand" class="btn btn-custom pull-right">
                                Add Brand
                            </button>
                            </div>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Brand Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($brand as $value): ?>
                                    <tr>
                                        <td>
                                            <?php echo $value->brand_id ?>
                                        </td>
                                        <td>
                                            <?php echo $value->brand_name ?>
                                        </td>
                                        <td>
                                            <?php echo $value->brand_status ?>
                                        </td>
                                        <td class="action-buttons">
                                            <button type="button" data-id="<?php echo $value->brand_id; ?>" name="submit" class="brandbutton">
                                                    <i class="icon-pencil"></i>
                                                </button>
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

<div class="modal fade" id="brandform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" onclick="location.reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Brand</h4>
            </div>
            <form role="form" action="" id="brandmodal" method="" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="modal-body">
                    <div class="form-group clearfix">
                        <label for="inputMaxLength" class="col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <input type="text" id="brandname" name="brandname" class="form-control" value='' placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <label for="textareaMaxLength" class="col-md-3">Brand Status</label>
                        <div class="col-md-9">
                            <select id="status" name="status" class="form-control" style="width: 100%" required>                                    
                                            <option value="">Select Here..</option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="INACTIVE">INACTIVE</option>  
                                        </select>
                        </div>
                    </div>
                </div>
                <div class="setmessage"></div>
                <div class="modal-footer">
                    <input type="hidden" name="brandid" id="brandid" value="">
                    <button id="addBrand" type="submit" name="submit" class="btn btn-custom">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#brand").click(function(e) {
            e.preventDefault(e);
            $('#brandform').modal('show');
        });
    });
</script>
<script>
    $("#addBrand").on("click", function(event) {
        event.preventDefault();
        $.ajax({
            url: "addBrandData",
            type: "POST",
            dataType: 'json',
            data: {
                'brand_id': $('#brandid').val(),
                'brand': $('#brandname').val(),
                'brand_status': $('#status').val(),
            },
            beforeSend: function() {
                $('#addBrand').html('Saving...');
            },
            success: function(response) {
                if (response.status == 'error') {
                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                } else if (response.status == 'success') {
                    $('#addBrand').html('Saved');
                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                    window.setTimeout(function() {
                        location.reload();
                    }, 3000);
                }
            },
            error: function(response) {
                console.error();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".brandbutton").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#brandmodal').trigger("reset");
            $('#brandform').modal('show');
            $.ajax({
                url: '<?php echo base_url();?>storekeeper/getBrandById?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                // Populate the form fields with the data returned from server
                $('#brandmodal').find('[name="brandid"]').val(response.brandvalue.brand_id).end();
                $('#brandmodal').find('[name="brandname"]').val(response.brandvalue.brand_name).end();
                $('#brandmodal').find('[name="status"]').val(response.brandvalue.brand_status).end();
            });
        });
    });
</script>
<?php $this->load->view('storekeeper/footer'); ?>