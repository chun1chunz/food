<?php 
require_once './models/BaseModel.php';
require_once './models/Product.php';
require_once './models/User.php';


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
			//var_dump($count_Order); die;
			//var_dump($_SESSION['login']); die;
			include_once '././admin/index.php';
		

	}
}

 ?>