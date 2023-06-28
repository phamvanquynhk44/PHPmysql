<?php
    use App\Models\Product;
    use App\Models\post;

    if($_POST['keyword'] != null){
      $keyword= $_POST['keyword'];
      $arg_product=[
        ['status', '=', '1'],
      ];
      $list_product = Product::where($arg_product)
      ->where('name','like',"%" . $keyword . "%")
      ->orderBy('created_at', 'DESC')
      ->get();
      $arg_post=[
        ['status', '=', '1'],
      ];
      $list_post = post::where($arg_product)
      ->where('title','like',"%" . $keyword . "%")
      ->orderBy('created_at', 'DESC')
      ->get();
      $list_item=array();
      foreach($list_product as $product){
        $item=array(
            'name'  => $product->name,
            'slug'  => $product->slug,
            'img'   => "product/" . $product->img,
            'table' => 'product'
        );
        $list_item[] = $item;
      }

      foreach($list_post as $post){
        $item=array(
            'name'  => $post->title,
            'slug'  => $post->slug,
            'img'   => "post/" . $post->img,
            'table' => 'post'
        );
        $list_item[] = $item;
      }
    }else{
      header("location: index.php?");
    }
?> 

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



 
  <h1>TỪ KHOÁ TÌM KIẾM: <?= $keyword?></h1>
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
                        <a href="index.php?option=cart&addcart=<?= $item->id?>" class="buy-now">Đặt hàng</a>
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