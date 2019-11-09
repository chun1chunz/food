
<?php

require_once './models/Product.php';
class ProductController{
    public function index(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // Login::checkLogin();
		// if($rule =true){
            $total_records = Product::count();
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
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
    
            include_once '././admin/product/index.php';
		
        
    }


    public function remove(){
        // Login::checkLogin();
		// if($rule =true){
            $id = $_GET['id'];

            Product::delete($id);
    
            header('location: ./product');
            exit();
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }       
        
    }

    public function addForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
        // Login::checkLogin();
		// if($rule =true){
            $model = new Product();
            $products = Product::all();
            include_once './admin/product/addForm.php';

		// }else{
		// 	header('location: user_login');
        //     exit();
		// }       
        
    }

    public function editForm(){
        global $baseUrl;
        global $adminUrl;
        global $adminAssetUrl;
    //    Login::checkLogin();
	// 	if($rule =true){
            $id = $_GET['id'];   
            $product = Product::find($id);
            $products = Product::all();

            include_once '././admin/product/editForm.php';
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }       
        
    }

    public function saveAdd(){

        $model = new Product();
        foreach($_POST as $key => $val){
            $model->{$key} = $val;
        }


        // validate
        $err = false;

        $namerr = "";
        $sell_priceerr = "";
        $list_priceerr = "";
        $statuserr = "";
        $info_1err = "";
        $detailerr = "";

        if(strlen($model->product_name) == 0 ){
            $err = true;
            $nameerr = "Nhập tên sản phẩm!";
        } else if(strlen($model->product_name) > 191){
            $err = true;
            $nameerr = "Tên sản phẩm không vượt quá 191 ký tự!";
        }

        // check trùng tên
        $countProduct = Product::where('name', '=', "'" . $model->product_name . "'")->get();
        if(count($countProduct) > 0){
            $err = true;
            $nameerr = 'Tên sản phẩm "'. $model->product_name .'" đã tồn tại, hãy nhập tên khác!';
        }

        //kiem tra price
        if($model->sell_price < 0 ){
            $err = true;
            $sell_priceerr = "Giá sản phẩm phải là số nguyên dương!";
        } else if ($model->sell_price == null || $model->sell_price == ""  || empty($model->sell_price)) {
            $err = true;
            $sell_priceerr = "Mời nhập giá sản phẩm!";
        }
        if( $model->list_price < $model->sell_price){
            $err = true;
            $list_priceerr = "Giá niêm yết phải lớn hơn giá bán!";
        }
        if($model->status == null){
            $err = true;
            $statuserr = "Cần nhập trạng thái!";
        }
        // mô tả
        if (empty($model->info_1) || $model->info_1 == null) {
            $err = true;
            $info_1err = "Mời nhập mô tả ngắn!";
        }
        if (empty($model->detail) || $model->detail == null) {
            $err = true;
            $detailerr = "Mời nhập chi tiết!";
        }

        $image = $_FILES['image'];
        // upload ảnh

        // upload ảnh and check

        if($image['size'] > 0){
            if ($image['type'] == "image/gif" OR $image['type'] == "image/png" OR $image['type'] == "image/jpeg"){

                $filename = "img/" . uniqid() . "-" . $image['name'];
                move_uploaded_file($image['tmp_name'], "public/" .$filename);
                $model->image = $filename; 

                } else {
                    $err=true;
                    $imageerr = "Mời chọn đúng định dạng hình ảnh";
                }
        } else {
            $imageerr = "Mời chọn hình ảnh!";
        }

        /* neu phat hien loi */
        if($err){
            header("location: ./product-add?nameerr=$nameerr&sell_priceerr=$sell_priceerr&list_priceerr=$list_priceerr&statuserr=$statuserr&info_1err=$info_1err&detailerr=$detailerr&imageerr=$imageerr");
            die;
        }


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
                    . " ( $valQuery )";

        // var_dump($model->queryBuilder);die;
        $model->exeQuery();
        
        header('location: ./product');
        exit();
        
    }

    public function saveEdit(){
        // Login::checkLogin();
		// if($rule =true){
            $model = Product::find($_POST['id']);
            $id = $model->id;
            foreach($_POST as $key => $val){
                $model->{$key} = $val;
            }
            // validate
            $err = false;
            
    
            $namerr = "";
            $sell_priceerr = "";
            $list_priceerr = "";
            $info_1err = "";
            $detailerr = "";
            $imageerr = "";        
    
            if(strlen($model->product_name) == 0 ){
                $err = true;
                $nameerr = "Nhập tên sản phẩm!";
            } else if(strlen($model->product_name) > 191){
                $err = true;
                $nameerr = "Tên sản phẩm không vượt quá 191 ký tự!";
            }
    
            // check trùng tên
            $countProduct = Product::where('name', '=', "'" . $model->product_name . "' and id != " . $id )->get();
            // var_dump($sqlname);die;
            if(count($countProduct) > 0){
                $err = true;
                $nameerr = 'Tên sản phẩm "'. $model->product_name .'" đã tồn tại, hãy nhập tên khác!';
            }
    
            //kiem tra price
            if($model->sell_price < 0 ){
                $err = true;
                $sell_priceerr = "Giá sản phẩm phải là số nguyên dương!";
            } else if ($model->sell_price == null || $model->sell_price == ""  || empty($model->sell_price)) {
                $err = true;
                $sell_priceerr = "Mời nhập giá sản phẩm!";
            }
            // kiểm tra cate
            if ($model->sell_price > $model->list_price) {
                $err = true;
                $list_priceerr = "Giá niêm yết phải cao hơn giá bán!";
            }
           
            if (empty($model->info_1) || $model->info_1 == null) {
                $err = true;
                $info_1err = "Mời nhập mô tả ngắn!";
            }
            if (empty($model->detail) || $model->detail == null) {
                $err = true;
                $detailerr = "Mời nhập mô tả ngắn!";
            }
            $image = $_FILES['image'];
            // upload ảnh
    
            // upload ảnh and check
    
    
            if($image['size'] > 0){
                if ($image['type'] == "image/gif" OR $image['type'] == "image/png" OR $image['type'] == "image/jpeg"){
    
                    $filename = "img/" . uniqid() . "-" . $image['name'];
                    move_uploaded_file($image['tmp_name'], "public/" .$filename);
                    $model->image = $filename; 
    
                    } else {
                        $err=true;
                        $imageerr = "Mời chọn đúng định dạng hình ảnh";
                    }
            }
    
    
    
                    /* neu phat hien loi */
            if($err){
                header("location: ./product-edit?id=$id&&nameerr=$nameerr&priceerr=$priceerr&cateerr=$cateerr&starerr=$starerr&viewerr=$viewerr&short_descerr=$short_descerr&detailerr=$detailerr&imageerr=$imageerr");
                die;
            }
    
    
            
            $setQuery = "";
            foreach($model->cols as $co){
                $setQuery .= $co . " = '" . $model->{$co} . "', ";
            }
            $setQuery = rtrim($setQuery, ", ");
    
            $model->queryBuilder =  "update " . $model->table 
                        . " set $setQuery"
                        . " where id = " . $model->id;
            $model->exeQuery();
            header('location: ./product');
            
            exit();
		// }else{
		// 	header('location: user_login');
        //     exit();
		// }       
        
    }
    
}



?>
