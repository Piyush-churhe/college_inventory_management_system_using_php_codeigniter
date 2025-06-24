<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Static_html extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->database();
        $this->load->model('crud_model');
        $this->load->model('login_model');    
  
    }
    public function Login(){
        $this->load->view('static-html/login');
    }
    public function Forgot(){
        $this->load->view('static-html/forgotpass');
    } 
    public function Signup(){
        $this->load->view('static-html/register');
    }
    public function Blank(){
        $this->load->view('static-html/blank');
    } 
    public function Chart(){
        $this->load->view('static-html/chart');
    }  
    public function Buttons(){
        $this->load->view('static-html/buttons');
    }  
    public function Calendar(){
        $this->load->view('static-html/calendar');
    }  
    public function forms_elements(){
        $this->load->view('static-html/form-elements');
    }   
    public function Forms_validation(){
        $this->load->view('static-html/form-validation');
    }   
    public function Forms_wizard(){
        $this->load->view('static-html/form-wizard');
    }    
    public function Datatable(){
        $this->load->view('static-html/datatable');
    }     
    public function Dropzone(){
        $this->load->view('static-html/dropzone');
    }    
    public function Table_normal(){
        $this->load->view('static-html/table-normal');
    }     
    public function text_editor(){
        $this->load->view('static-html/texteditor');
    }    
    public function select_two(){
        $this->load->view('static-html/select2');
    }     
    public function product_list(){
        $this->load->view('static-html/product-list');
    }     
    public function product_details(){
        $this->load->view('static-html/product-detail');
    }     
    public function profile(){
        $this->load->view('static-html/profile');
    }    
    public function product(){
        $this->load->view('static-html/product');
    }      
    public function datepicker(){
        $this->load->view('static-html/datepicker');
    }        
    public function invoice(){
        $this->load->view('static-html/invoice');
    }         
    public function demo_404(){
        $this->load->view('static-html/404');
    }         
    public function demo_403(){
        $this->load->view('static-html/403');
    }         
    public function demo_500(){
        $this->load->view('static-html/500');
    }    
}