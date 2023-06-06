
<!DOCTYPE html>
<html>
    <head>         
    <title>chi tiết sản phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./public/css/main.css">
    <link rel="stylesheet" href="./public/css/app.css">
    <link rel="stylesheet" href="./public/css/login-register.css">
    <link rel="stylesheet" href="./public/css/detail.css">
    <link rel="stylesheet" href="./public/css/responsive.css">
    <link rel="stylesheet" href="./public/css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
    <body>
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="kAkTZe1t"></script>
<?php
    use App\Models\Product;
    use App\Models\Category;
    $slug=$_REQUEST['slug'];
      $row_product = Product::where([['status', '=', '1'],['slug', '=', $slug]])
      ->first();


      $list_category_id=array();
      array_push($list_category_id,$row_product->category_id);
      $list_category1 = Category::where([['status', '=', 1],['parent_id', '=', $row_product->category_id]])
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
        ['id','!=',$row_product->id]
      ];
      $list_product = Product::where($arg_product)
      ->whereIn('category_id',$list_category_id)
      ->orderBy('created_at', 'DESC')
      ->take(4)
      ->get();

      $product_list1 = Product::where([['status', '=', '1'],['slug', '=', $slug]])
      ->get();
?>

<?php foreach($product_list1 as $product):?>
<div id="slideshow-g">
<div class="containerd">
  <div class="mySlidesd">
  
    <img src="./public/img/product/<?= $product->img?>" style="width:100%">
    
  </div>
    
  <a class="prevd" onclick="plusSlides(-1)">❮</a>
  <a class="nextd" onclick="plusSlides(1)">❯</a>
</div>

 
<div class="info-detail">
  <h1><?= $product->name?></h1>
  🎁Nhận ngay bộ sticker dán GEARVN🎁 (số lượng có hạn)
  <div class="promotion-d">
   <h3>⭐ KHUYẾN MÃI ĐẶC BIỆT ⭐(số lượng có hạn)</h3>
   <p> + Giảm giá chỉ còn 48,000,000đ.</p>
   <p>+ Nhận ngay tản nhiệt Corsair H100i ELITE CAPELLIX WHITE trị giá 4,190,000đ.</p>
   <p>  + Mua thêm RAM giảm ngay 500,000đ (xem chi tiết).</p>
   <p>(Lưu ý: Không hỗ trợ trừ KM vào giá bán bộ PC, không thay đổi linh kiện bộ PC để giữ CTKM)</p>
       
  <h3>🎁ƯU ĐÃI SIÊU SỐC🎁 (số lượng có hạn).</h3>
  <p> + Giảm giá 30% sản phẩm đèn thông minh Nanoleaf khi mua kèm PC.</p>
   
  <h3>ƯU ĐÃI KHI MUA KÈM PC TẠI GEARVN</h3>
  <p>⭐ Giảm ngay 100,000đ khi mua thêm màn hình máy tính.</p>
  <p>⭐ Giảm ngay 150,000đ khi mua thêm ghế.</p>
  <p>⭐ Giảm ngay 50,000đ mỗi loại khi mua thêm chuột, phím, tai nghe.</p>
  <p>Và còn rất nhiều ưu đãi khác. XEM NGAY CHI TIẾT TẠI ĐÂY</p>

  </div>
  <div class="order-d">
    <p> Hỗ trợ trả góp MPOS (Thẻ tín dụng), HDSAISON.</p>
    <p> (Hình ảnh PC chỉ mang tính chất minh họa).</p>
    <p> Giá Cũ: <big style="color: #888;font-size: 22px;ine-height: 180%;"><del><?=number_format($product->price)?>vn₫</del></big></p>
    <p> Giá KM: <big style="color: #e61010;font-size: 22px;font-weight: 700;"><?=number_format($product->price_sale)?>vn₫</big></p>

    <p>Số lượng: <input type="number" min="1" max="100000" id="qty" name="qty" value="1"></p>
    <a href="index.php?option=cart&addcart=<?= $product->id?>"><button>Đặt hàng</button></a>
  </div>
</div>


</div>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, '1')">Mô tả sản phẩm</button>
  <button class="tablinks" onclick="openCity(event, '2')">Bình luận</button>
</div>

<div id="1" class="tabcontent">
<?= $product->metadesc?>
</div>

<div id="2" class="tabcontent">
<div class="fb-comments" data-href="https://fit-hitu.edu.vn/" data-width="" data-numposts="5"></div>
</div>
<?php endforeach;?>

<h2>SẢN PHẨM CÙNG LOẠI</h2>
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



<?php require_once('./views/frontend/footer.php'); ?> 
  </body>
  <script src="./public/js/detail.js"></script>
<script src="./public/js/menu.js"></script>
</html>