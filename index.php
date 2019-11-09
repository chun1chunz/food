<?php
session_start();

$key = $_SERVER['HTTP_HOST'];

if( strpos($key, "localhost")!==false){

    $baseUrl = "http://localhost/abc/";

}else{
    
    $baseUrl ="http://phpstack-307003-1031469.cloudwaysapps.com/";
}

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$userUrl = $baseUrl."user/";
$adminUrl = $baseUrl."admin/";
$adminAssetUrl = $baseUrl."public/adminlte/";

//Guest
require_once "./controllers/HomeController.php";
//login
require_once "./controllers/LoginController.php";
require_once "./controllers/admin/AdminController.php";
require_once "./controllers/admin/UserController.php";
require_once "./controllers/admin/OrderController.php";
require_once "./controllers/admin/ProductController.php";
//admin


switch($url){
    case '/':
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    case 'product':
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    case 'addCart':
        $ctr = new HomeController();
        echo $ctr->addCart();
        break;
    case 'remove':
        $ctr = new HomeController();
        echo $ctr->remove();
        break;
    case 'postPay':
        $ctr = new HomeController();
        echo $ctr->postPay();
        break;

    case 'adminlte':
        $ctr = new AdminController();
        echo $ctr->index();
        break;

case 'adminlte/order':
        $ctr = new OrderController();
        echo $ctr->index();
        break;
case 'adminlte/order-remove':
        $ctr = new OrderController();
        echo $ctr->remove();
        break;
case 'adminlte/order_detail':
        $ctr = new OrderController();
        echo $ctr->detail();
        break;
case 'adminlte/user':
        $ctr = new UserController();
        echo $ctr->index();
        break;
// case 'admin/user-add':
//         $ctr = new UserController();
//         echo $ctr->addForm();
//         break;
// case 'admin/user-edit':
//         $ctr = new UserController();
//         echo $ctr->editForm();
//         break;
case 'adminlte/user-remove':
        $ctr = new UserController();
        echo $ctr->remove();
        break;
/* Product*/     
    case 'adminlte/product':
        $ctr = new ProductController();
        echo $ctr->index();
        break;    
    /* remove */
    case 'adminlte/product-remove':
        $ctr = new ProductController();
        echo $ctr->remove();
        break;
    /*add*/
    case 'adminlte/product-add':
        $ctr = new ProductController();
        echo $ctr->addForm();
        break;
    
    case 'adminlte/product-save-add':
        $ctr = new ProductController();
        echo $ctr->saveAdd();
        break;
    /*edit*/
    case 'adminlte/product-edit':
        $ctr = new ProductController();
        echo $ctr->editForm();
        break;

    case 'adminlte/product-save-edit':
        $ctr = new ProductController();
        echo $ctr->saveEdit();
        break; 

// đăng kí
case 'signup':
        $ctr = new LoginController();
        echo $ctr->signup();
        break;
case 'postSignup':
        $ctr = new LoginController();
        echo $ctr->postSignup();
        break;
case 'user_login':
        $ctr = new LoginController();
        echo $ctr->user_login();
        break;
case 'postLogin':
        $ctr = new LoginController();
        echo $ctr->postLogin();
        break;
case 'logout':
        $ctr = new LoginController();
        echo $ctr->logout();
        break;

/* admin */
    default:
        echo "<h3>404 not found!</h3>";
        break;

}

?>