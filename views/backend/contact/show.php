
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\contact;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  $row=contact::where([['id','=',$id],['status','!=',0]])->first();
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=contact");
  }
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=contact");
  }
  $list_contact = contact::where([['id','=',$id],['status','!=',0]])
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
            <h1>XEM CHI TIẾT LIÊN LẠC</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=contact"><button class="btn info">Quay về</button></a>       
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <table id="customers">
      <tr>
        <th>Tên trường</th>
        <th>Giá trị</th>
    <?php foreach($list_contact as $item):?>
      </tr>
        <td>Id</td>
        <td><?=$item['id'];?></td>
      </tr>
      </tr>
        <td>Họ tên</td>
        <td><?=$item['name'];?></td>
      </tr>
      </tr>
        <td>Email</td>
        <td><?=$item['email'];?></td>
      </tr>
      </tr>
        <td>Điện thoại</td>
        <td><?=$item['phone'];?></td>
      </tr>
      </tr>
        <td>Tiêu đề</td>
        <td><?=$item['title'];?></td>
      </tr>
      </tr>
        <td>Nội dung câu hỏi</td>
        <td><?=$item['content'];?></td>
      </tr>
      </tr>
        <td>Nội dung trả lời</td>
        <td><?=$item['reply'];?></td>
      </tr>
      </tr>
        <td>Ngày tạo</td>
        <td><?=$item['created_at'];?></td>
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
