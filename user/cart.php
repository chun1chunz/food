
<?php 

$sum = 0;
?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="config/style.css">
<?php if (isset($_SESSION['addCart'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Success!</strong>
  <?php echo $_SESSION['addCart']; unset($_SESSION['addCart'])?>
</div>
<?php endif?>
<?php if (isset($_SESSION['success'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Success!</strong>
  <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
</div>
<?php endif?>
<?php if (isset($_SESSION['update'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Update!</strong>
  <?php echo $_SESSION['update']; unset($_SESSION['update'])?>
</div>
<?php endif?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <a href="product" class="btn btn-danger inline col-md-3 m-2 text-uppercase" >Trang Chủ</a>
          <a href="cart" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Món đã đặt</a>
          <a href="signup" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng kí</a>
          <a href="user_login" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng Nhập</a>
          <a href="logout" class="btn btn-danger inline col-md-3 m-2 text-uppercase">Đăng xuất</a>
      </ul>
   
  </div>
</nav>
<section class="col-md-12">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
              <div class="form-group col-md-12 ">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">STT</th>
                      <th scope="col">Tên Sản Phẩm</th>
                      <th scope="col">Ảnh Sản Phẩm</th>
                      <th scope="col">Số lượnng</th>
                      <th scope="col">Giá Món</th>
                      <th scope="col">Tổng tiền</th>
                      <th scope="col">Xoá || Sửa</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php  $stt=1;  foreach ($_SESSION["cart"] as $key => $value): ?>
                        <tr class="tr">
                          <td><?php echo $stt?></td>
                          <td><a href="detail?id=<?= $key ?>"><?php echo $value['product_name']?></a></td>
                          <td><span><img src="<?="public/" . $value['image'] ?>" style="height:100px; width:100px;"></span>
                          </td>
                          <td><input type="number" name="number" id="number_<?php echo $key?>" class="form-control" value="<?php echo $value['number']?>" width="50px" height="50" min="0"></td>
                          <td><?php echo number_format($value['sell_price'])?> đ</td>
                          <td><?php echo number_format($value['sell_price']*$value['number'])?> đ</td>
                          <td>
                            <a href="remove?key=<?php echo $key?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Remove</a>
                            
                            <button class="btn btn-button btn-info" onclick="updatecart(<?= $key ?>)">Update</button>
                          </td>
                        </tr>
                        <?php $sum+= $value['sell_price']*$value['number']; $_SESSION['tong']=$sum ?>
                    <?php $stt++; endforeach ?>
                  </tbody>
                </table>
                <div class="form-group col-md-12 text-center">
                  <ul class="list-group">
                    <li class="list-group-item">
                      <h3>Thông tin đơn hàng: </h3>
                      <h4>Tên người đặt: <?php echo $_SESSION['login']["name"]?></h4>
                      <h4>Email: <?php echo $_SESSION['login']["email"]?></h4>
                      <span class="badge"> </span>
                      <h4>Tổng tiền thanh toán : <?php 
                      echo number_format($_SESSION['tong']); ?> đ</h4>   
                      <a href="postPay?key=<?= $key ?>" class="btn btn-danger">Đặt món</a> 
                    </li> 
                  </ul>
                </div>
              </div>
        </div>
      </div>
    </div>
</section>
<section class="footer border bg-light">
    <p class="text-center p-5 text-info">Design by BigCrab</p>
  </section>
