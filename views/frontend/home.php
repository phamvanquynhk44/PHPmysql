
  <?php require_once('./views/frontend/linkdata.php'); ?> 
  <?php require_once('./views/frontend/header.php'); ?> 
  <?php require_once('./views/frontend/mod-mainmenu.php'); ?>
  <?php require_once('./views/frontend/slider.php'); ?> 
 
<?php
use App\Models\Category;
use App\Models\Product;
$arg_category=[
  ['status', '=', 1],
  ['parent_id', '=', 0],
];
$list_category = Category::where($arg_category)
->orderBy('sort_order', 'asc')
->get();
?>
          <?php foreach($list_category as $row_cat):?>
            <?php  
            $list_category_id=array();
            array_push($list_category_id,$row_cat->id);
            $list_category1 = Category::where([['status', '=', 1],['parent_id', '=', $row_cat->id]])
            ->get();
            if(count($list_category1)>0){
              foreach($list_category1 as $row_cat1){
                array_push($list_category_id, $row_cat1->id);
                $list_category2 = Category::where([['status', '=', 1],['parent_id', '=', $row_cat1->id]])
                ->get();
                if(count($list_category2)>0){
                  foreach($list_category2 as $row_cat2){
                    array_push($list_category_id, $row_cat2->id);
                  }
                }
              }
            }

            $arg_product=[
              ['status', '=', '1'],
            ];
            $list_product = Product::where($arg_product)
            ->whereIn('category_id',$list_category_id)
            ->orderBy('created_at', 'DESC')
            ->take(8)
            ->get();
              ?>    
             
            <div class="content">
              <div class="pc">
                <h2><?= $row_cat->name?></h2>
                <a href="index.php?option=product&cat=<?= $row_cat->slug?>">Xem tất cả ></a>
             </div> 
                <ul class="product"> 
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
            </div>
            <?php endforeach;?>   
    <?php require_once('./views/frontend/footer.php'); ?> 
    </body>
    <script src="./public/js/home.js"></script>
    <script src="./public/js/menu.js"></script>
    <script src="./public/js/pagination.js"></script>
</html>