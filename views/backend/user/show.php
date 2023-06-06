
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\user;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  $row=user::where([['id','=',$id],['status','!=',0]])->first();
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=user");
  }
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=user");
  }
  $list_user = user::where([['id','=',$id],['status','!=',0]])
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
            <h1>XEM CHI TIẾT TẤT CẢ THÀNH VIÊN</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=user"><button class="btn info">Quay về</button></a>       
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <table id="customers">
      <tr>
        <th>Tên trường</th>
        <th>Giá trị</th>
    <?php foreach($list_user as $item):?>
      </tr>
        <td>Id</td>
        <td><?=$item['id'];?></td>
      </tr>
      </tr>
        <td>Họ tên</td>
        <td><?=$item['name'];?></td>
      </tr>
      </tr>
        <td>Tên đăng nhập</td>
        <td><?=$item['username'];?></td>
      </tr>
      </tr>
        <td>Mật khẩu</td>
        <td><?=$item['password'];?></td>
      </tr>
      </tr>
        <td>Email</td>
        <td><?=$item['email'];?></td>
      </tr>
      </tr>
        <td>Giới tính</td>
        <td><?=$item['gender'];?></td>
      </tr>
      </tr>
        <td>Điện thoại</td>
        <td><?=$item['phone'];?></td>
      </tr>
      </tr>
        <td>Hình ảnh</td>
        <td><img src="../public/img/user/<?=$item['img'];?>" alt="<?=$item['name'];?>" style="width: 100px;"></td>
      </tr>
      </tr>
        <td>Quyền</td>
        <td><?=$item['roles'];?></td>
      </tr>
      </tr>
        <td>Địa chỉ</td>
        <td><?=$item['address'];?></td>
      </tr>
      </tr>
        <td>Ngày tạo</td>
        <td><?=$item['created_at'];?></td>
      </tr>
      </tr>
        <td>Người tạo</td>
        <td><?=$item['created_by'];?></td>
      </tr>
      </tr>
        <td>Ngày cập nhật</td>
        <td><?=$item['updated_at'];?></td>
      </tr>
      </tr>
        <td>Người cập nhật</td>
        <td><?=$item['updated_by'];?></td>
      </tr>
      </tr>
        <td>Trang thái (status)</td>
        <td><?=$item['status'];?></td>
      </tr>
    <?php endforeach;?>
    </table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
