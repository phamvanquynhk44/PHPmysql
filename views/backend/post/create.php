<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\post;
  use App\Models\Topic;
  $list_post = post::where([['status','!=', '0'],['type','=', 'post']])
  ->orderBy('created_at', 'desc')
  ->get();
  $list_topic = Topic::where('status','!=', '0')
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
            <h1>THÊM TRANG ĐƠN</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=post"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">                      
                    <div class="mb-3">
                    <label for="title">Tiêu đề bài viết</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="tiêu đề bài viết" required>
                    </div>

                    <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <textarea name="detail" required></textarea>
                            <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace("detail");
                                </script>
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
                    <label for="topic_id">Chủ đề</label>
                    <select name="topic_id" id="topic_id" class="form-control">
                        <option>---Chọn nhãn hiệu---</option>
                        <?php foreach($list_topic as $item):?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
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