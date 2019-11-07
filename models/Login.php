<?php
require_once './models/BaseModel.php';
class Login extends BaseModel
{

	public function array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

    function checkLogin(){

        if (empty($_SESSION['login'] OR $_SESSION = "")) {
            header('location: user_login');
            exit();
        } 
        $uid =$_SESSION['login']['id'];
        $e =$_SESSION['login']['email'];
        $p = $_SESSION['login']['password'];
        $r = $_SESSION['login']['role'];
        // var_dump((int)$r); die;
        $rule = false;
        if ((int)$r == 1) {
            $rule = true;
        }

    }


}



?>