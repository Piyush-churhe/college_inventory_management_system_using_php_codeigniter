<?php $this->load->view('backend/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Datepicker</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="text" value="" class="form-control datetimepicker">
                                    </div>
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control datetimepicker" value="2012-04-05">
                                        <div class="input-group-addon border-0">to</div>
                                        <input type="text" class="form-control datetimepicker" value="2012-04-19">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer'); ?>
    <script type="text/javascript">
        $('.datetimepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>  
