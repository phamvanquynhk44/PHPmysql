
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Product;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  $row=Product::where([['id','=',$id],['status','!=',0]])->first();
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=product");
  }
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=product");
  }
  $list_product = Product::where([['id','=',$id],['status','!=',0]])
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
            <h1>XEM CHI TIẾT SẢN PHẨM</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=product"><button class="btn info">Quay về</button></a>       
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <table id="customers">
      <tr>
        <th>Tên trường</th>
        <th>Giá trị</th>
    <?php foreach($list_product as $item):?>
      </tr>
        <td>Id</td>
        <td><?=$item['id'];?></td>
      </tr>
      </tr>
        <td>Mã danh mục</td>
        <td><?=$item['category_id'];?></td>
      </tr>
      </tr>
        <td>Mã thương hiệu</td>
        <td><?=$item['brand_id'];?></td>
      </tr>
      </tr>
        <td>Tên sản phẩm</td>
        <td><?=$item['name'];?></td>
      </tr>
      </tr>
        <td>Slug</td>
        <td><?=$item['slug'];?></td>
      </tr>
      </tr>
        <td>Hình ảnh</td>
        <td><img src="../public/img/product/<?=$item['img'];?>" alt="<?=$item['name'];?>" style="width: 100px;"></td>
      </tr>
      </tr>
        <td>Chi tiết</td>
        <td><?=$item['detail'];?></td>
      </tr>
      </tr>
        <td>Số lượng</td>
        <td><?=$item['detail'];?></td>
      </tr>
      </tr>
        <td>Giá</td>
        <td><?=$item['detail'];?></td>
      </tr>
      </tr>
        <td>Giá khuyến mãi</td>
        <td><?=$item['price_sale'];?></td>
      </tr>
      </tr>
        <td>Từ khoá</td>
        <td><?=$item['metakey'];?></td>
      </tr>
      </tr>
        <td>Mô tả</td>
        <td><?=$item['metadesc'];?></td>
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
