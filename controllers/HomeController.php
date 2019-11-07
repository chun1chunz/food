<?php
require_once './models/Product.php';
require_once './models/Invoice.php';
require_once './models/Order_detail.php';
class HomeController
{
    public function index(){
        //$model = Product::all();
        
        $total_records = Product::count();
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 6;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
        $model = Product::limit($start, $limit);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
               
                $a = getdate();
                $mday = $a['mday'];
                $mon = $a['mon'];
                $year = $a['year'];
                $weekday = $a['weekday'];
//var_dump($weekday); die;
                $date_create = $weekday.', '.$mday.':'.$mon.':'.$year;
        
        $order = Order::where('created_at','=','"'.$date_create.'"')->get();
        //var_dump($order);die;

        include_once './user/index.php';
        
    }
    public function addCart(){
        $id = ''; 
        if( isset( $_GET['id'])) {
            $id = $_GET['id']; 
        } 
        $model = Product::find($id);

        if( ! isset($_SESSION["cart"][$id])){
            // tao moi
            $_SESSION["cart"][$id]['product_name']= $model->product_name;
            $_SESSION["cart"][$id]['image']= $model->image;
            $_SESSION["cart"][$id]['sell_price']= $model->sell_price;
            $_SESSION["cart"][$id]['number']= 1;
            
        }else{
            $_SESSION["cart"][$id]['number']+=1;
        }
        // var_dump( $_SESSION["cart"]); die;
        $_SESSION['addCart']="Thêm món đã đặt thành công!!!";
        // header("location: product?id=$id");
        // exit();
    }
    public function cart(){
        if(!isset($_SESSION["cart"])||$_SESSION["cart"]==null){
            $_SESSION['false']="Bạn chưa mua hàng!!!";
            header("location: product");
            exit();
        }else{
            include_once './user/cart.php';
        
        }
    }
    public function remove(){
        $key = $_GET['id'];
        
        unset($_SESSION['cart'][$key], $_SESSION['tong'],$_SESSION['total']);
        $dele = Order::delete($key);
        $_SESSION['success']="Xóa món đã đặt thành công!!!";

        header("location: product");
        exit();
    }
    public function postPay(){
        if(!isset($_SESSION['login'])){
            $_SESSION['login_erorr'] = "Bạn phải đăng nhập mới mua được hàng!!!";
            header("location: user_login");
            exit();
        }else{
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $model = new Order();
                $model->user_id= $_SESSION['login']['id'];
                $model->product_id= $_GET['id'];
                $a = getdate();
                $minu = $a['minutes'];
                $hours = $a['hours'];
                $seconds = $a['seconds'];
                $mday = $a['mday'];
                $mon = $a['mon'];
                $year = $a['year'];
                $weekday = $a['weekday'];
//var_dump($weekday); die;
                $date_create = $weekday.', '.$mday.':'.$mon.':'.$year;
                
                $model->date_hi = $date_create;
                $model->queryBuilder =  "insert into " . $model->table 
                            . " (amount, user_id, product_id, note, created_at)"
                            . " values "
                            . " ( 
                                '1',
                                '$model->user_id',
                                '$model->product_id',
                                '1',
                                '$model->date_hi'
                            )";
                //var_dump( $model->queryBuilder); die;
                $model->exeQuery();
            
                unset($_SESSION['cart']);
                
                $_SESSION['order']="Đặt thành công!!!";
               
                //$order = Order::where('created_at','=','"'.$date_create.'"');
                // var_dump($order); die;
                header('location: ./product');
                exit();
        }
    }
}

?>
