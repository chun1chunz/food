<?php 
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Invoice.php';

class OrderController
{
    public function index(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // Login::checkLogin();
		// if($rule =true){
            $order = Order::all();

            include_once './admin/order/index.php';
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }   
       
    }
    
    public function remove(){
            $id = $_GET['id'];
            Order::delete($id);
            header('location: order');
            exit();
    }

    public function addForm(){
       
    }

    public function saveAdd(){
       
    }


    public function editForm(){
       
    }

    public function saveEdit(){
       
    }
}   

?>