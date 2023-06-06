<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\slider;
  use App\Models\Category;
  use App\Models\Brand;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list_slider = slider::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $list_sliderAll = slider::where('status','!=', '0')
  ->get();
  $html_category_id_slider="";
  foreach($list_slider as $item){
    $html_category_id_slider = $item->category_id;
  }

  $html_brand_id_slider="";
  foreach($list_slider as $item){
    $html_brand_id_slider = $item->brand_id;
  }


  $list_category = Category::where([['status','!=', '0'],['id','=', $html_category_id_slider]])
  ->get();
  $list_brand = Brand::where([['status','!=', '0'],['id','=', $html_brand_id_slider]])
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
            <h1>Sửa slider</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=slider"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">                      
                <div class="mb-3">
                    <label for="name">Tên slider</label>
                    <?php foreach($list_slider as $item):?>
                      <input type="text" class="form-control" id="name" name="name" placeholder="tên slider" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$item['id'];?>">
                        <?php endforeach;?> 
                    </div>
                    <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <?php foreach($list_slider as $item):?>
                      <input type="text" class="form-control" id="link" name="link" placeholder="#" value="<?=$item['link'];?>" required>
                        <?php endforeach;?>
                    
                    </div>

                    
                    <div class="mb-3">
                    <label for="position">Vị trí</label>
                    <select name="position" id="position" class="form-control">
                    <?php foreach($list_slider as $item):?>
                      <option value="<?=$item['position'];?>"><?=$item['position'];?></option>
                        <?php endforeach;?>
                            
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <?php foreach($list_slider as $item):?>
                            <option value="<?=$item['sort_order'];?>">Hiện tại: <?=$item['name'];?></option>
                        <?php endforeach;?>
                        <?php foreach($list_sliderAll as $item1):?>
                            <option value="<?=$item1['id'];?>"><?=$item1['name'];?></option>
                        <?php endforeach;?>
                    </select>
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Ảnh hiện tại</label>
                    <?php foreach($list_slider as $item):?>
                      <img src="../public/img/slider/<?=$item['img'];?>" alt="<?=$item['name'];?>" class="imageEdit"> 
                        <?php endforeach;?><br> 
                    <label for="img">Chọn hình cần đổi</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_slider as $item):?>
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