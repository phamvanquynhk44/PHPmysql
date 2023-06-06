<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\user;
  use App\Models\Category;
  use App\Models\Brand;
  $list_user = user::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
  $list_Category = Category::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
  $list_Brand = Brand::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM KHÁCH HÀNG</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=user"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=client&cat=process" method="post" enctype="multipart/form-data">                      
                    <div class="mb-3">
                    <label for="username">Tên Đăng nhập</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="tên đăng nhập" required>
                    </div>

                    <div class="mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                    </div>

                    
                    <div class="mb-3">
                    <label for="confirm_password">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
                    <?php require_once('../views/backend/message.php');?>
                    </div>

                    <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>

                    <div class="mb-3">
                    <label for="phone">Điện thoại</label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Điện thoại" required>
                    </div>

                    <div class="mb-3">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Họ tên" required>
                    </div>

                    
                    <div class="mb-3">
                    <label>Giới tính</label>
                    <br>
                    <input type="radio" id="nam" name="gender" value="1">
                    <label for="nam">Nam</label>
                    <br>
                    <input type="radio" id="nu" name="gender" value="2">
                    <label for="nu">Nữ</label>
                    </div>

                    <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" required>
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Hình đại diện</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Xuất bản</option>
                        <option value="2">Không xuất bản</option>
                    </select>
                    </div>   

                    <div class="mb-3">                   
                    <button class="btn info" name="THEM">Lưu[thêm]</button>
                    </div> 
                </form>                
    </section>
  </div>
<?php require_once('../views/backend/footer.php'); ?>