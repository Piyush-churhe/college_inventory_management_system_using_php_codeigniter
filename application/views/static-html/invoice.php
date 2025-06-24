<?php $this->load->view('backend/header') ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Invoice</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="invoice-wrapper table-responsive">
                                        <table class="table table-no-border">
                                            <tr>
                                                <td><img src="<?php echo base_url(); ?>assets/img/ci-logo.png"></td>
                                                <td></td>
                                                <td class="text-right">
                                                    <span class="badge badge-danger">Invoice #469</span>
                                                    <br />
                                                    <span>Bill date: 2018-01-03</span>
                                                    <br />
                                                    <span>Due date: 2018-01-07</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>The MadCoderz Team</b>
                                                    <br />
                                                    Los Angeles,
                                                    <br />
                                                    6651, Franklin Avenue
                                                    <br /><br />
                                                    +01 123456789
                                                    <br />
                                                    https://madcoderz.com
                                                </td>
                                                <td></td>
                                                <td>
                                                    Bill for <b>Mr. Lincoln &amp; Sons</b>
                                                    <br />
                                                    386, Hathaway Avenue,
                                                    <br />
                                                    LA, California
                                                    <br /><br />
                                                    +01 888 345 746
                                                    <br />
                                                    https://lincoln&amp;sons.com
                                                </td>
                                            </tr>
                                        </table>

                                        

                                        <div class="invoice-table" style="margin-top: 150px;">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th class="text-right">Qty</th>
                                                        <th class="text-right">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Iphone 6</td>
                                                        <td class="text-left">11</td>
                                                        <td class="text-right">$15,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asus</td>
                                                        <td class="text-left">04</td>
                                                        <td class="text-right">$7,250</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ROG</td>
                                                        <td class="text-left">01</td>
                                                        <td class="text-right">$2,400</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="text-right" colspan="2">$18,130</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <hr>
                                            johndoe@madcoderz.com
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer') ?>