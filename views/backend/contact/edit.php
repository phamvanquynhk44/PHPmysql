<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\contact;
  use App\Models\Category;
  use App\Models\Brand;
  use App\Libraries\MyClass;
  $id=$_REQUEST['id'];
  $list_contact = contact::where([['status','!=', '0'],['id','=', $id]])
  ->get();
  $html_category_id_contact="";
  foreach($list_contact as $item){
    $html_category_id_contact = $item->category_id;
  }

  $html_brand_id_contact="";
  foreach($list_contact as $item){
    $html_brand_id_contact = $item->brand_id;
  }


  $list_category = Category::where([['status','!=', '0'],['id','=', $html_category_id_contact]])
  ->get();
  $list_brand = Brand::where([['status','!=', '0'],['id','=', $html_brand_id_contact]])
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
            <h1>TRẢ LỜI LIÊN HỆ</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=contact"><button class="btn info">Quay về</button></a>      
          </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">    
                <form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">                      
                <div class="mb-3">
                    <label for="name">Họ và tên</label>
                    <?php foreach($list_contact as $item):?>
                      <input type="text" class="form-control" id="name" name="name" readonly="readonly" placeholder="tên sản phẩm" value="<?=$item['name'];?>" required>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?=$item['id'];?>">
                      <input type="hidden" class="form-control" id="user_id" name="user_id"  value="<?=$item['user_id'];?>">
                        <?php endforeach;?> 
                    </div>


                    <div class="mb-3">
                    <label for="email">Email</label>
                    <?php foreach($list_contact as $item):?>
                      <input type="text" class="form-control" id="email" name="email" readonly="readonly" placeholder="tên sản phẩm" value="<?=$item['email'];?>">
                        <?php endforeach;?> 
                    </div>

                    <div class="mb-3">
                    <label for="phone">Điện thoại</label>
                    <?php foreach($list_contact as $item):?>
                      <input type="text" class="form-control" id="phone" name="phone" readonly="readonly" placeholder="tên sản phẩm" value="<?=$item['phone'];?>">
                        <?php endforeach;?> 
                    </div>


                    <div class="mb-3">
                    <label for="title">Tiêu đề</label>
                    <?php foreach($list_contact as $item):?>
                      <input type="text" class="form-control" id="title" name="title" readonly="readonly" placeholder="tên sản phẩm" value="<?=$item['title'];?>">
                        <?php endforeach;?> 
                    </div>


                    
                    <div class="mb-3">
                    <label for="content">Nội dung và câu hỏi</label>
                    <?php foreach($list_contact as $item):?>
                      <textarea name="content" id="content" class="form-control" cols="30" rows="10" readonly="readonly"><?=$item['content'];?></textarea>
                        <?php endforeach;?>                
                    </div>


                    <div class="mb-3">
                    <label for="reply">Trả lời</label>
                      <textarea name="reply" id="reply" class="form-control" cols="30" rows="10" ></textarea>               
                    </div>   

                    <div class="mb-3">                   
                    <button class="btn info" name="CAPNHAT">TRẢ LỜI</button>
                    </div> 
                </form>                
    </section>
  </div>
<?php require_once('../views/backend/footer.php'); ?>