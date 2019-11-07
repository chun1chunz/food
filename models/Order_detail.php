<?php
require_once './models/BaseModel.php';
require_once './models/Login.php';
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Invoice.php';
class Order_detail extends BaseModel
{
    public $table = 'order_detail';
    public function getProduct($product_id){
        
        $product = Product::where('id', '=', $product_id)->get();
        
        return $product[0];
    }
}



?>