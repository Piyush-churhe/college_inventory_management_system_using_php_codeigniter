<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_model');
        $this->load->model('login_model');
    }
    
    public function index(){
        if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1 && $this->session->userdata('user_type') == 'Admin')
            $data = array();
        redirect('admin/dashboard');
    }
    /*Dashboard section*/
    public function dashboard(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $userid           = $this->session->userdata('user_login_id');
            $data['todolist'] = $this->admin_model->getTodoInfo($userid);
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*List all user*/
    public function List_user(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->admin_model->getAllUsers();
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $this->load->view('admin/userlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/
    public function List_user_updated(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['userlist']      = $this->admin_model->getAllUsers();
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $this->load->view('admin/userlist-updated', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*|||||||||||||| UPDATED |||||||||||||||*/
    
    
    /*Add user Form View*/
    public function Add_User(){
        if ($this->session->userdata('user_login_access') != False) {
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $this->load->view('admin/adduser', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    # user delect
    public function user_delet(){
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('id');
            $this->admin_model->userTableDelet($id);
            if ($this->db->affected_rows()) {
                $profile    = $this->admin_model->getUserValue($id);
                $checkimage = "./assets/img/user/$profile->image";
                if (file_exists($checkimage)) {
                    unlink($checkimage);
                    redirect('admin/List_user');
                }
                /*      $this->admin_model->User_Notes_Delet($id);
                $this->admin_model->User_commentid_Delet($id);*/
                
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
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $data['profile']       = $this->admin_model->getProfileValue($userid);
            $data['usernote']      = $this->admin_model->getUserNotes($userid);
            $this->load->view('admin/profile', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Note validation*/
    public function noteValidation(){
        if ($this->session->userdata('user_login_access') != False) {
            $userid      = $this->input->post('userid');
            $commentid   = $this->input->post('commentid');
            $description = $this->input->post('description');
            $date        = date("Y-m-d h:i:sa");
            $this->load->library('form_validation');
            // Validating group name Field
            $this->form_validation->set_rules('userid', 'User Id', 'required|xss_clean');
            $this->form_validation->set_rules('commentid', 'Comment ID', 'required|trim|xss_clean');
            $this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[1024]|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                if ($_FILES['note_file']['name']) {
                    $file_name = $_FILES['note_file']['name'];
                    $fileSize  = $_FILES["note_file"]["size"] / 1024;
                    $fileType  = $_FILES["note_file"]["type"];
                    
                    $config = array(
                        'upload_path' => "./assets/img/note",
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => False,
                        'max_size' => "40480000", // Can be set to particular file size , here it is 4 MB(2048 Kb)
                        'max_height' => "2100",
                        'max_width' => "2100"
                    );
                    
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('note_file')) {
                        $response['status']  = 'success';
                        $response['message'] = $this->upload->display_errors();
                        $this->output->set_output(json_encode($response));
                    } else {
                        $path                = $this->upload->data();
                        $img_url             = $path['file_name'];
                        $data                = array();
                        $data                = array(
                            'user_id' => $userid,
                            'comment_id' => $commentid,
                            'description' => $description,
                            'note_image' => $img_url,
                            'datetime' => $date
                        );
                        $success             = $this->admin_model->addUserNote($data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Added";

                        $this->output->set_output(json_encode($response));
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'user_id' => $userid,
                        'comment_id' => $commentid,
                        'description' => $description,
                        'datetime' => $date
                    );
                    $success             = $this->admin_model->addUserNote($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Group list for admin*/
    public function ListGroup(){
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $data                  = array();
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $data['userrole']      = $this->admin_model->getAllGroupsUser();
            $data['adminrole']     = $this->admin_model->getAllGroupsAdmin();
            $this->load->view('admin/listgroup', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Select Group data by id */
    public function groupDataByID(){
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $id            = $this->input->get('id');
            $data['value'] = $this->admin_model->selectgroupdatabyId($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*group information update*/
    public function Update_Group(){
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            
            $id   = $this->input->post('groupid');
            $name = $this->input->post('role');
            
            $this->load->library('form_validation');
            
            // Validating group name Field
            $this->form_validation->set_rules('groupname', 'Group name', 'trim|min_length[2]|max_length[25]|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
                
            } else {
                
                $data = array();
                $data = array(
                    'user_type' => $name
                );
                
                $success = $this->admin_model->updateGroupInfo($id, $data);
                
                if ($this->db->affected_rows()) {
                    
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
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $data['category']      = $this->admin_model->getCategory();
            $data['color']         = $this->admin_model->getColor();
            $data['size']          = $this->admin_model->getSize();
            $data['brand']         = $this->admin_model->getBrand();
            $this->load->view('admin/product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*product update page*/
    public function Getprodatabyid(){
        if ($this->session->userdata('user_login_access') != False) {
            $proid                 = base64_decode($this->input->get('P'));
            $data                  = array();
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $data['category']      = $this->admin_model->getCategory();
            $data['color']         = $this->admin_model->getColor();
            $data['size']          = $this->admin_model->getSize();
            $data['brand']         = $this->admin_model->getBrand();
            $data['productvalue']  = $this->admin_model->getproductdetails($proid);
            $data['productimage']  = $this->admin_model->getproductImages($proid);
            $data['productcolor']  = $this->admin_model->getProductColors($proid);
            $data['productsize']   = $this->admin_model->getProductSizes($proid);
            $this->load->view('admin/update_product', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*All product list*/
    public function product_list(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                  = array();
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $data['category']      = $this->admin_model->getCategory();
            $data['productlist']   = $this->admin_model->getProductData();   
            $this->load->view('admin/productlist', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*single product information*/
    public function product_details(){
        if ($this->session->userdata('user_login_access') != False) {
            $proid                  = base64_decode($this->input->get('P'));
            $data                   = array();
            $data['settingsvalue']  = $this->admin_model->getSettingsValue();
            $data['productdetails'] = $this->admin_model->getproductdetails($proid);
            $this->load->view('admin/productdetails', $data);
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
                    $update              = $this->admin_model->updateCategory($catid, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->admin_model->insertcategory($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Reset password validation*/
    public function Add_Reset_password(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->session->userdata('user_login_id');
            $oldpass     = sha1($this->input->post('oldpass'));
            $newpass     = $this->input->post('newpass');
            $confirmpass = $this->input->post('confirmpass');
            $userdata    = $this->admin_model->getUserValue($id);
            if ($userdata->password == $oldpass && $newpass == $confirmpass) {
                $data = array();
                $data = array(
                    'password' => sha1($newpass)
                );
                if (!empty($id)) {
                    $update              = $this->admin_model->updatePassword($id, $data);
                    $inserted            = $this->db->affected_rows();
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated Your  password";
                    $this->output->set_output(json_encode($response));
                }
            } else {
                $response['status']  = 'error';
                $response['message'] = "Please enter Valid password";
                $this->output->set_output(json_encode($response));
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*to-do note validation*/
    public function addTodoData(){
        if ($this->session->userdata('user_login_access') != False) {
            
            $userid   = $this->input->post('userid');
            $tododata = $this->input->post('todo_data');
            $date     = date("Y-m-d h:i:sa");
            
            $this->load->library('form_validation');
            
            //validating to do list data
            $this->form_validation->set_rules('userid', 'user Id', 'trim|xss_clean');
            $this->form_validation->set_rules('todo_data', 'To-do Data', 'trim|required|min_length[3]|max_length[150]|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                $data = array();
                $data = array(
                    'user_id' => $userid,
                    'to_dodata' => $tododata,
                    'value' => '1',
                    'date' => $date
                );
                
                $success    = $this->admin_model->insert_tododata($data);
                $todoLastId = $this->db->insert_id();
                
                if ($success) {
                    
                    $todoHtml = "<li class='todo-item'>";
                    $todoHtml .= "<div class='checkbox checkbox-default'>";
                    $todoHtml .= "<input class='to-do' data-id='" . $todoLastId . "' data-value='0' type='checkbox' id='" . $todoLastId . "'>";
                    $todoHtml .= "<label for='" . $todoLastId . "'>" . $tododata . "</label>";
                    $todoHtml .= "</div>";
                    $todoHtml .= "</li>";
                    $todoHtml .= "<li><hr class='light-grey-hr'></li>";
                    
                    $response['status']   = 'success';
                    $response['todoHtml'] = $todoHtml;
                    $response['message']  = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Todo Data Update*/
    public function updateTododata(){
        
        if ($this->session->userdata('user_login_access') != False) {
            $id    = $this->input->post('toid');
            $value = $this->input->post('tovalue'); // initially 0 when not completed
            
            $data   = array();
            $data   = array(
                'value' => $value
            );
            $update = $this->admin_model->UpdateTododata($id, $data);
            
            $response['status']  = 'success';
            $response['value']   = $value;
            $response['message'] = "Successfully updated";
            $this->output->set_output(json_encode($response));
        }
        
        else {
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
                    $update              = $this->admin_model->updateSubcategory($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->admin_model->insertSubcategory($data);
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
            $subcatlist = $this->admin_model->getsubcategoryByID($catid);
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
            $data['subcat'] = $this->admin_model->getSubCatById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Color data by id*/
    public function getColorById() {
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['colorvalue'] = $this->admin_model->getColorById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Size data by id*/
    public function getSizeById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['sizevalue'] = $this->admin_model->getSizeBYId($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Brand data by id*/
    public function getBrandById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                 = $this->input->get('id');
            $data['brandvalue'] = $this->admin_model->getBrandBYID($id);
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
                    $update              = $this->admin_model->updateSizeValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->admin_model->insertSizeValue($data);
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
                    $update              = $this->admin_model->updateColorValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->admin_model->insertColorValue($data);
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
                    $update              = $this->admin_model->updateBrandValue($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                } else {
                    $insert              = $this->admin_model->insertBrandValue($data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Added";
                    $this->output->set_output(json_encode($response));
                }
            }
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
                        $success                     = $this->admin_model->productImgInsert($data1);
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
                    $success             = $this->admin_model->productInsert($data);
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
                            $success     = $this->admin_model->productColor($data);
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
                            $success       = $this->admin_model->productSize($data);
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
                        $success                     = $this->admin_model->ProductImgInsert($data1);
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
                    $success    = $this->admin_model->productUpdateInfo($id, $data);
                    $deletcolor = $this->admin_model->delet_Color($id);
                    $deletsize  = $this->admin_model->delet_Size($id);
                    $color      = $this->input->post('color[]');
                    $size       = $this->input->post('size[]');
                    foreach ($color as $colorvalue) {
                        $data        = array();
                        $data        = array(
                            'pro_id' => $id,
                            'color_id' => $colorvalue
                        );
                        $success     = $this->admin_model->productColor($data);
                        $insertidtwo = $this->db->insert_id();
                    }
                    foreach ($size as $sizevalue) {
                        $data          = array();
                        $data          = array(
                            'pro_id' => $id,
                            'size_id' => $sizevalue
                        );
                        $success       = $this->admin_model->productSize($data);
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
            $data['uservalue'] = $this->admin_model->getUserValue($id);
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
            $position      = $this->input->post('position');
            $department      = $this->input->post('department');
            $password     = sha1($this->input->post('password'));
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
                                'department' => $department,
                                'position' => $position,
                                'password' => $password,
                                'created_on' => $date
                            );
                            $success             = $this->admin_model->addUserInfo($data);
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
                            'created_on' => $date
                        );
                        $success             = $this->admin_model->addUserInfo($data);
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
            $position   = $this->input->post('position');
            $department   = $this->input->post('department');
           $password     = sha1($this->input->post('password'));
            $role     = $this->input->post('role');
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
                    $profile       = $this->admin_model->getUserValue($id);
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
                            'department'=> $department,
                            'password' => $password,
                            'user_type' => $role,
                            'country' => $country
                        );
                        $success             = $this->admin_model->UserUpdate($id, $data);
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
                        'department'=> $department,
                        'password' => $password,
                        'user_type' => $role,
                        'country' => $country
                    );
                    $success             = $this->admin_model->UserUpdate($id, $data);
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


       public function viewProDataBYID(){
        if ($this->session->userdata('user_login_access') != False) {
            $id                = $this->input->get('id');
            $data['uservalue'] = $this->admin_model->getProValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


     /*user information update validation*/
    public function updateProValue(){
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->post('userid');
            $pro_id = $this->input->post('pro_id');
            $principal_approval    = $this->input->post('principal_approval');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            /*validating gender field*/
            $this->form_validation->set_rules('principal_approval', 'Principal Approval', 'trim|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                    $data                = array();
                    $data                = array(
                        'principal_approval' => $principal_approval
                       
                    );
                    $success             = $this->admin_model->ProductUpdate($pro_id, $data);
                    $response['id']      = $id;
                    $response['data']    = $data;
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
                
            }
         else {
            redirect(base_url(), 'refresh');
        }
    }


    public function Site_Settings(){
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $data['settingsvalue'] = $this->admin_model->getSettingsValue();
            $this->load->view('admin/settings', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_category(){
        if ($this->session->userdata('user_login_access') != False) {
            $data             = array();
            $data['category'] = $this->admin_model->getCategory();
            $this->load->view('admin/category', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function categoryById(){
        if ($this->session->userdata('user_login_access') != False) {
            $id               = $this->input->get('id');
            $data['catvalue'] = $this->admin_model->getCategoryValueById($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    /*Product image delete controller*/
    public function unlinkImage(){
        if ($this->session->userdata('user_login_access') != False) {
            $id       = $this->input->get('UN');
            $imgvalue = $this->admin_model->getSingleProImageById($id);
            if (!empty($imgvalue->id)) {
                unlink("./assets/img/product/$imgvalue->img_url");
                $delet               = $this->admin_model->deelet_Img($id);
                $response['status']  = 'success';
                $response['message'] = "Successfully Deleted";
                $this->output->set_output(json_encode($response));
            }
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    /*Product image delet controller*/
    public function Delet_ProductInfo(){
        if ($this->session->userdata('user_login_access') != False) {
            $id    = base64_decode($this->input->get('D'));
            $value = $this->admin_model->getProductById($id);
            if (!empty($value)) {
                $deletproduct = $this->admin_model->delet_Product($id);
                $deletcolor   = $this->admin_model->delet_Color($id);
                $deletsize    = $this->admin_model->delet_Size($id);
                $imgvalue     = $this->admin_model->getProImageById($id);
                if (!empty($imgvalue)) {
                    foreach ($imgvalue as $value) {
                        while (file_exists("./assets/img/product/$value->img_url")) {
                            unlink("./assets/img/product/$value->img_url");
                        }
                    }
                    $delet = $this->admin_model->deelet_Pro_Imgage($id);
                }
                redirect('admin/product_list');
            } else {
                $this->session->set_flashdata('feedback', 'Your request do not valid');
                redirect('admin/product_list');
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_subcategory(){
        if ($this->session->userdata('user_login_access') != False) {
            $data                = array();
            $data['category']    = $this->admin_model->getCategory();
            $data['subcategory'] = $this->admin_model->getSubCategory();
            $this->load->view('admin/subcategory', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_brand(){
        if ($this->session->userdata('user_login_access') != False) {
            $data          = array();
            $data['brand'] = $this->admin_model->getBrand();
            $this->load->view('admin/brand', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_color(){
        if ($this->session->userdata('user_login_access') != False) {
            $data          = array();
            $data['color'] = $this->admin_model->getColor();
            $this->load->view('admin/color', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function view_size(){
        if ($this->session->userdata('user_login_access') != False) {
            $data         = array();
            $data['size'] = $this->admin_model->getSize();
            $this->load->view('admin/size', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function addSettings(){
        if ($this->session->userdata('user_login_access') != False && $this->session->userdata('user_type') == 'Admin') {
            $id          = $this->input->post('id');
            $title       = $this->input->post('title');
            $description = $this->input->post('description');
            $copyright   = $this->input->post('copyright');
            $contact     = $this->input->post('contact');
            $currency    = $this->input->post('currency');
            $symbol      = $this->input->post('symbol');
            $email       = $this->input->post('email');
            $address     = $this->input->post('address');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            // Validating Title Field
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[60]|xss_clean');
            // Validating description Field
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[20]|max_length[180]|xss_clean');
            // Validating copyright Field
            $this->form_validation->set_rules('copyright', 'Copyright', 'trim|xss_clean');
            // Validating contact Field
            $this->form_validation->set_rules('contact', 'Contact', 'trim|xss_clean');
            // Validating currency Field
            $this->form_validation->set_rules('currency', 'Currency', 'trim|xss_clean');
            // Validating symbol Field
            $this->form_validation->set_rules('symbol', 'Symbol', 'trim|xss_clean');
            // Validating email Field
            $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
            // Validating address Field
            $this->form_validation->set_rules('address', 'Address', 'trim|min_length[5]|max_length[60]|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                $response['status']  = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response));
            } else {
                
                if ($_FILES['img_url']['name']) {
                    $settings   = $this->admin_model->getSettingsValue();
                    $file_name  = $_FILES['img_url']['name'];
                    $fileSize   = $_FILES["img_url"]["size"] / 1024;
                    $fileType   = $_FILES["img_url"]["type"];
                    /*          $new_file_name='';
                    $new_file_name .= $title;*/
                    $checkimage = "./assets/img/$settings->sitelogo";
                    
                    $config = array(
                        'file_name' => $file_name,
                        'upload_path' => "./assets/img",
                        'allowed_types' => "gif|jpg|png|jpeg|svg",
                        'overwrite' => False,
                        'max_size' => "13038", // Can be set to particular file size , here it is 220KB(220 Kb)
                        'max_height' => "850",
                        'max_width' => "850"
                    );
                    
                    $this->load->library('Upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('img_url')) {
                        $response['status']  = 'success';
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
                            'sitelogo' => $img_url,
                            'sitetitle' => $title,
                            'description' => $description,
                            'copyright' => $copyright,
                            'contact' => $contact,
                            'currency' => $currency,
                            'symbol' => $symbol,
                            'system_email' => $email,
                            'address' => $address
                        );
                        $success             = $this->admin_model->settingsUpdate($id, $data);
                        $response['status']  = 'success';
                        $response['message'] = "Successfully Updated";
                        $this->output->set_output(json_encode($response));
                        #$this->session->set_flashdata('feedback','Successfully Updated');    
                    }
                } else {
                    $data                = array();
                    $data                = array(
                        'sitetitle' => $title,
                        'description' => $description,
                        'copyright' => $copyright,
                        'contact' => $contact,
                        'currency' => $currency,
                        'symbol' => $symbol,
                        'system_email' => $email,
                        'address' => $address
                    );
                    $success             = $this->admin_model->settingsUpdate($id, $data);
                    $response['status']  = 'success';
                    $response['message'] = "Successfully Updated";
                    $this->output->set_output(json_encode($response));
                }
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    //Similarly, you can force download other files formats like word doc, pdf files, etc.
    public function Download_image(){
        // Get parameters
        $file     = $this->input->get('image');
        $filepath = "./assets/img/user/" . $file;
        // Process download
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            exit();
        }
    }
    public function Backup_page(){
        if ($this->session->userdata('user_login_access') != False) {
            $this->load->view('admin/backup');
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function Backup_Database(){
        $database = 'admin';
        $username = 'root';
        $password = '';
        $hostname = 'localhost';
        $path     = 'assets/dbbackup.sql';
        if ($this->Backup_sql($database, $username, $password, $hostname, $path)) {
            $this->session->set_flashdata('feedback', 'Successfully Downloaded');
            redirect(base_url() . 'admin/Backup_page');
        } else {
            $this->session->set_flashdata('feedback', 'Successfully Downloaded');
            redirect(base_url() . 'admin/Backup_page');
        }
    }
    public function Backup_sql($database, $username, $password, $hostname, $path){

        //ENTER THE RELEVANT INFO BELOW
        $mysqlDatabaseName = $database;
        $mysqlUserName     = $username;
        $mysqlPassword     = $password;
        $mysqlHostName     = $hostname;
        $mysqlExportPath   = $path;
        
        //DO NOT EDIT BELOW THIS LINE
        //Export the database and output the status to the page
        $command = 'mysqldump --opt -h' . $mysqlHostName . ' -u' . $mysqlUserName . ' -p' . $mysqlPassword . ' ' . $mysqlDatabaseName . ' > ' . $mysqlExportPath;
        exec($command, $output = array(), $worked);
        switch ($worked) {
            case 0:
                echo 'Database <b>' . $mysqlDatabaseName . '</b> successfully exported to <b>' . getcwd() . '/' . $mysqlExportPath . '</b>';
                break;
            case 1:
                echo 'There was a warning during the export of <b>' . $mysqlDatabaseName . '</b> to <b>' . getcwd() . '/' . $mysqlExportPath . '</b>';
                break;
            case 2:
                echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' . $mysqlDatabaseName . '</b></td></tr><tr><td>MySQL User Name:</td><td><b>' . $mysqlUserName . '</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' . $mysqlHostName . '</b></td></tr></table>';
                break;
                
        }
    }
    
    
    /*Notification*/
    function set_notification(){
        $data = $_POST["id"];
        $this->load->model('admin_model');
        $this->admin_model->set_notifiication($data);
    }
}
/*End admin controller*/