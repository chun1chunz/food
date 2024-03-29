<?php
class BaseModel
{

    function __construct(){
        $servername = "localhost";
        $key = $_SERVER['HTTP_HOST'];

        if( strpos($key, "localhost")!==false){

            $username = "root";
            $database = "web";
            $password = "";

        }else{
            
            $username = "aysudqptng";
            $database = "aysudqptng";
            $password = "Uwbn9aJ6jA";
        }
        
         $cookie_name = "user";
         $cookie_time = (3600); //  1 giờ
        try {
            $this->connect = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function count(){
        $model = new static();
        $model->queryBuilder = "select count(*) as total from " . $model->table;
        $result = $model->get();
        if(count($result) > 0){
            return $result[0]->total;
        }
        return null;
    }


    public static function where($col, $op = '=', $val){
        $model = new static();
        $model->queryBuilder = "select * from " . $model->table 
                                    . " where $col $op $val";
        return $model;
    }
        public static function where2($arr){
        $model = new static();
        $model->queryBuilder = "select * from $model->tableName where $arr[0] $arr[1] '$arr[2]'";
        $result = $model->get();
        if(count($result) > 0){
            return $result[0];
        }
        return null;
    }
    public function andWhere($arr){
        $this->queryBuilder .= " and $arr[0] $arr[1] '$arr[2]'";
        return $this;
    }
    public static function find($val){
        $model = new static();
        $model->queryBuilder = "select * from " . $model->table 
                                    . " where id = '$val'";
        $result = $model->get();
        if(count($result) > 0){
            return $result[0];
        }
        return null;
    }

    public static function all(){
        $model = new static();
        $model->queryBuilder = "select * from " . $model->table;
        return $model->get();
    }
    public static function limit($start,$limit){
        $model = new static();
        $model->queryBuilder = "select * from " . $model->table
                                    . " limit $start,$limit";
        return $model->get();
    }

    public function get(){
        $stmt = $this->connect->prepare($this->queryBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
    }

    public static function delete($id)
    {
        $model = new static();
        $sqlQuery = "delete from ". $model->table 
                    . " where id = $id";
        $stmt = $model->connect->prepare($sqlQuery);
        $stmt->execute();
        return true;
    }

    public function exeQuery(){
        $stmt = $this->connect->prepare($this->queryBuilder);
        $stmt->execute();
        return null;
        
    }
    public function exeRandom(){
        $model = new static();
        $model->queryBuilder = "SELECT * FROM ". $model->table 
        . " ORDER BY RAND() LIMIT 4";
        return $model->get();
    }
    
}

?>