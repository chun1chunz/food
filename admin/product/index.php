
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



<!--------------------------------------------------------------------------------------------------------------------->


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-body">
                <table class="table table-bordered border-secondary col-md-12">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Mô tả ngắn</th>
                        <th>Description</th>
                        <th>Sell_price</th>
                        <th>List_price</th>
                        <th>
                            <a class="btn btn-xs btn-success" href="<?= $baseUrl . "adminlte/product-add" ?>">
                                Thêm mới
                            </a>
                        </th>
                    </tr>
                    <?php $stt = 0; foreach($model as $item) :?>
                        <tr>
                            <td><?= $item->id?></td>
                            <td><?= $item->product_name ?></td>
                            <td>
                                <img src="<?= $baseUrl . "public/" . $item->image ?>" width="180" height="180">
                            </td>
                            <td><?= $item->info_1 ?></td>
                            <td><textarea rows="9" cols="50"><?= $item->detail ?></textarea></td>
                            <td><?= $item->sell_price ?></td>
                            <td><?= $item->list_price ?></td>
                            <td>
                                <span class="">
                                    <a class="btn btn-xs btn-info" href="<?= $baseUrl . "adminlte/product-edit?id=" . $item->id?>">Sửa</a>
                                </span>

                                <span>
                                    <a class="btn btn-xs btn-danger btn-remove" href="javascript:;"
                          linkurl="<?= $baseUrl . "adminlte/product-remove?id=" . $item->id?>">Xóa</a>                        
                                </span>
                            </td>

                        </tr>
                    <?php $stt++; endforeach; ?>
                    
                </table> 
                <div class="box-footer clearfix">
                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                      <?php 
                      // PHẦN HIỂN THỊ PHÂN TRANG
                      // BƯỚC 7: HIỂN THỊ PHÂN TRANG
            
                      // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                      if ($current_page > 1 && $total_page > 1){
                          echo '<li class="page-item"><a class="page-link" href="product?page='.($current_page-1).'">Previous</a></li>';
                      }
            
                      // Lặp khoảng giữa
                      for ($i = 1; $i <= $total_page; $i++){
                          // Nếu là trang hiện tại thì hiển thị thẻ span
                          // ngược lại hiển thị thẻ a
                          if ($i == $current_page){
                              echo '<li class="page-item"><a class="page-link" href="product?page='.$i.'">'.$i.'</a></li>';
                          }
                          else{
                              echo '<li class="page-item"><a class="page-link" href="product?page='.$i.'">'.$i.'</a></li>';
                          }
                      }
            
                      // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                      if ($current_page < $total_page && $total_page > 1){
                          echo '<li class="page-item"><a class="page-link" href="product?page='.($current_page+1).'">Next</a></li>';
                      }
                      ?>
                    </ul>
                  </nav>
               </div>
              </div>               
              </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
</section>

    <!-- /.content -->
<!--------------------------------------------------------------------------------------------------------------------->


  </div>
  <!-- /.content-wrapper -->
<!------------------------------------------------------------------------------------------------------------------------------------>

<!----------------------------------               ----------------------------------->

</div>
<!-- ./wrapper -->


<!----------------------------------               ----------------------------------->

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
