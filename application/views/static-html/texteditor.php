<?php $this->load->view('backend/header') ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Text editor</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form action="#">
                                        <div class="form-group">
                                            <textarea name="editor1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn btn-custom">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer') ?>
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
