
<?php require_once('./views/frontend/linkdata.php'); ?> 
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>

<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 50%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

.panel h2{
  width: 48%;
  background-color: #eee;
  color: #444;
}
.panel h2 a{
  color: #444;
}

.panel h3{
  width: 45%;
  background-color: #eee;
  color: #444;
}
.panel h3 a{
  color: none;
}

.panel a:hover{
  background-color: crimson;
  color: white;
}
</style>

  <?php
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Brand;
    $slug=$_REQUEST['cat'];
    $list_brand = Brand::where([['status', '=', '1'],['slug', '=',  $slug]])
    ->get();

    $brand_id='';
    foreach($list_brand as $brand){
        $brand_id =$brand->id;
    }
      $arg_product=[
        ['status', '=', '1'],
        ['brand_id', '=', $brand_id ],
      ];
      $list_product = Product::where($arg_product)
      ->get();
      
      $arg_category_all=[
        ['status', '=', '1'],
      ];
      $list_category_all = Category::where($arg_category_all)
      ->orderBy('sort_order', 'ASC')
      ->get();

      $listcategory = Category::where([['status', '=', 1],['parent_id', '=', 0]])
      ->orderBy('sort_order', 'ASC')
      ->get();

      $arg_brand_all=[
        ['status', '=', '1'],
      ];
      $list_brand_all = Brand::where($arg_brand_all)
      ->orderBy('sort_order', 'ASC')
      ->get();
?>  
  <h1>THƯƠNG HIỆU: <?= $slug?></h1>
  
  <button class="accordion">DANH MỤC SẢN PHẨM </button>
<div class="panel">
<?php foreach($listcategory as $category):?> 
<h2><a href="index.php?option=product&cat=<?= $category->slug?>"><?= $category->name?> <i class="fa fa-caret-down"></i></a></h2>

<?php foreach($list_category_all as $category_all):?> 
  <?php if($category_all->parent_id==$category->id):?>
    <?php
      $list_category1 = Category::where([['status', '=', '1'],['parent_id','=',$category_all->id]])
      ->orderBy('sort_order', 'asc')
      ->get();
      ?>
  <h3><a href="index.php?option=product&cat=<?= $category_all->slug?>"><?= $category_all->name?> <i class="fa fa-caret-down"></i></a></h3>

    <?php foreach($list_category1 as $category1):?>
      <p><a href="index.php?option=product&cat=<?= $category1->slug?>"><?= $category1->name?></a></p>
    <?php endforeach;?>

  <?php endif;?>
  <?php endforeach;?>
  
  <?php endforeach;?>
</div>

<button class="accordion">THƯƠNG HIỆU</button>
<div class="panel">
<?php foreach($list_brand_all as $brand_all):?> 
  <h2><p><a href="index.php?option=brand&cat=<?= $brand_all->slug?>"><?= $brand_all->name?></a></p></h2>
  <?php endforeach;?>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
  <div class="content">
   <main>
      <ul class="product" id="paginated-list" data-current-page="1" aria-live="polite">
      <?php foreach($list_product as $item):?>      
                  <li>
                    <div class="product-item">
                      <div class="product-top">
                        <a href="index.php?option=product&slug=<?= $item->slug?>" class="product-thumb">
                        <img src="./public/img/product/<?= $item->img?>" alt="<?= $item->name?>">
                        </a>
                        <a href="index.php?option=cart&addcat=<?= $item->id?>" class="buy-now">Đặt hàng</a>
                        <!--Click để xem chi tiết
                        Đặt hàng -->
                      <div class="product-info">
                        <a href="index.php?option=product&slug=<?= $item->slug?>" class="product-name"><?= $item->name?></a>
                        <a href="index.php?option=product&slug=<?= $item->slug?>" class="product"><del><?=number_format($item->price)?>vn₫</del></a>
                        <a href="index.php?option=product&slug=<?= $item->slug?>" class="product-price"><?=number_format($item->price_sale)?> vn₫</a>  
                      </div>
                    </div>
                    </div>
                  </li> 
                  <?php endforeach;?>
      </ul> 
      <nav class="pagination-container">
        <button class="pagination-button" id="prev-button" aria-label="Previous page" title="Previous page">
          &lt;
        </button>
    
        <div id="pagination-numbers">
    
        </div>
    
        <button class="pagination-button" id="next-button" aria-label="Next page" title="Next page">
          &gt;
        </button>
      </nav>
  </div>
    </main>




  <?php require_once('./views/frontend/footer.php'); ?> 
  </body>
    <script src="./public/js/collections.js"></script>
    <script src="./public/js/menu.js"></script>
    <script src="./public/js/pagination.js"></script>
</html>