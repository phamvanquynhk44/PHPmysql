<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\post;
  use App\Models\Topic;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list_post = post::where([['status','!=', '0'],['id','=', $id]])
  ->get();


  $html_topic_id_post="";
  foreach($list_post as $item){
    $html_topic_id_post = $item->topic_id;
  }


  $list_topic = Topic::where([['status','!=', '0'],['id','=', $html_topic_id_post]])
  ->get();
  //category
  $html_topic_id="";
  foreach($list_topic as $item){
    if($item->id !=$id){
      $html_topic_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }else{
      $html_topic_id .="<option value='" . $item->id ."'>Hiện tại: " . $item['name'] . "</option>";
    }
  }

  $list_topicAll = Topic::where('status','!=', '0')
  ->get();
  $html_topic_all="";
  foreach($list_topicAll as $item){
      $html_topic_id .="<option value='" . $item->id ."'>Đổi: " . $item['name'] . "</option>";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa bài viết</h1>
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
                    <label for="title">Tên bài viết</label>
                    <?php foreach($list_post as $item):?>
                      <input type="text" class="form-control" id="title" name="title" placeholder="tên bài viết" value="<?=$item['title'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" placeholder="tên bài viết" value="<?=$item['id'];?>">
                        <?php endforeach;?> 
                    </div>

                    <div class="mb-3">
                    <label for="detail">Chi tiết</label>
                    <?php foreach($list_post as $item):?>
                      <textarea name="detail" required><?=$item['detail'];?></textarea>
                        <?php endforeach;?>                  
                            <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace("detail");
                                </script>
                    </div>

                    <div class="mb-3">
                    <label for="metakey">Từ khoá</label>
                    <?php foreach($list_post as $item):?>
                      <textarea name="metakey" id="metakey" class="form-control" cols="30" rows="10" required><?=$item['metakey'];?></textarea>
                        <?php endforeach;?>                
                    </div>

                    <div class="mb-3">
                    <label for="metadesc">Mô tả</label>
                    <?php foreach($list_post as $item):?>
                      <textarea name="metadesc" id="metadesc" class="form-control" cols="30" rows="10" required><?=$item['metadesc'];?></textarea>
                        <?php endforeach;?>                   
                    </div>
            

                    <div class="mb-3">
                    <label for="topic_id">Chủ đề</label>
                    <select name="topic_id" id="topic_id" class="form-control">
                        <?= $html_topic_id ?>
                        <?= $html_topic_all ?>
                    </select>
                    </div>
                    
                    <div class="mb-3">
                    <label for="img">Ảnh hiện tại</label>
                    <?php foreach($list_post as $item):?>
                      <img src="../public/img/post/<?=$item['img'];?>" alt="<?=$item['name'];?>" class="imageEdit"> 
                        <?php endforeach;?><br> 
                    <label for="img">Chọn hình cần đổi</label>
                    <input type="file" class="form-control" id="img" name="img" require>
                    </div>

                    <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                    <?php foreach($list_post as $item):?>
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