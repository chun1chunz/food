<?php
require_once './models/BaseModel.php';
class User extends BaseModel
{
    public $table = 'users';

        public $cols = ['name', 'address', "phone", 'email', 'role', 'password', 'avatar'];


}



?>