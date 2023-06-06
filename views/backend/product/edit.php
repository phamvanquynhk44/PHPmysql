<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Product;
  use App\Models\Category;
  use App\Models\Brand;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list_product = Product::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $html_category_id_product="";
  foreach($list_product as $item){
    $html_category_id_product = $item->category_id;
  }

  $html_brand_id_product="";
  foreach($list_product as $item){
    $html_brand_id_product = $item->brand_id;
  }


  $list_category = Category::where([['status','!=', '0'],['id','=', $html_category_id_product]])
  ->get();
  $list_brand = Brand::where([['status','!=', '0'],['id','=', $html_brand_id_product]])
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
            <h1>Sửa sản phẩm</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=product"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">                      
                <div class="mb-3">
                    <label for="name">Tên Sản phẩm</label>
                    <?php foreach($list_product as $item):?>
                      <input type="text" class="form-control" id="name" name="name" placeholder="tên sản phẩm" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="tên sản phẩm" value="<?=$item['id'];?>">
                        <?php endforeach;?> 
                    </div>

                    <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <?php foreach($list_product as $item):?>
                      <textarea name="detail" required><?=$item['detail'];?></textarea>
                        <?php endforeach;?>                  
                            <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace("detail");
                                </script>
                    </div>

                    <div class="mb-3">
                    <label for="metakey">Từ khoá</label>
                    <?php foreach($list_product as $item):?>
                      <textarea name="metakey" id="metakey" class="form-control" cols="30" rows="10" required><?=$item['metakey'];?></textarea>
                        <?php endforeach;?>                
                    </div>

                    <div class="mb-3">
                    <label for="metadesc">Mô tả</label>
                    <?php foreach($list_product as $item):?>
                      <textarea name="metadesc" id="metadesc" class="form-control" cols="30" rows="10" required><?=$item['metadesc'];?></textarea>
                        <?php endforeach;?>                   
                    </div>
            

                    <div class="mb-3">
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <?= $html_category_id ?>
                        <?= $html_category_all ?>
                    </select>
                    </div>

                    
                    <div class="mb-3">
                    <label for="brand_id">Nhãn hiệu</label>
                    <select name="brand_id" id="brand_id" class="form-control">                     
                        <?= $html_brand_id ?>
                        <?= $html_brand_all ?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="price">Giá Sản phẩm</label>
                    <?php foreach($list_product as $item):?>
                      <input type="number" class="form-control" id="price" name="price" value="<?=$item['price'];?>" required>
                        <?php endforeach;?>
                    </div>

                    <div class="mb-3">
                    <label for="price_sale">Giá khuyến mãi</label>
                    <?php foreach($list_product as $item):?>
                      <input type="number" class="form-control" id="price_sale" name="price_sale" value="<?=$item['price_sale'];?>" required>
                        <?php endforeach;?>
                    
                    </div>

                    <div class="mb-3">
                    <label for="qty">Số lượng</label>
                    <?php foreach($list_product as $item):?>
                      <input type="number" class="form-control" id="qty" name="qty" value="<?=$item['qty'];?>" required>
                        <?php endforeach;?>
                    
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Ảnh hiện tại</label>
                    <?php foreach($list_product as $item):?>
                      <img src="../public/img/product/<?=$item['img'];?>" alt="<?=$item['name'];?>" class="imageEdit"> 
                        <?php endforeach;?><br> 
                    <label for="img">Chọn hình cần đổi</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_product as $item):?>
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