<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Librarian extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('librarian_model');
        $this->load->model('login_model');
    }
    
    public function index(){
        if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1 && $this->session->userdata('department') == 'Librarian')
            $data = array();
        redirect('Librarian/dashboard');
    }
    /*Dashboard section*/
    public function dashboard(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $userid           = $this->session->userdata('user_login_id');
            $data['todolist'] = $this->librarian_model->getTodoInfo($userid);
            $this->load->view('Librarian/dashboard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*List all user*/
    public function List_user(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->librarian_model->getAllUsers();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $this->load->view('librarian/userlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/
    public function List_user_updated(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->librarian_model->getAllUsers();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $this->load->view('librarian/userlist-updated', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/
    
    
    /*Add user Form View*/
    public function Add_User(){
        if ($this->session->userdata('user_login_access') != False) {
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $this->load->view('librarian/adduser', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function user_delet(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->librarian_model->userTableDelet($id);
            if ($this->db->affected_rows()) {
                $profile    = $this->librarian_model->getUserValue($id);
                $checkimage = "./assets/img/user/$profile->image";
                if (file_exists($checkimage)) {
                    unlink($checkimage);
                    redirect('crud/List_user');
                }
                /*      $this->librarian_model->User_Notes_Delet($id);
                $this->librarian_model->User_commentid_Delet($id);*/
                
            } else {
                redirect(base_url(), 'refresh');
            }
        }
    }
    /*user profile*/
    public function View_profile(){
        if ($this->session->userdata('user_login_access') != False) {
            $userid                = base64_decode($this->input->get('U'));
            $data                  = array();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $data['profile']       = $this->librarian_model->getProfileValue($userid);
            $data['usernote']      = $this->librarian_model->getUserNotes($userid);
            $this->load->view('librarian/profile', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

   /*Product data validation*/
    public function addProductData(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('pro_id');
            $proid       = 'P' . rand(0, 1000);
            $sku         = $this->input->post('product_sku');
            $name        = $this->input->post('product_name');
            $price       = $this->input->post('product_price');
            $selling     = $this->input->post('selling_price');
            $discount    = $this->input->post('discount');
            $starts      = $this->input->post('discount_starts');
            $ends        = $this->input->post('discount_ends');
            $cat_id      = $this->input->post('catid');
            $subcatid    = $this->input->post('subcatlist');
            $brandid     = $this->input->post('brand');
            $prosummary  = $this->input->post('summary');
            $prodetails  = $this->input->post('details');
            $proquantity = $this->input->post('quantity');
            $color       = $this->input->post('color[]');
            $size        = $this->input->post('size[]');
            $this->load->library('form_validation');
            // Validating SKU Field
            $this->form_validation->set_rules('product_sku', 'SKU', 'trim|min_length[2]|max_length[40]|xss_clean|required');
            // Validating product Field
            $this->form_validation->set_rules('product_name', 'product Name', 'trim|min_length[2]|max_length[250]|xss_clean|required');
            // Validating summary Field
            $this->form_validation->set_rules('summary', 'summary', 'trim|min_length[15]|max_length[100]|xss_clean|required');
            // Validating details Type Field 
            $this->form_validation->set_rules('details', 'details', 'trim|min_length[100]|max_length[1200]|xss_clean|required');
            //Validating Purchase Price Field
            $this->form_validation->set_rules('product_price', 'Purchase Price', 'trim|xss_clean|required');
            //Validating Selling Price Field
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'trim|xss_clean|required');
            //Validating Discount Field
            $this->form_validation->set_rules('discount', 'Discount', 'trim|xss_clean');
            //Validating Discount Starts Field
            $this->form_validation->set_rules('discount_starts', 'Discount Starts', 'trim|xss_clean');
            //Validating Discount Ends Field
            $this->form_validation->set_rules('discount_ends', 'Discount Ends', 'trim|xss_clean');
            //Validating Category Field
            $this->form_validation->set_rules('catid', 'Category', 'trim|xss_clean');
            //Validating SubCategory Field
            $this->form_validation->set_rules('subcatlist', 'SubCategory', 'trim|xss_clean');
            //Validating Brand Field
            $this->form_validation->set_rules('brand', 'Brand Id', 'trim|xss_clean');
            //Validating Quantity Field
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $dataInfo = array();
                $files    = $_FILES;
                $cpt      = count($_FILES['product_image']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['product_image']['name']     = $files['product_image']['name'][$i];
                    $_FILES['product_image']['type']     = $files['product_image']['type'][$i];
                    $_FILES['product_image']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                    $_FILES['product_image']['error']    = $files['product_image']['error'][$i];
                    $_FILES['product_image']['size']     = $files['product_image']['size'][$i];
                    $uploadPath                          = 'assets/img/product';
                    $config['upload_path']               = $uploadPath;
                    $config['allowed_types']             = 'gif|jpg|png';
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('product_image')) {
                        $fileData                    = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $data1                       = array();
                        $data1                       = array(
                            'pro_id' => $proid,
                            'img_url' => $uploadData[$i]['file_name']
                        );
                        $success                     = $this->librarian_model->productImgInsert($data1);
                    }
                }
                if (!empty($uploadData)) {
                    $data                = array();
                    $data                = array(
                        'pro_id' => $proid,
                        'cat_id' => $cat_id,
                        'subcat_id' => $subcatid,
                        'brand_id' => $brandid,
                        'pro_sku' => $sku,
                        'pro_name' => $name,
                        'pro_price' => $price,
                        'selling_price' => $selling,
                        'discount' => $discount,
                        'discount_starts' => $starts,
                        'discount_end' => $ends,
                        'pro_summery' => $prosummary,
                        'pro_details' => $prodetails,
                        'quantity' => $proquantity
                    );
                    $success             = $this->librarian_model->productInsert($data);
                    #$this->session->set_flashdata('feedback','Successfully Updated');
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                    $insertid = $this->db->insert_id();
                    if ($insertid) {
                        $color = $this->input->post('color[]');
                        $size  = $this->input->post('size[]');
                        if(!empty($color)){
                        foreach ($color as $colorvalue) {
                            $data        = array();
                            $data        = array(
                                'pro_id' => $proid,
                                'color_id' => $colorvalue
                            );
                            $success     = $this->librarian_model->productColor($data);
                            $insertidtwo = $this->db->insert_id();
                        }                            
                        }
                        if(!empty($size)){
                        foreach ($size as $sizevalue) {
                            $data          = array();
                            $data          = array(
                                'pro_id' => $proid,
                                'size_id' => $sizevalue
                            );
                            $success       = $this->librarian_model->productSize($data);
                            $insertidthree = $this->db->insert_id();
                        }
                        }
                    }
                    
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Product update*/
    public function updateProduct(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('pro_id');
            $sku         = $this->input->post('product_sku');
            $name        = $this->input->post('product_name');
            $price       = $this->input->post('product_price');
            $selling     = $this->input->post('selling_price');
            $discount    = $this->input->post('discount');
            $starts      = $this->input->post('discount_starts');
            $ends        = $this->input->post('discount_ends');
            $cat_id      = $this->input->post('catid');
            $subcatid    = $this->input->post('subcatlist');
            $brandid     = $this->input->post('brand');
            $prosummary  = $this->input->post('summary');
            $prodetails  = $this->input->post('details');
            $proquantity = $this->input->post('quantity');
            $color       = $this->input->post('color[]');
            $size        = $this->input->post('size[]');
            $this->load->library('form_validation');
            // Validating SKU Field
            $this->form_validation->set_rules('product_sku', 'SKU', 'trim|min_length[2]|max_length[40]|xss_clean|required');
            // Validating product Field
            $this->form_validation->set_rules('product_name', 'product Name', 'trim|min_length[2]|max_length[250]|xss_clean|required');
            // Validating summary Field
            $this->form_validation->set_rules('summary', 'summary', 'trim|min_length[50]|max_length[512]|xss_clean|required');
            // Validating details Type Field 
            $this->form_validation->set_rules('details', 'details', 'trim|min_length[100]|max_length[1200]|xss_clean|required');
            //Validating Purchase Price Field
            $this->form_validation->set_rules('product_price', 'Purchase Price', 'trim|xss_clean|required');
            //Validating Selling Price Field
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'trim|xss_clean|required');
            //Validating Discount Field
            $this->form_validation->set_rules('discount', 'Discount', 'trim|xss_clean');
            //Validating Discount Starts Field
            $this->form_validation->set_rules('discount_starts', 'Discount Starts', 'trim|xss_clean');
            //Validating Discount Ends Field
            $this->form_validation->set_rules('discount_ends', 'Discount Ends', 'trim|xss_clean');
            //Validating Category Field
            $this->form_validation->set_rules('catid', 'Category', 'trim|xss_clean');
            //Validating SubCategory Field
            $this->form_validation->set_rules('subcatlist', 'SubCategory', 'trim|xss_clean');
            //Validating Brand Field
            $this->form_validation->set_rules('brand', 'Brand Id', 'trim|xss_clean');
            //Validating Quantity Field
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $dataInfo = array();
                $files    = $_FILES;
                $cpt      = count($_FILES['product_image']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['product_image']['name']     = $files['product_image']['name'][$i];
                    $_FILES['product_image']['type']     = $files['product_image']['type'][$i];
                    $_FILES['product_image']['tmp_name'] = $files['product_image']['tmp_name'][$i];
                    $_FILES['product_image']['error']    = $files['product_image']['error'][$i];
                    $_FILES['product_image']['size']     = $files['product_image']['size'][$i];
                    $uploadPath                          = 'assets/img/product';
                    $config['upload_path']               = $uploadPath;
                    $config['allowed_types']             = 'gif|jpg|png';
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('product_image')) {
                        $fileData                    = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $data1                       = array();
                        $data1                       = array(
                            'pro_id' => $id,
                            'img_url' => $uploadData[$i]['file_name']
                        );
                        $success                     = $this->librarian_model->ProductImgInsert($data1);
                    }
                }
                if (!empty($id)) {
                    $data       = array();
                    $data       = array(
                        'cat_id' => $cat_id,
                        'subcat_id' => $subcatid,
                        'brand_id' => $brandid,
                        'pro_sku' => $sku,
                        'pro_name' => $name,
                        'pro_price' => $price,
                        'selling_price' => $selling,
                        'discount' => $discount,
                        'discount_starts' => $starts,
                        'discount_end' => $ends,
                        'pro_summery' => $prosummary,
                        'pro_details' => $prodetails,
                        'quantity' => $proquantity
                    );
                    $success    = $this->librarian_model->productUpdateInfo($id, $data);
                    $deletcolor = $this->librarian_model->delet_Color($id);
                    $deletsize  = $this->librarian_model->delet_Size($id);
                    $color      = $this->input->post('color[]');
                    $size       = $this->input->post('size[]');
                    foreach ($color as $colorvalue) {
                        $data        = array();
                        $data        = array(
                            'pro_id' => $id,
                            'color_id' => $colorvalue
                        );
                        $success     = $this->librarian_model->productColor($data);
                        $insertidtwo = $this->db->insert_id();
                    }
                    foreach ($size as $sizevalue) {
                        $data          = array();
                        $data          = array(
                            'pro_id' => $id,
                            'size_id' => $sizevalue
                        );
                        $success       = $this->librarian_model->productSize($data);
                        $insertidthree = $this->db->insert_id();
                    }
                    #$this->session->set_flashdata('feedback','Successfully Updated');
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select user information By user ID*/
    public function viewUserDataBYID(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['uservalue'] = $this->librarian_model->getUserValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*user information validation*/
    public function addUserInfo(){
        if ($this->session->userdata('user_login_access') != False) {
            /*Custom Random password generator*/
            function rand_password($length) {
                $str   = "";
                $chars = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $size  = strlen($chars);
                for ($i = 0; $i < $length; $i++) {
                    $str .= $chars[rand(0, $size - 1)];
                }
                return $str;
            }
            /*Set password length*/
            $pass_hash = sha1(rand_password(7));
            /*password length 7 & convert to Secure Hash Algorithm 1(SHA1)*/
            /*custom user id generator*/
            $userid    = 'U' . rand(500, 1000);
            /*generate random user ID from 500 to 1000*/
            $username  = $this->input->post('name');
            $email     = $this->input->post('email');
            $contact   = $this->input->post('contact');
            $address   = $this->input->post('address');
            $dob       = $this->input->post('dob');
            $country   = $this->input->post('country');
            $role      = 'User';
            $position      = 'Computer_Teacher';

       
            $gender    = $this->input->post('gender');
            $date      = date('Y-m-d');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Name Field
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');
            /*Validating address field*/
            $this->form_validation->set_rules('address', 'address', 'trim|required|min_length[5]|max_length[150]|xss_clean');
            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');
            /*validating Date Of Birth field*/
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|xss_clean');
            /*validating country field*/
            $this->form_validation->set_rules('country', 'Country', 'trim|xss_clean');
            /*validating role field*/
            $this->form_validation->set_rules('role', 'Role', 'trim|xss_clean');
            /*validating gender field*/
            $this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($this->login_model->Does_email_exists($email)) {
                    $response['status']  = 'error';
                    $response['message'] = 'Email already exits';
                    $this->output->set_output(json_encode($response));
                } else {
                    if ($_FILES['user_image']['name']) {
                        $file_name     = $_FILES['user_image']['name'];
                        $fileSize      = $_FILES["user_image"]["size"] / 1024;
                        $fileType      = $_FILES["user_image"]["type"];
                        $new_file_name = '';
                        $new_file_name .= $userid;
                        
                        $config = array(
                            'file_name' => $new_file_name,
                            'upload_path' => "./assets/img/user",
                            'allowed_types' => "gif|jpg|png|jpeg",
                            'overwrite' => False,
                            'max_size' => "20240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                            'max_height' => "600",
                            'max_width' => "600"
                        );
                        
                        $this->load->library('Upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('user_image')) {
                            $response['status']  = 'error';
                            $response['message'] = $this->upload->display_errors();
                            $this->output->set_output(json_encode($response));
                        } else {
                            $path                = $this->upload->data();
                            $img_url             = $path['file_name'];
                            $data                = array();
                            $data                = array(
                                'user_id' => $userid,
                                'full_name' => $username,
                                'email' => $email,
                                'password' => $pass_hash,
                                'address' => $address,
                                'dob' => $dob,
                                'image' => $img_url,
                                'contact' => $contact,
                                'gender' => $gender,
                                'country' => $country,
                                'status' => 'ACTIVE',
                                'user_type' => $role,
                                'position' => $position,
                                'created_on' => $date
                            );
                            $success             = $this->librarian_model->addUserInfo($data);
                            $response['status']  = 'success';
                            $response['message'] = "Successfully Added";
                            $this->output->set_output(json_encode($response));
                            #$this->session->set_flashdata('feedback','Successfully Created');
                        }
                    } else {
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'full_name' => $username,
                            'email' => $email,
                            'password' => $pass_hash,
                            'address' => $address,
                            'dob' => $dob,
                            'contact' => $contact,
                            'gender' => $gender,
                            'country' => $country,
                            'status' => 'ACTIVE',
                            'user_type' => $role,
                            'position' => $position,
                            'created_on' => $date
                        );
                        $success             = $this->librarian_model->addUserInfo($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Created";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Created');    
                    }
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*user information update validation*/
    public function updateValue(){
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('userid');
            $username = $this->input->post('name');
            $email    = $this->input->post('email');
            $contact  = $this->input->post('contact');
            $address  = $this->input->post('address');
            $dob      = $this->input->post('dob');
            $country  = $this->input->post('country');
            $gender   = $this->input->post('gender');
            $position   = 'Computer_Teacher';
            $role     = 'User';
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Name Field
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[60]|xss_clean');
            /*validating email field*/
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[7]|max_length[100]|xss_clean');
            /*Validating address field*/
            $this->form_validation->set_rules('address', 'address', 'trim|required|min_length[5]|max_length[150]|xss_clean');
            /*validating contact field*/
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');
            /*validating Date Of Birth field*/
            $this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|xss_clean');
            /*validating country field*/
            $this->form_validation->set_rules('country', 'Country', 'trim|xss_clean');
            /*validating role field*/
            $this->form_validation->set_rules('role', 'Role', 'trim|xss_clean');
            /*validating gender field*/
            $this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($_FILES['user_image']['name']) {
                    $profile       = $this->librarian_model->getUserValue($id);
                    $file_name     = $_FILES['user_image']['name'];
                    $fileSize      = $_FILES["user_image"]["size"] / 1024;
                    $fileType      = $_FILES["user_image"]["type"];
                    $new_file_name = '';
                    $new_file_name .= $id;
                    $checkimage = "./assets/img/user/$profile->image";
                    
                    $config = array(
                        'file_name' => $new_file_name,
                        'upload_path' => "./assets/img/user",
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => False,
                        'max_size' => "20240000",
                        // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        'max_height' => "600",
                        'max_width' => "600"
                    );
                    
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('user_image')) {
                        
                        $response['status']  = 'error';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        if (file_exists($checkimage)) {
                            unlink($checkimage);
                        }
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'full_name' => $username,
                            'email' => $email,
                            'address' => $address,
                            'dob' => $dob,
                            'image' => $img_url,
                            'contact' => $contact,
                            'gender' => $gender,
                            'position' => $position,
                            'user_type' => $role,
                            'country' => $country
                        );
                        $success             = $this->librarian_model->UserUpdate($id, $data);
                        $response['id']      = $id;
                        $data['image']       = base_url() . 'assets/img/user/' . $data['image'];
                        $response['data']    = $data;
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'full_name' => $username,
                        'email' => $email,
                        'address' => $address,
                        'dob' => $dob,
                        'contact' => $contact,
                        'gender' => $gender,
                        'position' => $position,
                        'user_type' => $role,
                        'country' => $country
                    );
                    $success             = $this->librarian_model->UserUpdate($id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
                
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }



     /*product validation page */
    public function View_Product(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $data['category']      = $this->librarian_model->getCategory();
            $this->load->view('librarian/product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*product update page*/
    public function Getprodatabyid(){
        if ($this->session->userdata('user_login_access') != False) {
            $proid                 = base64_decode($this->input->get('P'));
            $data                  = array();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $data['category']      = $this->librarian_model->getCategory();
            $data['productvalue']  = $this->librarian_model->getproductdetails($proid);
            $this->load->view('librarian/update_product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*All product list*/
    public function product_list(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['settingsvalue'] = $this->librarian_model->getSettingsValue();
            $data['category']      = $this->librarian_model->getCategory();
            $data['productlist']   = $this->librarian_model->getProductData();   
            $this->load->view('librarian/productlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*single product information*/
    public function product_details(){
        if ($this->session->userdata('user_login_access') != False) {
            $proid                  = base64_decode($this->input->get('P'));
            $data                   = array();
            $data['settingsvalue']  = $this->librarian_model->getSettingsValue();
            $data['productdetails'] = $this->librarian_model->getproductdetails($proid);
            $this->load->view('librarian/productdetails', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*product category validation*/
    public function addCategoryData(){
        if ($this->session->userdata('user_login_access') != False) {
            $catid    = $this->input->post('cat_id');
            $category = $this->input->post('catname');
            $status   = $this->input->post('catstatus');
            // Validating category Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cat_id', 'Category Id', 'trim|xss_clean');
            $this->form_validation->set_rules('catname', 'Category Name', 'trim|min_length[2]|max_length[25]|xss_clean|required');
            $this->form_validation->set_rules('catstatus', 'Category Status', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'cat_name' => $category,
                    'cat_status' => $status
                );
                if (!empty($catid)) {
                    $update              = $this->librarian_model->updateCategory($catid, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->librarian_model->insertcategory($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }


     /*subcategory validation*/
    public function addSubCategoryData(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('subcatid');
            $category_id = $this->input->post('cat');
            $subcategory = $this->input->post('subname');
            $status      = $this->input->post('status');
            // Validating details Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('subcatid', 'SubCategory Id', 'trim|xss_clean');
            $this->form_validation->set_rules('cat', 'Category Id', 'trim|xss_clean|required');
            $this->form_validation->set_rules('subname', 'SubCategory Name', 'trim|min_length[3]|max_length[25]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean|required');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'cat_id' => $category_id,
                    'subcat_name' => $subcategory,
                    'subcat_status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->librarian_model->updateSubcategory($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->librarian_model->insertSubcategory($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select sub category */
    public function getCategoryByID(){
        if ($this->session->userdata('user_login_access') != False) {
            $catid      = $this->input->get('c');
            $subcatlist = $this->librarian_model->getsubcategoryByID($catid);
            echo '<option value="">Select a Sub-Category</option>';
            foreach ($subcatlist AS $eachSubcat)
                echo "<option value='$eachSubcat->subcat_id'>$eachSubcat->subcat_name</option>";
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Subcategory data by id*/
    public function getSubcategoryByid(){
        if ($this->session->userdata('user_login_access') != False) {
            $id             = $this->input->get('id');
            $data['subcat'] = $this->librarian_model->getSubCatById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Color data by id*/
    public function getColorById() {
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['colorvalue'] = $this->librarian_model->getColorById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Size data by id*/
    public function getSizeById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['sizevalue'] = $this->librarian_model->getSizeBYId($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Brand data by id*/
    public function getBrandById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['brandvalue'] = $this->librarian_model->getBrandBYID($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Size data validation*/
    public function addSizeData(){
        if ($this->session->userdata('user_login_access') != False) {
            $id        = $this->input->post('size_id');
            $sizevalue = $this->input->post('size');
            $status    = $this->input->post('status');
            // Validating details Type Field
            $this->load->library('form_validation');
            $this->form_validation->set_rules('size_id', 'Size Id', 'trim|xss_clean');
            $this->form_validation->set_rules('size', 'Size Name', 'trim|min_length[1]|max_length[10]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'size_name' => $sizevalue,
                    'size_status' => $status
                );
                if (!empty($id)) {
                    $update              = $this->librarian_model->updateSizeValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->librarian_model->insertSizeValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*color data validation*/
    public function addColorData(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('color_id');
            $colorvalue  = $this->input->post('color');
            $colorstatus = $this->input->post('status');
            // Validating details Type Field 
            $this->load->library('form_validation');
            $this->form_validation->set_rules('color_id', 'Color Id', 'trim|xss_clean');
            $this->form_validation->set_rules('color', 'Color Name', 'trim|min_length[2]|max_length[10]|xss_clean|required');
            $this->form_validation->set_rules('status', 'Color Status', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'color_name' => $colorvalue,
                    'color_status' => $colorstatus
                );
                if (!empty($id)) {
                    $update              = $this->librarian_model->updateColorValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->librarian_model->insertColorValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
                
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*brand data validation*/
    public function addBrandData(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->post('brand_id');
            $brandvalue  = $this->input->post('brand');
            $brandstatus = $this->input->post('brand_status');
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('brand_id', 'Brand Id', 'trim|xss_clean');
            $this->form_validation->set_rules('brand', 'Brand Name', 'trim|min_length[2]|max_length[20]|xss_clean|required');
            $this->form_validation->set_rules('brand_status', 'Brand Status', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'brand_name' => $brandvalue,
                    'brand_status' => $brandstatus
                );
                if (!empty($id)) {
                    $update              = $this->librarian_model->updateBrandValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->librarian_model->insertBrandValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

}