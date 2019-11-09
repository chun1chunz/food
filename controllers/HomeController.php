<?php
require_once './models/Product.php';
require_once './models/Invoice.php';
class HomeController
{
    public function index(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
               
                $a = getdate();
                $mday = $a['mday'];
                $mon = $a['mon'];
                $year = $a['year'];
                $weekday = $a['weekday'];

                $date_create = $weekday.', '.$mday.':'.$mon.':'.$year;
        
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

                $date_create = $weekday.', '.$mday.':'.$mon.':'.$year;
        
        $order = Order::where('created_at','=','"'.$date_create.'"')->get();
        //var_dump($order);die;

        include_once './user/index.php';
        
    }
    
    public function remove(){
        $key = $_GET['id'];
        $a = '';
        if(isset($_COOKIE)){
            $a = $_COOKIE['role'];
            if(isset($a)){
                unset($_SESSION['cart'][$key], $_SESSION['tong'],$_SESSION['total']);
                $dele = Order::delete($key);
                $_SESSION['success']="Xóa món đã đặt thành công!!!";
    
                header("location: product");
                exit();
            }else{
                $_SESSION['Error']= "Không có quyền xoá!!!";
                header("location: product");
                exit();
            }
           

        }
        
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
               
                header('location: ./product');
                exit();
        }
    }
}

?>
