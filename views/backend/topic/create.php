<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\Topic;
  use App\Models\Category;
  $list_Topic = Topic::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();
  $list_Category= Category::where('status','!=', '0')
  ->get();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm chủ đề</h1>
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
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên chủ đề" required>
                    </div>

                    <div class="mb-3">
                    <label for="metakey">Từ khoá</label>
                    <textarea name="metakey" id="metakey" class="form-control" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="metadesc">Mô tả</label>
                    <textarea name="metadesc" id="metadesc" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
            

                    <div class="mb-3">
                    <label for="parent_id">Cấp cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option>None</option>
                        <?php foreach($list_Category as $item):?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                    </div>

                    <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option>None</option>
                    </select>
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