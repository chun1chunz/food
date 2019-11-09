<?php
require_once './models/User.php';


class LoginController
{

    public function index(){
       
        if(isset($_COOKIE["id"])){
            $_SESSION['alert']="Bạn vẫn đang đăng nhập!!!";
            header('location: ./product');
            exit();
        } else {
            include_once './user/user_login.php';
        }
        
    }


    public function postLogin(){
        $remember=false;

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $a_check=((isset($_POST['remember'])!=0)?1:"");

            if($email=="" || $password==""){
	 
                $_SESSION['postLogin_erorr']="vui lòng điền đầy đủ thông tin!!!";
                
                header('location: user_login');

                exit();
	 
	        } else{
                $ob = User::where('email', '=', "'" . $email . "'")->get();
                if($ob == null){
                    $_SESSION['postLogin_email']="Email khôn tồn tại!!!";
                
                    header('location: user_login');

                    exit();
	 
                }else{
                    $user = $ob[0];
                    $checkpass = password_verify (  $password , $user->password );
                    if ($email == $user->email && $checkpass == true) {
                        $_SESSION['login']['email'] = $user->email;
                        $_SESSION['login']['password'] = $user->password;
                        $_SESSION['login']['role'] = $user->role;
                        $_SESSION['login']['name'] = $user->name;
                        $_SESSION['login']['id'] = $user->id;
                    
                        
                        $_SESSION['remember']=true;
                        setcookie("remember", $_SESSION['remember'],time()+60*60*0.25);
                        $_COOKIE["remember"];
                        setcookie("name",  $_SESSION['login']['email'], time()+60*60*0.25);
                        $_COOKIE["name"];
                        setcookie("pass", $_SESSION['login']['password'], time()+60*60*0.25);
                        $_COOKIE["pass"];
                        setcookie("role", $_SESSION['login']['role'], time()+60*60*0.25);
                        $_COOKIE["role"];
                        setcookie("id", $_SESSION['login']['id'], time()+60*60*0.25);
                        $_COOKIE["id"];                     
                        
                        if((int)$_SESSION['login']['role'] == 1){
                            $_SESSION['hi']="Đăng nhập thành công admin.!!!";
                                
                                header('location: adminlte');
                                exit();
                        }else{
                            if(isset($_SESSION['cart'])){
                                $_SESSION['T_pay']="Đăng nhập thành công user và tiến hành thanh toán!!!";
                                header('location: posPay');
                                exit();
                            }else{
                                $_SESSION['Ok']="Đăng nhập thành công user.!!!";
                               
                                header('location: product');
                                exit();
                            }
                        }
                    }
                }
            }        
        }

    }

    public function logout(){
        //var_dump($_COOKIE[$hi]); die;
        if(isset($_SESSION['login'])||isset($_COOKIE["id"])){
            session_destroy();
        
            session_start();
    
            setcookie("remember", $_SESSION['remember'],time()-60*60*0.25);
            setcookie("name",  $_SESSION['login']['email'], time()-60*60*0.25);
            setcookie("pass", $_SESSION['login']['password'], time()-60*60*0.25);
            setcookie("role", $_SESSION['login']['role'], time()-60*60*0.25);
            setcookie("id", $_SESSION['login']['id'], time()-60*60*0.25);
            $_SESSION['logout']="Đăng xuất thành công!!!";

            header('location: ./product');
            exit();
        }else{
            $_SESSION['logout_ero']="Bạn chưa đăng nhập!!!";

            header('location: ./product');
            exit();
        }
        
    }
    public function signup(){

        include_once '././user/signup.php';
    }
    public function user_login(){
        
       
        if(isset($_SESSION['login']['id'])||isset($_COOKIE["id"])){
            
                $_SESSION['alert']="Bạn vẫn đang đăng nhập!!!";
                header('location: ./product');
                exit();
            } else {

            include_once '././user/user_login.php';
        }
        
    }
    public function postSignup(){
         
        $model = new User();

        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }
        $model->avatar = "https://www.xahara.vn/wp-content/uploads/h%C3%ACnh-%E1%BA%A3nh-Alaska-%C4%91%E1%BA%B9p-%C4%91%C3%A1ng-y%C3%AAu.jpg";

        // validate
        $err = false;
        $namerr = "";
        $emailerr = "";
        $passworderr = "";
        

        if(strlen($model->name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên";
        } else if(strlen($model->name) > 191){
            $err = true;
            $nameerr = "Tên không vượt quá 191 ký tự!";
        }

        if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$^",$model->email))
        { 
            $err = true;
            $emailerr = "Mời nhập đúng định dạng email!";
        }
        if($model->email == "" ){
            $err = true;
            $email = "Nhập email";
        } else if(strlen($model->email) > 191){
            $err = true;
            $emailerr = "email không vượt quá 191 ký tự!";
        } 
        // check trùng email
        $countUser = User::where('email', '=', "'" . $model->email . "'")->get();
        if(count($countUser) > 0){
            $err = true;
            $emailerr = 'Email "'. $model->email .'" đã tồn tại, hãy nhập email khác!';
        }

        //check định dạng email

        if ($model->password == "") {
            $err = true;
            $passworderr = "Nhập mật khẩu!";

        }


        if ($model->password !== $model->confirm_password) {
            $err = true;
            $passworderr = "Nhập mật khẩu!";
            $cpassworderr = "Xác nhận chính xác mật khẩu!";

        }

        if($err){
            header("location: ./signup?nameerr=$nameerr&emailerr=$emailerr&passworderr=$passworderr&cpassworderr=$cpassworderr");
            die;
        }

        $model->password = password_hash($model->password, PASSWORD_DEFAULT);
        $colQuery = "";
        $valQuery = "";

        foreach($model->cols as $co){
            $colQuery .= "$co, ";
            $valQuery .= "'". $model->{$co} ."', ";
        }

        $colQuery = rtrim($colQuery, ", ");
        $valQuery = rtrim($valQuery, ", ");
        
        $model->queryBuilder =  "insert into " . $model->table 
                                . " ($colQuery)"
                                . " values "
                                . " ( '$model->name',
                                    '1',
                                    '1',
                                    '$model->email',
                                    '5',
                                    '$model->password',
                                    '1')";
        $model->exeQuery();
        $_SESSION['sign_hi']="Bạn đăng kí thành công user hãy tiến hành đăng nhập!!!";
        header('location: product');
        exit();
    }


}

 ?>