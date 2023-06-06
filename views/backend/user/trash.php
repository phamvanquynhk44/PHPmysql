
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\user;
  $list_user = user::where([['status','=', '0'],['roles','!=', '0']])
  ->orderBy('created_at', 'desc')
  ->get();
 /*  $list_user = user::all; */
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÙNG RÁC TẤT CẢ THÀNH VIÊN</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=user"><button class="btn info">Quay về</button></a>    
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <br>
      <br>
      <?php require_once('../views/backend/message.php');?>
    <table id="customers">
    <tr>
    <th>Hình</th>
    <th>Tên khách hàng</th>
    <th>Email</th>
    <th>Điện thoại</th>
    <th>Ngày tạo</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_user as $item):?>
    <tr>
    <td class="img"><img src="../public/img/user/<?=$item['img'];?>" alt="anh"></td>
    <td><?=$item['name'];?></td>
    <td><?=$item['email'];?></td>
    <td><?=$item['phone'];?></td>

    <td><?=$item['created_at'];?></td>
    <td class="functiontrash">  
        <a href="index.php?option=user&cat=restore&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-undo"></i></button></a> 
        <a href="index.php?option=user&cat=destroy&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
