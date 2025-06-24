<?php $this->load->view('backend/header'); ?>
<div class="wrapper-page">
    <div class="page-title">
        <h1>DropZone</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/" class="dropzone dz-clickable" id="my-awesome-dropzone">
                        <div class="panel dropzone-panel">
                            <div class="panel-body">
                                
                                <div class="dz-message">
                                    <div>
                                        <h4>Drop files here or click to upload.</h4>
                                        <div class="text-muted">(This is just a demo dropzone. Selected files are not actually uploaded)</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-custom form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/footer'); ?>