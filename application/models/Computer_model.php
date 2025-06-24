<?php

class Computer_model extends CI_Model {
    
    
    function __consturct() {
        parent::__construct();
        
    }
    /*All the names are suggestive enough and hence less code commenting*/
    public function insertcategory($data) {
        $this->db->insert('category', $data);
    }
    public function insertSizeValue($data) {
        $this->db->insert('size', $data);
    }
    public function insertColorValue($data) {
        $this->db->insert('color', $data);
    }
    public function insertBrandValue($data) {
        $this->db->insert('brand', $data);
    }
    public function insertSubcategory($data) {
        $this->db->insert('sub_category', $data);
    }
    public function getCategory() {
        $category = $this->db->dbprefix('category');
        $sql      = "SELECT * FROM $category";
        $query    = $this->db->query($sql);
        $result   = $query->result();
        return $result;
    }
    public function getColor() {
        $color  = $this->db->dbprefix('color');
        $sql    = "SELECT * FROM $color ";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSize() {
        $size   = $this->db->dbprefix('size');
        $sql    = "SELECT * FROM $size";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getBrand() {
        $brand  = $this->db->dbprefix('brand');
        $sql    = "SELECT * FROM $brand";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getsubcategoryByID($catid) {
        $subcategory = $this->db->dbprefix('sub_category');
        $sql         = "SELECT * FROM $subcategory
    WHERE `cat_id`='$catid'";
        $query       = $this->db->query($sql);
        $result      = $query->result();
        return $result;
    }
    public function productInsert($data) {
        $this->db->insert('product', $data);
    }
    public function productColor($data) {
        $this->db->insert('product_color', $data);
    }
    public function productSize($data) {
        $this->db->insert('product_size', $data);
    }
    public function getProfileValue($userid) {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user
    WHERE `user_id`='$userid'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getUserValue($id) {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user WHERE `user_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    /*delet single product image*/
    public function getSingleProImageById($id) {
        $image  = $this->db->dbprefix('product_image');
        $sql    = "SELECT * FROM $image
    WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    /*delet all product image*/
    public function getProImageById($id) {
        $image  = $this->db->dbprefix('product_image');
        $sql    = "SELECT * FROM $image
    WHERE `pro_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function UserUpdate($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }

      public function getProValue($id) {
        $product   = $this->db->dbprefix('product');
        $sql    = "SELECT * FROM $product WHERE `pro_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }


     public function ProductUpdate($pro_id, $data) {
        $this->db->where('pro_id', $pro_id);
        $this->db->update('product', $data);
    }
    
    public function UpdateTododata($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('to_do_list', $data);
    }
    public function updatePassword($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }
    public function settingsUpdate($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('settings', $data);
    }
    public function getProductData() {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSubCatById($id) {
        $sql    = "SELECT `sub_category`.*,
      `category`.*
      from `sub_category`
      LEFT JOIN `category` ON `sub_category`.`cat_id`=`category`.`cat_id`
      WHERE `sub_category`.`subcat_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateSubcategory($id, $data) {
        $this->db->where('subcat_id', $id);
        $this->db->update('sub_category', $data);
    }
    public function getproductdetails($proid) {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*,
      `brand`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`  
      LEFT JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
      WHERE `product`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getProductById($id) {
        $sql    = "SELECT `product`.*,
      `category`.*,
      `sub_category`.*,
      `brand`.*
      from `product`
      LEFT JOIN `category` ON `product`.`cat_id`=`category`.`cat_id`  
      LEFT JOIN `sub_category` ON `product`.`subcat_id`=`sub_category`.`subcat_id`  
      LEFT JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id`
      WHERE `product`.`pro_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetRelatedproduct($catid,$proid) {
        $sql    = "SELECT * FROM `product` WHERE `product`.`cat_id`='$catid' AND `product`.`pro_id` != '$proid' LIMIT 4";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function getproductsize($proid) {
        $sql    = "SELECT `product_size`.*,
      `size`.*
      from `product_size`
      LEFT JOIN `size` ON `product_size`.`size_id`=`size`.`size_id`  
      WHERE `product_size`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getproductcolor($proid) {
        $sql    = "SELECT `product_color`.*,
      `color`.*
      from `product_color`
      LEFT JOIN `color` ON `product_color`.`color_id`=`color`.`color_id`  
      WHERE `product_color`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSettingsValue() {
        $settings = $this->db->dbprefix('settings');
        $sql      = "SELECT * FROM $settings";
        $query    = $this->db->query($sql);
        $result   = $query->row();
        return $result;
    }
    public function getAllUsers() {
        $user   = $this->db->dbprefix('users');
        $sql    = "SELECT * FROM $user WHERE `status`='ACTIVE' && `position`='Computer_Teacher'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function addUserInfo($data) {
        $this->db->insert('users', $data);
    }
    public function getAllGroupsUser() {
        $sql    = "SELECT * FROM `users` WHERE `user_type`='User'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getAllGroupsAdmin() {
        $sql    = "SELECT * FROM `users` WHERE `user_type`='Admin'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function selectgroupdatabyId($id) {
        $sql    = "SELECT * FROM `users` WHERE `user_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateGroupInfo($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }
    public function addUserNote($data) {
        $this->db->insert('notes', $data);
    }
    public function getUserNotes($userid) {
        $sql    = "SELECT `users`.*,
      `notes`.*
      from `notes`
      LEFT JOIN `users` ON `notes`.`comment_id`=`users`.`user_id`
      WHERE `notes`.`user_id`='$userid' ORDER BY `notes`.`datetime`DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSubCategory() {
        $sql    = "SELECT `category`.*,
      `sub_category`.*
      from `sub_category`
      LEFT JOIN `category` ON `sub_category`.`cat_id`=`category`.`cat_id`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getTodoInfo($userid) {
        $sql    = "SELECT * FROM `to_do_list` WHERE `user_id`='$userid' ORDER BY `id` DESC";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProImage() {
        $sql    = "SELECT * FROM `product_image`";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getproductImages($proid) {
        $sql    = "SELECT * FROM `product_image` WHERE `pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProductColors($proid) {
        $sql    = "SELECT `product_color`.*,
      `color`.*
      from `product_color`
      LEFT JOIN `color` ON `product_color`.`color_id`=`color`.`color_id`
      WHERE `product_color`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getProductSizes($proid) {
        $sql    = "SELECT `product_size`.*,
      `size`.*
      from `product_size`
      LEFT JOIN `size` ON `product_size`.`size_id`=`size`.`size_id`
      WHERE `product_size`.`pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getCategoryValueById($id) {
        $sql    = "SELECT * FROM `category` WHERE `cat_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getSizeBYId($id) {
        $sql    = "SELECT * FROM `size` WHERE `size_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getColorById($id) {
        $sql    = "SELECT * FROM `color` WHERE `color_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetproductImage($proid) {
        $sql    = "SELECT * FROM `product_image` WHERE `pro_id`='$proid'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getBrandBYID($id) {
        $sql    = "SELECT * FROM `brand` WHERE `brand_id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function updateCategory($catid, $data) {
        $this->db->where('cat_id', $catid);
        $this->db->update('category', $data);
    }
    public function updateSizeValue($id, $data) {
        $this->db->where('size_id', $id);
        $this->db->update('size', $data);
    }
    public function updateColorValue($id, $data) {
        $this->db->where('color_id', $id);
        $this->db->update('color', $data);
    }
    public function updateBrandValue($id, $data) {
        $this->db->where('brand_id', $id);
        $this->db->update('brand', $data);
    }
    public function productUpdateInfo($id, $data) {
        $this->db->where('pro_id', $id);
        $this->db->update('product', $data);
    }
    public function insert_tododata($data) {
        return $this->db->insert('to_do_list', $data);
    }
    public function productImgInsert($data1) {
        $this->db->insert('product_image', $data1);
    }
    public function userTableDelet($id) {
        $this->db->delete('users', array(
            'user_id' => $id
        ));
        $this->db->delete('notes', array(
            'user_id' => $id
        ));
        $this->db->delete('notes', array(
            'comment_id' => $id
        ));
    }
    public function delet_Color($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_color');
    }
    public function delet_Size($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_size');
    }
    public function delet_Product($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product');
    }
    public function deelet_Img($id) {
        $this->db->where('id', $id);
        $this->db->delete('product_image');
    }
    public function deelet_Pro_Imgage($id) {
        $this->db->where('pro_id', $id);
        $this->db->delete('product_image');
    }
    /*Notifications Model*/
    public function notifications_user($id) {
        $sql = "SELECT `notes`.*,
        `users`.`full_name`, `image`
        FROM `notes` 
        LEFT JOIN `users` ON `notes`.`comment_id` = `users`.`user_id`
        WHERE `notes`.`user_id` = '$id' AND `notification_status` = 'unseen' AND `notes`.`comment_id` != '$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function set_notifiication($id) {
        $sql = "UPDATE notes SET notification_status = 'seen' WHERE user_id = '$id' AND notification_status = 'unseen'";
        $this->db->query($sql);
        
    }
    
}
?>