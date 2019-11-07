<?php 
require_once './models/BaseModel.php';
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Admin.php';



/**
 * 
 */
class AdminController
{
	public function index(){
		global $baseUrl;
		global $adminUrl;
		global $adminAssetUrl;
		
		
			$product = Product::all();
			$user = User::all();
			$count_Product = Product::count();
			$count_User = User::count();
			$order = Order::all();
			$count_Order = Order::count();
			include_once '././models/Login.php';
			//var_dump($_SESSION['login']); die;
			include_once './views/admin/index.php';
		

	}
}

 ?>