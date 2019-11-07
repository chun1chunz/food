<?php
require_once './models/BaseModel.php';
require_once './models/Login.php';
class Product extends BaseModel
{
	
    public $table = 'products';
    public $cols = ['image', "product_name", 'sell_price', 'list_price', 'status', 'info_1', 'detail'];
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