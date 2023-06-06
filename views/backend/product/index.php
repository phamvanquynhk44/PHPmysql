
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Product;
  use App\Models\Category;
  use App\Models\Brand;
  $list_product = Product::where('status','!=', '0')
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
            <h1>Quản lý sản phẩm</h1>
          </div>
        </div>
        <div class="buttonC">

            <a href="index.php?option=product&cat=create"><button class="btn info">Thêm</button></a>
            <a href="index.php?option=product&cat=trash"><button class="btn danger">Thùng rác</button></a>       
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
    <th>Tên Sản phẩm</th>
    <th>Danh mục</th>
    <th>Nhãn hiệu</th>
    <th>Ngày tạo</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_product as $item):?>
    <tr>
    <td class="img"><img src="../public/img/product/<?=$item['img'];?>" alt="anh"></td>
    <td><?=$item['name'];?></td>

    <td>
    <?php foreach($list_category as $item1):?>
      <?php if($item1->id==$item->category_id):?>
        <?=$item1['name'];?>
          <?php endif;?>
    <?php endforeach;?>
  </td> 
   
  <td>
    <?php foreach($list_brand as $item2):?>
      <?php if($item2->id==$item->brand_id):?>
        <?=$item2['name'];?>
          <?php endif;?>
    <?php endforeach;?>
  </td>

    <td><?=$item['created_at'];?></td>
    <td class="function">  
      <?php if($item->status==1):?>
        <a href="index.php?option=product&cat=status&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-toggle-on"></i></button></a>
        <?php else:?>
          <a href="index.php?option=product&cat=status&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-toggle-on"></i></button></a>
          <?php endif;?>
        <a href="index.php?option=product&cat=edit&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-edit"></i></button></a>
        <a href="index.php?option=product&cat=show&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-eye"></i></button></a> 
        <a href="index.php?option=product&cat=delete&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
