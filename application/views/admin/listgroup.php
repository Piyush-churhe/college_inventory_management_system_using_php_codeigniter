<?php $this->load->view('admin/header'); ?>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-user"></i> User Role</h1>
            </div>
                <div class="page-content">
                <div class="container-fluid">           
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel no-border">
                                <div class="content_wrapper">
                                  <div class="table_banner clearfix">
                                    <h5 class="table_banner_title">
                                      Admin list
                                    </h5>
                                  </div>
                                  <div class="table_body">
                                    <ul class="product-list">
                                       <?php foreach($adminrole as $value): ?>
                                            <li>
                                                <div class="inb">
                                                    <a href="View_profile?U=<?php echo base64_encode($value->user_id) ?>">
                                                   <?php if($value->image){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $value->image; ?>" alt="Starter Kit" class="rank-img">
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/user/user.jpg" alt="Starter Kit" class="rank-img">                                                    
                                                    <?php } ?>
                                                    </a>
                                                </div>
                                                <span class="product-name"><?php echo $value->full_name; ?></span>
                                                <button class="pull-right btn btn-custom p26 mt-11 roleupdate" data-id="<?php echo $value->user_id; ?>" data-toggle="modal" data-target="#myModal"><i class="icon-pencil"></i></button>                                           
                                                <span class="pull-right stock-badge rank-badge out mt-15"><?php echo $value->user_type; ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel no-border">
                                <div class="content_wrapper">
                                  <div class="table_banner clearfix">
                                    <h5 class="table_banner_title">
                                      User list
                                    </h5>
                                  </div>
                                  <div class="table_body">
                                    <ul class="product-list">
                                       <?php foreach($userrole as $value): ?>
                                        
                                            <li>
                                                <div class="inb">
                                                   <a href="View_profile?U=<?php echo base64_encode($value->user_id) ?>">
                                                   <?php if($value->image){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $value->image; ?>" alt="Starter Kit" class="rank-img">
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/user/user.jpg" alt="Starter Kit" class="rank-img">                                            
                                                    <?php } ?>
                                                    </a>
                                                </div>
                                                <span class="product-name"><?php echo $value->full_name; ?></span>
                                                <button class="pull-right btn btn-custom p26 mt-11 roleupdate" data-id="<?php echo $value->user_id; ?>" data-toggle="modal" data-target="#myModal"><i class="icon-pencil"></i></button>
                                                <span class="pull-right stock-badge rank-badge out mt-15"><?php echo $value->user_type; ?></span>
                                            </li>
                                        
                                        <?php endforeach; ?>
                                    </ul>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>            
        </div>
        </div>
<!-- Modal -->
    <div aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" class="close" onclick="location.reload()" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Group</h4>
        </div>
        <form enctype="multipart/form-data" id="groupbutton" method="post" name="groupbutton" role="form" accept-charset="utf-8">
          <div class="modal-body">
            <div class="form-group clearfix">
              <label for="username" class="col-md-3">User Name</label>
              <div class="col-md-9">
                <input id="username" class="form-control" name="username" type="text" value="" disabled>
                <input name="groupid" type="hidden" value="">
              </div>
            </div>
            <div class="form-group clearfix">
              <label class="col-md-3" for="role">Set Roles</label>
              <div class="col-md-9">
                <select class="form-control" name="role" required="" style="width: 100%">
                  <option selected>
                    Select here
                  </option>
                  <option value="Admin">
                    Admin
                  </option>
                  <option value="User">
                    User
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-custom" name="submit" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>


<script type="text/javascript">
       $(document).ready(function () {
           $(".roleupdate").click(function (e) {
               e.preventDefault(e);
               // Get the record's ID via attribute  
               var iid = $(this).attr('data-id');
               console.log(iid);
               $('#myModal').trigger("reset");
               $.ajax({
                   url: '<?php echo base_url();?>crud/groupDataByID?id=' + iid,
                   method: 'GET',
                   data: '',
                   dataType: 'json',
               }).done(function (response) {
                   // Populate the form fields with the data returned from server
                $('#myModal').find('[name="groupid"]').val(response.value.user_id).end();
                   $('#myModal').find('[name="username"]').val(response.value.full_name).end();
                   $('#myModal').find('[name="role"]').val(response.value.user_type).end();
            });
           });
       });
</script>
<script>
  $("#groupbutton").on("submit", function(event){
      event.preventDefault();
	  //console.log( $( this ).serialize() );
      $.ajax({
          url: "Update_Group",
          type:"POST",
          data:$( this ).serialize(),
          success: function(response) {
			      location.reload();
          },
          error: function(response) {
            console.error();
          }
      });
  });			
</script>			
<?php $this->load->view('admin/footer'); ?>