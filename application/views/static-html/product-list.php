<?php $this->load->view('backend/header'); ?>

<div class="wrapper-page">
            <div class="page-title">
                <h1>Charts</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="content_wrapper">
                            <div class="table_banner clearfix">
                                <h5 class="table_banner_title">Product List</h5>
                            </div>
                            <div class="table_body text-left">
                                <table id="example2" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Price</th>
                                            <th>Selling price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> 
                                              <img src="http://localhost/crud/assets/img/product/pro3.jpg" alt="">             
                                            </td>             
                                            <td>Rio Zeniro</td>
                                            <td>Women</td>
                                            <td>Dress</td>
                                            <td>$200</td>
                                            <td>$250</td>
                                            <td>25</td>
                                            <td class="action-buttons">
                                                <a href="#">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <a onclick="confirm('Are you sure want to delet this product?')" href="#">
                                                    <i class="icon-close"></i>
                                                </a>                           
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> 
                                              <img src="http://localhost/crud/assets/img/product/pro1.jpg" alt="">             
                                            </td>             
                                            <td>Roy Atkinson</td>
                                            <td>Men</td>
                                            <td>Dress</td>
                                            <td>$2100</td>
                                            <td>$350</td>
                                            <td>80</td>
                                            <td class="action-buttons">
                                                <a href="#">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <a onclick="confirm('Are you sure want to delet this product?')" href="#">
                                                    <i class="icon-close"></i>
                                                </a>                           
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> 
                                              <img src="http://localhost/crud/assets/img/product/pro2.jpg" alt="">             
                                            </td>             
                                            <td>Pete Bellis</td>
                                            <td>Men</td>
                                            <td>Dress</td>
                                            <td>$580</td>
                                            <td>$450</td>
                                            <td>25</td>
                                            <td class="action-buttons">
                                                <a href="#">
                                                    <i class="icon-eye"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                                <a onclick="confirm('Are you sure want to delet this product?')" href="#">
                                                    <i class="icon-close"></i>
                                                </a>                           
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('backend/footer'); ?>