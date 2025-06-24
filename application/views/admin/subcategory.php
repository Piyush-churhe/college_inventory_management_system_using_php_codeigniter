<?php $this->load->view('admin/header'); ?>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-list"></i> View Subcategory</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">                   
                <div class="row">
                    <div class="col-md-12">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Subcategory List</h5>
                                
                        <div class="buy_button">
							<button id="subcategory" class="btn btn-custom pull-right">
                                Add Subcategory
                            </button>
                        </div>
                            </div>         
                            <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($subcategory as $value): ?>
                                        <tr>
                                            <td><?php echo $value->subcat_id ?></td>
                                            <td><?php echo $value->cat_name ?></td>
                                            <td><?php echo $value->subcat_name ?></td>
                                            <td><?php echo $value->subcat_status ?></td>
                                            <td class="action-buttons">
                                                <button type="button" class="subcategory" data-id="<?php echo $value->subcat_id; ?>" name="submit" class="catbutton">
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
        <span class="flashmessage"></span>
        </div>
        	
		<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="subcategoryform" role="dialog" style="display: none;" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-primary">
                        <button aria-label="Close" class="close" data-dismiss="modal" onclick="location.reload()" type="button"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-label">Subcategory</h4>
                    </div>
                    <form enctype="multipart/form-data" action="addSubCategoryData"  method="post" name="addsubcategory" role="form" id="addsubcategory" accept-charset="utf-8">
                        <div class="modal-body">
                            <div class="form-group clearfix">
                                <label class="col-md-3" for="inputMaxLength">Subcategory Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="subname" name="subname" placeholder="Subcategory name" required="" type="text" value=''>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-md-3" for="textareaMaxLength">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="cat" name="cat" required="" style="width: 100%">
                                        <option value="">
                                            Select Here...
                                        </option><?php foreach($category as $value): ?>
                                        <option value="<?php echo $value->cat_id ?>">
                                            <?php echo $value->cat_name ?>
                                        </option><?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <label class="col-md-3" for="textareaMaxLength">Category Status</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="status" name="status" required="" style="width: 100%">
                                        <option value="">
                                            Select Here...
                                        </option>
                                        <option value="ACTIVE">
                                            ACTIVE
                                        </option>
                                        <option value="INACTIVE">
                                            INACTIVE
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input name="subcatid" type="hidden" value="">
                            <button class="btn btn-custom" id="addsubcategory" name="submit" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script type="text/javascript">
        $(document).ready(function () {
            $("#subcategory").click(function (e) {
                e.preventDefault(e);
                $('#subcategoryform').modal('show');
            });
        });
</script>
<script type="text/javascript">
$(document).ready(function () {
    $(".subcategory").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $('#addsubcategory').trigger("reset");
        $('#subcategoryform').modal('show');
        $.ajax({
            url: '<?php echo base_url()?>crud/getSubcategoryByid?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
            
        }).done(function (response) {
            // Populate the form fields with the data returned from server
			$('#addsubcategory').find('[name="subcatid"]').val(response.subcat.subcat_id).end();
            $('#addsubcategory').find('[name="cat"]').val(response.subcat.cat_id).end();
            $('#addsubcategory').find('[name="subname"]').val(response.subcat.subcat_name).end();
            $('#addsubcategory').find('[name="status"]').val(response.subcat.subcat_status).end();
		});
    });
});
</script>
<!--Include footer section-->
<?php $this->load->view('admin/footer'); ?>