
<?php require_once('../views/backend/header.php'); ?>

<?php 
  use App\Models\Menu;
  use App\Models\Category;
  use App\Models\Brand;
  use App\Models\Topic;
  use App\Models\post;
  $list_Menu = Menu::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();

  $list_category = Category::where('status','!=', '0')->get();
  $list_brand = Brand::where('status','!=', '0')->get();
  $list_topic = Topic::where('status','!=', '0')->get();
  $list_page = post::where([['status','!=', '0'],['type','=', 'page']])->get();
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TẤT CẢ MENU</h1>
          </div>
        </div>
        <div class="buttonC">
            <a href="index.php?option=menu&cat=trash"><button class="btn danger">Thùng rác</button></a>       
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="index.php?option=menu&cat=process" method="post">     

        <Select name="position" class="form-control">
          <option value="mainmenu">Main Menu</option>
          <option value="footermenu">Footer Menu</option>
        </Select>
      
      <button type="button" class="collapsible">DANH MỤC SẢN PHẨM</button>
      <div class="content1">
      <?php foreach($list_category as $category):?>
        <p>
        <div class="form-check">
          <input class="form-check-input" name="categoryId[]" type="checkbox" value="<?=$category['id'];?>" id="categoryCheck<?=$category['id'];?>">
          <label class="form-check-lable" for="categoryCheck<?=$category['id'];?>">
              <?=$category['name'];?>
          </label>
        </div>
        </p>
        <?php endforeach;?>
        <div class="mb-3">
        <input type="submit" name="THEMCATEGORY" value="Thêm Menu" class="btn btn-sm btn-success form control">
        </div>
      </div>
      
      <button type="button" class="collapsible">THƯƠNG HIỆU</button>
      <div class="content1">
      <?php foreach($list_brand as $brand):?>
        <p>
        <div class="form-check">
          <input class="form-check-input" name="brandId[]" type="checkbox" value="<?=$brand['id'];?>" id="brandCheck<?=$brand['id'];?>">
          <label class="form-check-lable" for="brandCheck<?=$brand['id'];?>">
              <?=$brand['name'];?>
          </label>
        </div>
        </p>
        <?php endforeach;?>
        <div class="mb-3">
        <input type="submit" name="THEMBRAND" value="Thêm Menu" class="btn btn-sm btn-success form control">
        </div>
      </div>
      <button type="button" class="collapsible">CHỦ ĐỀ BÀI VIẾT</button>
      <div class="content1">
      <?php foreach($list_topic as $topic):?>
        <p>
        <div class="form-check">
          <input class="form-check-input" name="topicId[]" type="checkbox" value="<?=$topic['id'];?>" id="topicCheck<?=$topic['id'];?>">
          <label class="form-check-lable" for="topicCheck<?=$topic['id'];?>">
              <?=$topic['name'];?>
          </label>
        </div>
        </p>
        <?php endforeach;?>
        <div class="mb-3">
        <input type="submit" name="THEMTOPIC" value="Thêm Menu" class="btn btn-sm btn-success form control">
        </div>
      </div>
      <button type="button" class="collapsible">TRANG ĐƠN</button>
      <div class="content1">
      <?php foreach($list_page as $page):?>
        <p>
        <div class="form-check">
          <input class="form-check-input" name="pageId[]" type="checkbox" value="<?=$page['id'];?>" id="pageCheck<?=$page['id'];?>">
          <label class="form-check-lable" for="pageCheck<?=$page['id'];?>">
              <?=$page['title'];?>
          </label>
        </div>
        </p>
        <?php endforeach;?>
        <div class="mb-3">
        <input type="submit" name="THEMPAGE" value="Thêm Menu" class="btn btn-sm btn-success form control">
        </div>
      </div>
      <button type="button" class="collapsible">TUỲ BIẾN LIÊN KẾT</button>
      <div class="content1">
        <p>
        <div class="mb-3">
        <label for="name">Tên menu</label>
        <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
        <label for="link">Liên kết</label>
        <input type="text" name="link" id="link" class="form-control">
        </div>
        <div class="mb-3">
        <input type="submit" name="THEMCUSTOM" value="Thêm Menu" class="btn btn-sm btn-success form control">
        </div>
        </p>
      </div>
      </form>
     
  <?php require_once('../views/backend/message.php');?>
    <table id="customers">
  <tr>
    <th>Tên Menu</th>
    <th>Liên kết</th>
    <th>Ngày tạo</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_Menu as $item):?>
    <tr>
    <td><?=$item['name'];?></td>
    <td><?=$item['link'];?></td>   
    <td><?=$item['created_at'];?></td>
    <td class="function">  
      <?php if($item->status==1):?>
        <a href="index.php?option=menu&cat=status&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-toggle-on"></i></button></a>
        <?php else:?>
          <a href="index.php?option=menu&cat=status&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-toggle-on"></i></button></a>
          <?php endif;?>
        <a href="index.php?option=menu&cat=edit&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-edit"></i></button></a>
        <a href="index.php?option=menu&cat=show&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-eye"></i></button></a> 
        <a href="index.php?option=menu&cat=delete&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
  
    </section>
  </div>

  <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>


<?php require_once('../views/backend/footer.php');
