<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\user;
  use App\Models\Category;
  use App\Models\Brand;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list_user = user::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $html_category_id_user="";
  foreach($list_user as $item){
    $html_category_id_user = $item->category_id;
  }

  $html_brand_id_user="";
  foreach($list_user as $item){
    $html_brand_id_user = $item->brand_id;
  }


  $list_category = Category::where([['status','!=', '0'],['id','=', $html_category_id_user]])
  ->get();
  $list_brand = Brand::where([['status','!=', '0'],['id','=', $html_brand_id_user]])
  ->get();
  //category
  $html_category_id="";
  foreach($list_category as $item){
    if($item->id !=$id){
      $html_category_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }else{
      $html_category_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }
  }
  $list_categoryAll = Category::where('status','!=', '0')
  ->get();
  $html_category_all="";
  foreach($list_categoryAll as $item){
      $html_category_id .="<option value='" . $item->id ."'>Đổi: " . $item['name'] . "</option>";
  }
  //brand
  $html_brand_id="";
  foreach($list_brand as $item){
    if($item->id !=$id){
      $html_brand_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }else{
      $html_brand_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }
  }
  $list_brandAll = Brand::where('status','!=', '0')
  ->get();
  $html_brand_all="";
  foreach($list_brandAll as $item){
      $html_brand_id .="<option value='" . $item->id ."'>Đổi: " . $item['name'] . "</option>";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SỬA TẤT CẢ THÀNH VIÊN</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=user"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">                      
                <div class="mb-3">
                <div class="mb-3">
                    <label for="username">Tên Đăng nhập</label>
                    <?php foreach($list_user as $item):?>
                      <input type="text" class="form-control" id="username" name="username" value="<?=$item['username'];?>" placeholder="tên đăng nhập"  required>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$item['id'];?>">
                        <?php endforeach;?>                   
                    </div>

                    <div class="mb-3">
                    <label for="password">Mật khẩu</label>
                    <?php foreach($list_user as $item):?>
                      <select name="password" id="password" class="form-control">
                        <option value="<?=$item['password'];?>">-- Hiện tại (Đã mã hoá): <?=$item['password'];?> --</option>
                        <option value="1">Đổi mật khẩu về 1</option>
                        <?php endforeach;?>
                      </select>
                    </div>

                    <div class="mb-3">
                    <label for="email">Email</label>
                    <?php foreach($list_user as $item):?>
                      <input type="email" class="form-control" id="email" name="email" value="<?=$item['email'];?>" placeholder="Email" required>
                        <?php endforeach;?>
                    
                    </div>

                    <div class="mb-3">
                    <label for="phone">Điện thoại</label>
                    <?php foreach($list_user as $item):?>
                      <input type="phone" class="form-control" id="phone" name="phone" value="<?=$item['phone'];?>" placeholder="Điện thoại" required>
                        <?php endforeach;?>
                    
                    </div>

                    <div class="mb-3">
                    <label for="name">Họ tên</label>
                    <?php foreach($list_user as $item):?>
                      <input type="text" class="form-control" id="name" name="name" value="<?=$item['name'];?>"  placeholder="Họ tên" required>
                        <?php endforeach;?>
                    
                    </div>

                    
                    <div class="mb-3">
                    <?php foreach($list_user as $item):?>
                      <label>Giới tính Hiện tại: <?=$item['gender'];?></label>
                        <?php endforeach;?>
                    <br>
                    <label>Giới tính cần đổi</label>
                    <br>
                    <input type="radio" id="nam" name="gender" value="1">
                    <label for="nam">Nam</label>
                    <br>
                    <input type="radio" id="nu" name="gender" value="2">
                    <label for="nu">Nữ</label>
                    </div>

                    <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <?php foreach($list_user as $item):?>
                      <input type="text" class="form-control" id="address" name="address" value="<?=$item['address'];?>" placeholder="Địa chỉ" required>
                        <?php endforeach;?>
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Ảnh hiện tại</label>
                    <?php foreach($list_user as $item):?>
                      <img src="../public/img/user/<?=$item['img'];?>" alt="<?=$item['name'];?>" class="imageEdit"> 
                        <?php endforeach;?><br> 
                    <label for="img">Chọn hình cần đổi</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_user as $item):?>
                      <?php if($item->status==1):?>
                        <option value="1">Hiện tại: Xuất bản</option>                       
                        <?php else:?>
                          <option value="2">Hiện tại: Không xuất bản</option>                           
                          <?php endif;?>                                                                                          
                        <?php endforeach;?>
                        <option value="1">Đổi: Xuất bản</option>
                        <option value="2">Đổi: Không xuất bản</option>
                    </select>
                    </div>   

                    <div class="mb-3">                   
                    <button class="btn info" name="CAPNHAT">Lưu[cập nhật]</button>
                    </div> 
                </form>                
    </section>
  </div>
<?php require_once('../views/backend/footer.php'); ?>