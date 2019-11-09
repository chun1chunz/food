
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản trị</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= $adminAssetUrl?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $adminAssetUrl?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $adminAssetUrl?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= $adminAssetUrl?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="<?= $baseUrl?>public/css/main.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="">

                <p>
                Admin
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=$baseUrl?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<!--- header --->
<!----------------------------------               ----------------------------------->

<!----------------------------------               ----------------------------------->
  <!-- Left side column. contains the logo and sidebar -->
<!------------------------------------------------------------>  
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu tree" data-widget="tree">

        <li class="treeview">
          <a href="/"><span></span>
          </a>
        </li> <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Quản trị</span>
          </a>
        </li>
        <li class="treeview">
          <a href="product"><i class="fa fa-link"></i> <span>Sản phẩm</span>
          </a>
        </li>

        <li class="treeview">
          <a href="user"><i class="fa fa-link"></i> <span>Tài khoản</span>
           
          </a>
        </li>
<!--------------------------------------------------------------------->

        <li class="treeview">
          <a href="order"><i class="fa fa-link"></i> <span>Món đã đặt</span>
            
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
 <!---------------------------------------------------------------->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>



<!------------------------------------------------------------------------------------>


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-body">
        <!----------------------------------------                                     -------------------------------------------->   
        <form name="myForm" id="signupForm" action="<?= $baseUrl . "adminlte/product-save-edit"?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                        <label for="">Tên món ăn</label> 
                        <input type="text" name="product_name" id="" class="form-control" value="<?= $product->product_name?>">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <?php if(isset($_GET['nameerr'])):?>
                            <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Giá sale</label>
                        <input type="number" name="sell_price" id="" class="form-control" value="<?= $product->sell_price?>">
                        <?php if(isset($_GET['sell_priceerr'])):?>
                            <span class="text-danger err"><?= $_GET['sell_priceerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Giá niêm yết</label>
                        <input type="number" name="list_price" id="" class="form-control"value="<?= $product->sell_price?>">
                        <?php if(isset($_GET['list_priceerr'])):?>
                            <span class="text-danger err"><?= $_GET['list_priceerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label> &nbsp;
                        <input type="radio" name="status" value="0" checked=""> Hết hàng &nbsp;
                        <input type="radio" name="status" value="1"> Còn hàng 
                        <?php if(isset($_GET['statuserr'])):?>
                            <span class="text-danger err"><?= $_GET['statuserr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="img-preview mt-5 text-center">
                        <?php
                        $imgDefault = $product->image != null ? $product->image :  "images/default-img.png";
                        ?>
                        <img width="300" src="<?= $baseUrl . "public/" . $imgDefault ?>" alt="" class="img-fluid" height="300">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sp</label>
                        <input type="file" name="image" id="" class="form-control">
                        <?php if(isset($_GET['imageerr'])):?>
                            <span class="text-danger err"><?= $_GET['imageerr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="info_1" id="" rows="3" class="form-control" value=""><?= $product->info_1?></textarea>
                        <?php if(isset($_GET['info_1err'])):?>
                            <span class="text-danger err"><?= $_GET['info_1err'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" id="" rows="6" class="form-control" value=""><?= $product->detail?></textarea>
                        <?php if(isset($_GET['detailerr'])):?>
                            <span class="text-danger err"><?= $_GET['detailerr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                    <a href="<?= $baseUrl . "adminlte/product" ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
   
        <!----------------------------------------                                     -------------------------------------------->                 
              </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
<!---------------------------------------------------------------------------------------->


  </div>
  <!-- /.content-wrapper -->

<!------------------------------------------------------------------------------------------------------------------------------------>
<!-- jQuery 3 -->
<script src="<?= $adminAssetUrl?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $adminAssetUrl?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= $adminAssetUrl?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!----------------------------------               ----------------------------------->



<script type="text/javascript" src="<?= $baseUrl ?>public/plugins/jquery/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  <?php 
  if(isset($_GET['success']) && $_GET['success'] == 'true'){
    ?>
    swal('Thêm Sản phẩm thành công!');
  <?php
  }
   ?>
  $('.btn-remove').on('click', function(){
    var removeUrl = $(this).attr('linkurl');
    // var conf = confirm('Bạn có chắc chắn muốn xoá danh mục này không?');
    // if(conf){
    //  window.location.href = removeUrl;
    // }
    swal({
      title: "Cảnh báo",
      text: "Bạn có chắc chắn muốn xoá sản phẩm này không?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = removeUrl;
      } 
    });
  });
</script>


</body>
</html>
