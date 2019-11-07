
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="config/style.css">
<div class="col-md-9 bor">
        <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                  <!----------------------------------------                                     -------------------------------------------->   
                          <form class="form-horizontal" name="myForm" id="signupForm" action="<?="postSignup"?>" method="post">
                              <div class="form-group">
                                  <label class="col-md-3 control-lable">Tên dùng</label>
                                  <div class="col-md-9">
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                          <?php if(isset($_GET['nameerr'])):?>
                                              <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                                          <?php endif?>
          
                                  </div>
                              </div>
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
                                  <label class="col-md-3 control-lable" for="password">Mậ khẩu</label>
                                  <div class="col-md-9">
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                          <?php if(isset($_GET['passworderr'])):?>
                                              <span class="text-danger err"><?= $_GET['passworderr'] ?></span>
                                          <?php endif?>
          
                                  </div>
                              </div>
          
                              <div class="form-group">
                                  <label class="col-md-3 control-lable" for="confirm_password">Nhập lại mật khẩu</label>
                                  <div class="col-md-9">
                                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
                                          <?php if(isset($_GET['cpassworderr'])):?>
                                              <span class="text-danger err"><?= $_GET['cpassworderr'] ?></span>
                                          <?php endif?>
          
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-9 col-sm-offset-4">
                                      <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Đăng kí</button>
                                      <a href="product" class="btn btn-danger">Trang chủ</a>
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
</div>

