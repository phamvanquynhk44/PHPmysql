
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\order;
  use App\Models\orderdetail;
  use App\Models\Product;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  $row=order::where([['id','=',$id],['status','!=',0]])->first();

  $list_orderdetail=orderdetail::where('order_id','=',$id)->get();

  $list_product=Product::where('status','!=',0)->get();

  
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=order");
  }
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=order");
  }
  $list_order = order::where([['id','=',$id],['status','!=',0]])
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
            <h1>XEM CHI TIẾT ĐƠN HÀNG</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">  
    <table id="customers">
    <h5>THÔNG TIN KHÁCH HÀNG</h5>
      <tr>
        <th>Tên trường</th>
        <th>Giá trị</th>
    <?php foreach($list_order as $item):?>
      </tr>
        <td>Tên khách hàng</td>
        <td><?=$item['deliveryname'];?></td>
      </tr>
      </tr>
        <td>Email</td>
        <td><?=$item['deliveryemail'];?></td>
      </tr>
      </tr>
        <td>Điện thoại</td>
        <td><?=$item['deliveryphone'];?></td>
      </tr>
      </tr>
        <td>Địa chỉ</td>
        <td><?=$item['deliveryaddress'];?></td>
      </tr>
    <?php endforeach;?>
    </table>
    <br>
    <br>

    <div class="buttonC">
    <a href="index.php?option=order"><button class="btn info">Quay về</button></a>
    <a href="index.php?option=order&cat=confirm&id=<?=$id;?>"><button class="btn info">Xác nhận</button></a>
    <a href="index.php?option=order&cat=pack&id=<?=$id;?>"><button class="btn info">Đóng gói</button></a>
    <a href="index.php?option=order&cat=transport&id=<?=$id;?>"><button class="btn warning">Vận chuyển</button></a>
    <a href="index.php?option=order&cat=delivered&id=<?=$id;?>"><button class="btn success">Đã giao</button></a>
    <a href="index.php?option=order&cat=cancel&id=<?=$id;?>"><button class="btn danger">Huỷ</button></a>       
          </div>
    <table id="customers">
    <h5>CHI TIẾT ĐƠN HÀNG</h5>
  <tr>
    <th>Hình</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Id</th>
  </tr>
  <?php $total_money=0 ?>
  <?php foreach($list_orderdetail as $item):?>
    <tr>
    <td class="img">
    <?php foreach($list_product as $item2):?>
      <?php if($item2->id==$item->product_id):?>
        <img src="../public/img/product/<?=$item2['img'];?>" alt="anh">
          <?php endif;?>
    <?php endforeach;?>
    </td>
    <td>
    <?php foreach($list_product as $item1):?>
      <?php if($item1->id==$item->product_id):?>
        <?=$item1['name'];?>
          <?php endif;?>
    <?php endforeach;?>
    </td>
    <td><?=number_format($item['price']);?></td>
    <td><?=$item['qty'];?></td>
    <td><?=number_format($item['price']*$item['qty']);?></td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php $total_money+=$item['price']*$item['qty'] ?>
  <?php endforeach;?>
  <td colspan="6"><h2 style="color: crimson;">Tổng Tiền: <?=number_format($total_money) . " VNĐ"?></h2></td>

  
</table>
    </section>
  </div>

<?php require_once('../views/backend/footer.php');
