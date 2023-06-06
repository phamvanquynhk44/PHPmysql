
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\contact;
  $list_contact = contact::where('status','=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
 /*  $list_contact = contact::all; */
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÙNG RÁC SẢN PHẨM</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=contact"><button class="btn info">Quay về</button></a>    
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
    <th>Họ và tên</th>
    <th>Email</th>
    <th>Điện thoại</th>
    <th>Ngày tạo</th>
    <th>Trạng thái</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_contact as $item):?>
    <tr>
    <td><?=$item['name'];?></td>
    <td><?=$item['email'];?></td>
    <td><?=$item['phone'];?></td>
    <td><?=$item['created_at'];?></td>
    <td>
    <?php if($item->status==1):?>
        Liên hệ mới
          <?php endif;?>
          <?php if($item->status==2):?>
        Đã trả lời
          <?php endif;?>
  </td>
    <td class="functiontrash">  
        <a href="index.php?option=contact&cat=restore&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-undo"></i></button></a> 
        <a href="index.php?option=contact&cat=destroy&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
