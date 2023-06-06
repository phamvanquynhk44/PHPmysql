
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\order;
  use App\Models\Category;
  use App\Models\Brand;
  $list_order = order::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();

  $list_category = Category::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();

  $list_brand = Brand::where('status','!=', '0')
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
            <h1>Quản lý đơn hàng</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=order&cat=trash"><button class="btn danger">Thùng rác</button></a>       
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
    <th>Khách hàng</th>
    <th>Email</th>
    <th>Điện thoại</th>
    <th>Ngày tạo</th>
    <th>Trạng thái</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_order as $item):?>
    <tr>
    <td><?=$item['deliveryname'];?></td>
    <td><?=$item['deliveryemail'];?></td>
    <td><?=$item['deliveryphone'];?></td>
    <td><?=$item['created_at'];?></td>
    <td>
    <?php if($item->status==1):?>
        Đơn hàng mới
          <?php endif;?>
          <?php if($item->status==2):?>
        Đóng gói
          <?php endif;?>
          <?php if($item->status==3):?>
        Vận chuyển
          <?php endif;?>
          <?php if($item->status==4):?>
        Đã giao
          <?php endif;?>
          <?php if($item->status==5):?>
        Đã huỷ
          <?php endif;?>
  </td>
    <td class="function">  
        <a href="index.php?option=order&cat=show&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-eye"></i></button></a> 
        <a href="index.php?option=order&cat=delete&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
