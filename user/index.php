<?php 
  $sum = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gourmet &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="config/style.css">
  </head>
  <body>
  <?php if (isset($_SESSION['sign_hi'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> Alert!</strong>
      <?php echo $_SESSION['sign_hi']; unset($_SESSION['sign_hi'])?>
    </div>
    <?php endif?>
    <?php if (isset($_SESSION['alert'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> Alert!</strong>
      <?php echo $_SESSION['alert']; unset($_SESSION['alert'])?>
    </div>
    <?php endif?>
    <?php if (isset($_SESSION['Error'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> Alert!</strong>
      <?php echo $_SESSION['Error']; unset($_SESSION['Error'])?>
    </div>
    <?php endif?>
    <?php if (isset($_SESSION['order'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> Order!</strong>
      <?php echo $_SESSION['order']; unset($_SESSION['order'])?>
    </div>

    <?php endif?>
    <?php if (isset($_SESSION['Ok'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> Order!</strong>
      <?php echo $_SESSION['Ok']; unset($_SESSION['Ok'])?>
    </div>
    <?php endif?>
    <?php if (isset($_SESSION['logout'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> True!</strong>
      <?php echo $_SESSION['logout']; unset($_SESSION['logout'])?>
    </div>
    <?php endif?>
    <?php if (isset($_SESSION['success'])): ?> 
    <div class="alert  alert-success">
      <strong style="color:brown"> True!</strong>
      <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
    </div>
    <?php endif?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <a href="product" class="btn btn-danger inline col-md-3 m-2 text-uppercase" >Trang Chủ</a>
                  <a href="signup" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng kí</a>
                  <a href="user_login" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng Nhập</a>
                  <a href="logout" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng xuất</a>
              </ul>
           
          </div>
      </nav>
      <div class="container">
        <div class="row">
        <section class="pt-5 col-md-9">
            <div class="container">
              <h3 class="text-uppercase pb-5 text-success">Danh sách món ăn</h3>
              <div class="row">
               
                    <?php foreach($model as $item) :?>
                        <div class="col-md-6 mb-4 mb-lg-5 col-lg-4 text-center service-block">
                            <span hidden id="img_<?= $item->id?>"><?= "public/".$item->image ?></span><img src="<?= "public/" . $item->image ?>" width="250" height="250">
                            <br />
                            <br />
                            <a href="detail?id=<?= $item->id ?>"><h3 class="m-2 text-primary" id="detail_<?= $item->id ?>"><?= $item->product_name ?></h3></a>
                            <p id="sell_<?= $item->id ?>" class="text-danger"><?= number_format($item->sell_price) ?> đ</p>
                            <button class="btn btn-button btn-success text-center" onclick="addCart(<?= $item->id; ?>)">Đặt ngay</button>
                        </div>
                    <?php endforeach; ?>
              </div>
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
          </section>
    <section class="col-md-3 bg-light cart">
      <h3 class="text-uppercase">Món đã đặt</h3>
      <h4>
      <?php   
              date_default_timezone_set('Asia/Ho_Chi_Minh');
              $a = getdate();
              $mday = $a['mday'];
              $mon = $a['mon'];
              $year = $a['year'];
              $weekday = $a['weekday'];
              $date_create= $weekday.'<br/>Ngày: '.$mday.':'.$mon.':'.$year;
              echo $date_create;
      ?></h4>
      <br/>
      <div id="cart-form">
      </div>
      <?php foreach($order as $item) :?>
        <div class="section1 border text-justify" style="display:flex;border: 1px solid #ccc;">
          <span class="title pt-3 pr-2 pl-2"><?=$item->getUser($item->user_id)->name?></span>
          <p class="text-center pt-3"><?=$item->getProduct($item->product_id)->product_name?></p>
          <img src="./public/<?=$item->getProduct($item->product_id)->image?>" height="80" width="80" class="pt-2 pb-2 pl-2">
          <a href="remove?id=<?= $item->id?>" class="btn btn-danger text-center pt-3 mt-3 ml-2 mr-2" style="height:50px; width:50px;">X</a>
          <p hidden class="text-center pt-3"><?= $sell = $item->getProduct($item->product_id)->sell_price?></p>
          <?php $sum+= $sell; $_SESSION['tong']=$sum ?>
        </div>
        <br />
      <?php endforeach?>
      <a href="removeAll" class="btn btn-primary text-center m-a" style="">DELETE ALL</a>
      <h2 class="text-success">Tổng tiền:</h2>
      <h3 class="text-"><?php if(!isset($_SESSION['tong'])){echo 0;}else{
                        echo number_format($_SESSION['tong']);
                      }
                      ?>  Đ</h3>
    </section>
        </div>
      </div>
    
   
    <section class="footer border bg-light">
        <p class="text-center p-5 text-info">Design by BigCrab</p>
      </section>
    <!-- END footer -->
     <!-- loader -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script>
      // function addCart(id){
      //     var url = `addCart?id=${id}`;
      //     window.location.href = url;
      // }
      function updatecart(key){
          $number = $("#number_"+key).val();
          var url = `update?key=${key}&number=${$number}`;
          window.location.href = url;
      }
      function addCart(id){
        
        // var detail = document.getElementById("detail_"+id).innerHTML;
        // var info = document.getElementById("info_"+id).innerHTML;
        // var image_s = document.getElementById("img_"+id).innerHTML;
        // var div = document.getElementById("cart-form");
        // var html = '';
        // html+= '<div class="section1 border" style="display:flex;border: 1px solid #ccc;">';
        // html+= '<span class="title pt-3 pr-2">'+'hih'+'</span>';
        // html+= ' <p class="text-center pt-3">'+detail+'</p>';
        // html+= '<img src="./'+image_s+'" height="80" width="80" class="pt-2 pb-2 pl-2">';
        // html+= '<a href="remove?id='+id+'" class="btn btn-danger text-center pt-3 mt-3 ml-2 mr-2" style="height:50px; width:50px;">X</a>'
        // html+= '</div>'
        // html+= '</br>'
        // var form = document.getElementById('cart-form');
        // form.innerHTML += html;
        var url = `postPay?id=${id}`;
        window.location.href = url;
      }
    </script>
  </body>
</html>