<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Menu;
  $id=$_REQUEST['id'];
  $list_Menu = Menu::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $list_MenuAll = Menu::where('status','!=', '0')
  ->get();
 /*  $list_Menu = Menu::all; */
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa Menu</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=Menu"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=Menu&cat=process" method="post" enctype="multipart/form-data"> 
                <?php foreach($list_Menu as $item):?>
                      <?php if($item->type!="custom"):?>

                       
                        <div class="mb-1-">
                        <label for="name">Tên menu</label>
                      <input type="hidden" class="form-control" id="name" name="name" placeholder="tên danh mục" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="tên danh mục" value="<?=$item['id'];?>">
                        <p><?=$item['name'];?></p>
                        </div>

                        <div class="mb-6">
                        <label for="link">Liên kết</label>
                        <p><?=$item['link'];?></p>
                        <input type="hidden" class="form-control" id="link" name="link" value="<?=$item['link'];?>" placeholder="link" required>
                        </div>
                                          
                        <?php else:?>


                          <div class="mb-3">
                    <label for="name">Tên menu</label>
                    <?php foreach($list_Menu as $item):?>
                      <input type="text" class="form-control" id="name" name="name" placeholder="tên danh mục" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="tên danh mục" value="<?=$item['id'];?>">
                        <?php endforeach;?>                    
                    </div>

                    <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <?php foreach($list_Menu as $item):?>
                      <input type="text" class="form-control" id="link" name="link" value="<?=$item['link'];?>" placeholder="link" required>
                        <?php endforeach;?>                   
                    </div>   

                          <?php endif;?>                                                                                          
                <?php endforeach;?> 

                    <div class="mb-3">
                    <label for="position">Vị trí</label>                 
                    <select name="position" id="position" class="form-control">
                    <?php foreach($list_Menu as $item):?>
                      <option value="<?=$item['position'];?>">-- Hiện tại: <?=$item['position'];?> --</option>
                    <?php endforeach;?>                    
                      <option value="mainmenu">Đổi: Main menu</option>
                      <option value="footermenu">Đổi: Footermenu</option>                    
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_Menu as $item):?>
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