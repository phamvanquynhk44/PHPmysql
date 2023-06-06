<?php
use App\Models\Product;
use App\Models\User;
if(!isset($_SESSION['logincustomer']))
{
  header("location:index.php?option=custumer&f=login");
}
else{
  $user =User::find($_SESSION['user_id']);
}
$content_cart=null;
if(isset($_SESSION['contentcart'])){
    $content_cart=$_SESSION['contentcart'];
   /*  var_dump($content_cart); */
}
?>
<?php require_once('./views/frontend/linkdata.php'); ?> 
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  text-align: center;
  
}
.btncart {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.success {background-color: #04AA6D;} /* Green */
.success:hover {background-color: #46a049;}

.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} /* Orange */
.warning:hover {background: #e68a00;}

.danger {background-color: #f44336;} /* Red */ 
.danger:hover {background: #da190b;}

.default {background-color: #e7e7e7; color: black;} /* Gray */ 
.default:hover {background: #ddd;}
.tt{
    color:crimson;
}
.cn{
    float: right;
}
.sl{
  width: 70px;
  
}
</style>
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>

<h1>THANH TOÁN</h1>
<form action="index.php?option=cart&checkoutCart=true" method="POST">
  <!-- ĐĂNG NHẬP -->
  <div id="login">  
                  <h2>Thông tin người nhận hàng</h2>
                    <div class="f-e">
                        <span><i class="fa fa-user"></i></span>
                        <input type="text" name="deliveryname" placeholder="Họ và tên người " value="<?= $user->name?>" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="email" name="deliveryemail" placeholder="Email" value="<?= $user->email?>" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-phone"></i></span>
                        <input type="number" name="deliveryphone" placeholder="Số điện thoại" value="<?= $user->phone?>" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-location"></i></span>
                        <input type="text" name="deliveryaddress" placeholder="Địa chỉ" value="<?= $user->address?>" required>
                    </div>
                    <div class="btn-login">
                        <div class="notifications"></div>
                          <div class="buttons">
                              <button id="info">Thanh Toán</button>
                          </div>
                    </div>          


<?php if($content_cart!=null):?>
<table id="customers">
  <tr>
    <th>ID</th>
    <th>Ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th class="sl">Số lượng</th>
    <th>Thành Tiền</th>
  </tr>
  <?php $total_money=0 ?>
  <?php foreach($content_cart as $cart):?>    
    <?php
    $product=Product::find($cart['id']);
    ?>  
  <tr>
    <td><?= $cart['id']?></td>
    <td><img src="public/img/product/<?= $product->img?>" alt="<?= $product->name?>" width="100px"> </td>
    <td><?= $product->name?></td>
    <td><?=number_format($cart['price'])?> VNĐ</td>
    <td>
        <?= $cart['qty']?>    
    </td>
    <td><?=number_format($cart['amount'])?> VNĐ</td>
  </tr>
  <?php $total_money+=$cart['amount'] ?>
  <?php endforeach;?>
  <tr>
  <td colspan="6"><h2 class="tt">Tổng tiền: <?=number_format($total_money) . " VNĐ"?></h2></td>
  </tr>
</table>
<br>
 <br>
 
<?php else :?>
    <h2>Chưa có sản phẩm trong giỏ hàng</h2>
<?php endif;?>
</div>
</form>
<script>
                var close = document.getElementsByClassName("closebtn");
                var i;

                for (i = 0; i < close.length; i++) {
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
                }
                </script>



<?php require_once('./views/frontend/footer.php'); ?>