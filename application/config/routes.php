<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['medicine_test'] = 'Crud/medicine_test';
#$route['Login'] = 'login/signIn';
#$route['Logout'] = 'login/logout';
#$route['SignUp'] = 'login/viewSignUp';
#$route['Dashboard'] = 'crud/dashboard';
#$route['resetpass'] = 'crud/Add_Reset_password';
#$route['To_Do'] = 'crud/Add_Todo_data';
#$route['UserSignup'] = 'login/User_SignUP';
#$route['UserList'] = 'crud/List_user';
#$route['AddUser'] = 'crud/Add_User';
#$route['User_Delet'] = 'crud/user_delet';
#$route['Groups'] = 'crud/ListGroup';
#$route['Update_Todo'] = 'crud/Update_Tododata';
#$route['groupdata'] = 'crud/groupDataByID';
#$route['Update_group'] = 'crud/Update_Group';
#$route['permissions'] = 'crud/View_permissions';
#$route['add_category'] = 'crud/Add_CategoryData';
#$route['category'] = 'crud/view_category';
#$route['cattegorybyid'] = 'crud/CategoryById';
#$route['subcategory'] = 'crud/view_subcategory';
#$route['subcattegorybyid'] = 'crud/GetsubcategoryByid';
#$route['brand'] = 'crud/view_brand';
#$route['brandbyid'] = 'crud/GetBrandById';
#$route['color'] = 'crud/view_color';
#$route['colorbyid'] = 'crud/GetcolorById';
#$route['size'] = 'crud/view_size';
#$route['sizebyid'] = 'crud/GetSizeById';
#$route['categoryby'] = 'crud/Get_categoryByID';
#$route['add_subcategory'] = 'crud/Add_SubCategoryData';
#$route['ProductSubmit'] = 'crud/Add_ProductData';
#$route['addsize'] = 'crud/Add_SizeData';
#$route['addcolor'] = 'crud/Add_ColorData';
#$route['addbrand'] = 'crud/Add_BrandData';
#$route['Product'] = 'crud/View_Product';
#$route['prodata'] = 'crud/Getprodatabyid';
#$route['Profile'] = 'crud/View_profile';
#$route['prolist'] = 'crud/product_list';
#$route['viewpro'] = 'crud/product_details';
#$route['Unlink'] = 'crud/UnlinkImage';
#$route['ProductUpdate'] = 'crud/UpdateProduct';
#$route['Deletproduct'] = 'crud/Delet_ProductInfo';
#$route['userupdate'] = 'crud/Update_Value';
#$route['Retriev'] = 'login/forgotten_page';
#$route['password'] = 'login/forgot_password';
#$route['Reset_password'] = 'login/Reset_View';
#$route['password_validation'] = 'login/Reset_password_validation';
#$route['Download'] = 'crud/Download_image';
#$route['View'] = 'crud/View_userDataBYID';
#$route['Confirm_Account'] = 'login/verification_confirm';
#$route['backupdb'] = 'crud/Backup_page';
#$route['Backup'] = 'crud/Backup_Database';
#$route['Settings'] = 'crud/Site_Settings';
#$route['setSettings'] = 'crud/Add_Settings';
/*Static html page*/
#$route['Static-forms-validation'] = 'Static_html/Forms_validation';


$route['404_override'] = 'Errors';
$route['translate_uri_dashes'] = FALSE;
