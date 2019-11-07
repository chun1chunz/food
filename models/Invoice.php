<?php
require_once './models/BaseModel.php';
require_once './models/Login.php';
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Order_detail.php';

class Order extends BaseModel
{
    public $table = 'orders';
    
    public function getUser($user_id){
       
        $user = User::where('id','=',$user_id)->get();
        
        return $user[0] ;
    }
    public function getProduct($product_id){
        
        $product = Product::where('id', '=', $product_id)->get();
        
        return $product[0];
    }
}



?>