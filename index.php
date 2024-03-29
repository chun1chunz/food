<?php
session_start();

$key = $_SERVER['HTTP_HOST'];

if( strpos($key, "localhost")!==false){

    $baseUrl = "http://localhost/abc/";

}else{
    
    $baseUrl ="http://phpstack-307003-1031469.cloudwaysapps.com/";
}

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$userUrl = $baseUrl."views/user/";
$adminUrl = $baseUrl."views/admin";
$adminAssetUrl = $baseUrl."public/adminlte/";

//Guest
require_once "./controllers/HomeController.php";
//login
require_once "./controllers/LoginController.php";
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