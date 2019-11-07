<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="config/style.css">
<?php if (isset($_SESSION['login_erorr'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Erorr!</strong>
  <?php echo $_SESSION['login_erorr']; unset($_SESSION['login_erorr'])?>
</div>
<?php endif?>
<?php if (isset($_SESSION['postLogin_email'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Erorr!</strong>
  <?php echo $_SESSION['postLogin_email']; unset($_SESSION['postLogin_email'])?>
</div>
<?php endif?>
<?php if (isset($_SESSION['postLogin_erorr'])): ?> 
<div class="alert  alert-success">
  <strong style="color:brown"> Erorr!</strong>
  <?php echo $_SESSION['postLogin_erorr']; unset($_SESSION['postLogin_erorr'])?>
</div>
<?php endif?>

<div class="col-md-9 bor">
        <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                  <!----------------------------------------                                     -------------------------------------------->   
                          <form class="form-horizontal" name="myForm" id="loginForm" action="<?="postLogin"?>" method="post">
                              <div class="form-group">
                                  <label class="col-md-3 control-lable" for="email">Email</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                                          <?php if(isset($_GET['emailerr'])):?>
                                              <span class="text-danger err"><?= $_GET['emailerr'] ?></span>
                                          <?php endif?>
          
                                  </div>
                              </div>
          
                              <div class="form-group">
                                  <label class="col-md-3 control-lable" for="password">Mật khẩu</label>
                                  <div class="col-md-9">
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                          <?php if(isset($_GET['passworderr'])):?>
                                              <span class="text-danger err"><?= $_GET['passworderr'] ?></span>
                                          <?php endif?>
          
                                  </div>
                                  <div class="remember pl-3">
                                    <input type="checkbox"  name="remember" value="1">
                                    <label>Lưu đăng nhập</label>
                                  </div>
                                </div>
                                
                              <div class="form-group">
                                  <div class="col-sm-9 col-sm-offset-4">
                                      <button type="submit" class="btn btn-primary submit_login" name="submit" value="Login">Đăng Nhập</button>
                                  </div>
                              </div>
                          </form>
                  <!----------------------------------------                                     -------------------------------------------->                 
                        </div>
                        <!-- /.box-body -->
                    </div>
                  </div>
                </div>
                <h2>Nếu chưa có tải khoản hãy đăng kí!!! </h2>
                <a href="signup" class="btn btn-success">Đăng kí</a>
                <a href="product" class="btn btn-danger">Trang chủ</a>
        </section>
</div>
