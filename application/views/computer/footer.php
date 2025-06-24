        <!--Reset password validation modal-->
		<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                            <div class="modal-header modal-primary">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modal-label">Reset Password Modal</h4>
							</div>	
                          <div class="message"> </div>  
			            <form role="form" action="Add_Reset_password" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
								<div class="form-group">
                                <label for="oldPassword" class="control-label">Old Password</label>
                                <input type="password" name="oldpass" class="form-control" id="oldPassword" value="" placeholder="" required >
                                </div>
								<div class="form-group">
                                <label for="newPassword" class="control-label">New Password</label>
                                <input type="password" name="newpass" class="form-control" id="newPassword" value="" placeholder="" required >
                                </div>
								<div class="form-group">
                                <label for="confirmNewPass" class="control-label">Confirm Password</label>
                                <input type="password" name="confirmpass" class="form-control" id="confirmNewPass" value="" placeholder="" required >
                                </div>													
                            </div>
                            <div class="modal-footer">
                                <button id="" type="submit" name="submit" class="btn btn-custom">Ok</button>
                                <button type="button" class="btn btn-custom" onclick="location.reload()" data-dismiss="modal">Close</button>
                            </div>
						</form>
                </div>
            </div>
        </div> 
        <script type="text/javascript">
        $(document).ready(function () {
            $("#resetmodal").click(function (e) {
                e.preventDefault(e);
                $('#reset').modal('show');
            });
        });
        </script>          
        <div class="footer">
            <h6>VEEDEV SOFTWARE PVT. LTD.</h6>
        </div>

    </div>
 
    <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-2.0.3.min.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery-jvectormap-world-mill.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/vendor/select2.min.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery.magnific-popup.min.js"></script> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js" ></script>     
    <!--Dashboard chart JS-->   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.1/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script type="text/javascript">
    //initiate the plugin and pass the id of the div containing gallery images
    $("#zoom_03").elevateZoom({
        zoomType: 'lens',
        lensShape: 'square',
        lensSize: '250',
        easing: true,
        cursor: 'pointer',
        galleryActiveClass: 'active',
        zoomWindowPosition: 11,
        gallery: 'gallery_01',
        borderSize: 0,
        containLensZoom: true,
        responsive: true,
        lensShape: 'round'
    });

    //pass the images to Fancybox
    $("#zoom_03").bind("click", function(e) {
        $('#zoom_03').data('elevateZoom');
        return false;
    });

    // updating the view with notifications using ajax
    function load_unseen_notification(id = '') {
        $.ajax({
            url: "<?php echo base_url(); ?>Crud/set_notification",
            method: "POST",
            data: { id: id }
        });
    }

    $(document).on('click', '.notification-count', function() {
        <?php if(!empty($this->session->userdata('user_login_id'))){
            $userid = $this->session->userdata('user_login_id');   
        } ?>
        load_unseen_notification('<?php echo $userid; ?>');
        $(this).addClass('notification-count-changed');
    });
</script>
		
</body>

</html>