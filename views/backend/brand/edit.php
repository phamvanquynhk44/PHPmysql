<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Brand;
  $id=$_REQUEST['id'];
  $list_Brand = Brand::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $list_BrandAll = Brand::where('status','!=', '0')
  ->get();
 /*  $list_Brand = Brand::all; */
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa thương hiệu</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=Brand"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=Brand&cat=process" method="post" enctype="multipart/form-data">                      
                    <div class="mb-3">
                    <label for="name">Tên thương hiệu</label>
                    <?php foreach($list_Brand as $item):?>
                      <input type="text" class="form-control" id="name" name="name" placeholder="tên thương hiệu" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="tên thương hiệu" value="<?=$item['id'];?>">
                        <?php endforeach;?>                    
                    </div>

                    <div class="mb-3">
                    <label for="metakey">Từ khoá</label>
                    <?php foreach($list_Brand as $item):?>
                      <textarea name="metakey" id="metakey" class="form-control" cols="30" rows="10" required><?=$item['metakey'];?></textarea>
                        <?php endforeach;?>                
                    </div>

                    <div class="mb-3">
                    <label for="metadesc">Mô tả</label>
                    <?php foreach($list_Brand as $item):?>
                      <textarea name="metadesc" id="metadesc" class="form-control" cols="30" rows="10" required><?=$item['metadesc'];?></textarea>
                        <?php endforeach;?>                   
                    </div>

                    <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">                       
                        <?php foreach($list_Brand as $item):?>
                            <option value="<?=$item['sort_order'];?>">Hiện tại: <?=$item['name'];?></option>
                        <?php endforeach;?>
                        <option value="0">Đổi: danh mục cha</option>
                        <?php foreach($list_BrandAll as $item1):?>
                          <option value="<?=$item['sort_order'];?>">Đổi: <?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                    </div>

                    
                    <div class="mb-3">
                    <label for="img">Ảnh hiện tại</label>
                    <?php foreach($list_Brand as $item):?>
                      <img src="../public/img/Brand/<?=$item['img'];?>" alt="anh" class="imageEdit"> 
                        <?php endforeach;?><br>                   
                    <label for="img">Ảnh cần đổi</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_Brand as $item):?>
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