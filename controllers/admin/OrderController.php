<?php 
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Login.php';
require_once './models/Invoice.php';
require_once './models/Order_detail.php';

class OrderController
{
    public function index(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // Login::checkLogin();
		// if($rule =true){
            $order = Order::all();

            include_once './views/admin/order/index.php';
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }   
       
    }
    public function detail(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // Login::checkLogin();
		// if($rule = true){
            $id = $_GET['id'];
            $oder_detail = Order_detail::where('order_id','=',$id)->get();
            
            include_once './views/admin/order_detail/index.php';
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }        
        
        
    }
    public function remove(){
            $id = $_GET['id'];
            Order::delete($id);
            
            $order = new Order_detail();
            
            $order->order_id= $_GET['id'];
            
            $search = Order_detail::where('order_id','=',$order->order_id)->get();
            $ob[0] = $search;
            foreach ($ob[0] as $key){
                $order_detail_id = $key->id;
                
                Order_detail::delete($order_detail_id);
                
            }
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