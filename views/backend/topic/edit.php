<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Topic;
  use App\Models\Category;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list = Topic::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $list_category = Category::where('status','!=', '0')
  ->get();
  $topic=Topic::find($id);
  if($topic==null){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=Topic");
  }
  $html_parent_id="";
  $html_sort_order="";
  $html_status="";
  $html_Category="";
  foreach($list as $item){
    if($item->id !=$id){
      $html_parent_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }else{
      $html_parent_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }
    if($topic->order - 1 ==$item->order){
      $html_sort_order .="<option value='" . $item->order ."'>Sau: " . $item['name'] . "</option>";
    }else{
      $html_sort_order .="<option value='" . $item->order ."'>Sau: " . $item['name'] . "</option>";
    }  
  }
  foreach($list as $item){
    if($item->status==1){
      $html_status .= "<option value='" . 1 ."'>Hiện tại: " . 'Xuất bản' . "</option>";
    }                    
     else{
      $html_status .= "<option value='" . 2 ."'>Hiện tại: " . 'Không xuất bản' . "</option>";
     }                       
   }
   foreach($list_category as $item){
      $html_Category .= "<option value='" . $item->id ."'>Đổi: " . $item['name'] . "</option>";          
   }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CẬP NHẬT CHỦ ĐỀ</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=Topic"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=Topic&cat=process" method="post" enctype="multipart/form-data">                      
                    <div class="mb-3">
                    <label for="name">Tên chủ đề</label>
                    <?php foreach($list as $item):?>
                      <input type="text" class="form-control" id="name" name="name" placeholder="tên chủ đề" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$item['id'];?>">
                        <?php endforeach;?>                    
                    </div>

                    <div class="mb-3">
                    <label for="metakey">Từ khoá</label>
                    <?php foreach($list as $item):?>
                      <textarea name="metakey" id="metakey" class="form-control" cols="30" rows="10" required><?=$item['metakey'];?></textarea>
                        <?php endforeach;?>                
                    </div>

                    <div class="mb-3">
                    <label for="metadesc">Mô tả</label>
                    <?php foreach($list as $item):?>
                      <textarea name="metadesc" id="metadesc" class="form-control" cols="30" rows="10" required><?=$item['metadesc'];?></textarea>
                        <?php endforeach;?>                   
                    </div>
            

                    <div class="mb-3">
                    <label for="parent_id">Cấp cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                      <?= $html_parent_id ?>
                      <?= $html_Category ?>                    
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control"> 
                      <?= $html_sort_order ?>                     
                    </select>
                    </div>


                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <?= $html_status ?>
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