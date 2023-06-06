<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\slider;
  use App\Models\Category;
  use App\Models\Brand;
  $list_slider = slider::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
  $list_Category = Category::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
  $list_Brand = Brand::where('status','!=', '0')
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
            <h1>THÊM SLIDER</h1>
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="tên slider" required>
                    </div>

                    <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="#" required>
                    </div>

                    
                    <div class="mb-3">
                    <label for="position">Vị trí</label>
                    <select name="position" id="position" class="form-control">
                            <option value="Slidershow">Slidershow</option>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option>---Chọn vị trí---</option>
                        <?php foreach($list_slider as $item):?>
                            <option value="<?=$item['sort_order'];?>">Sau: <?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Hình đại diện</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Xuất bản</option>
                        <option value="2">Không xuất bản</option>
                    </select>
                    </div>   

                    <div class="mb-3">                   
                    <button class="btn info" name="THEM">Lưu[thêm]</button>
                    </div> 
                </form>                
    </section>
  </div>
<?php require_once('../views/backend/footer.php'); ?>