<?php $this->load->view('backend/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Charts</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <select class="js-example-basic-single form-control" name="state">
                                          <option value="AL">Alabama</option>
                                          <option value="WY">Wyoming</option>
                                          <option value="WA">Washington</option>
                                          <option value="OR">Oregon</option>
                                          <option value="CA">California</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <select class="js-example-basic-multiple select2-selection select2-selection-multiple form-control" name="states[]" multiple="multiple">
                                          <option value="AL">Alabama</option>
                                          <option value="WY">Wyoming</option>
                                          <option value="WA">Washington</option>
                                          <option value="OR">Oregon</option>
                                          <option value="CA">California</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-custom form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer'); ?> 