
<?php require_once('./views/frontend/linkdata.php'); ?> 
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
  body{
        font-family: 'Poppins', sans-serif;
        align-items: center;
    }
    button{
        padding: 10px;
    }
    .notifications{
        position: fixed;
        top: 30px;
        right: 20px;
    }
    .toast{
        position: relative;
        padding: 10px;
        color: #fff;
        margin-bottom: 10px;
        width: 500px;
        display: grid;
        grid-template-columns: 70px 1fr 70px;
        border-radius: 5px;
        --color: #0abf30;
        background-image: 
            linear-gradient(
                to right, #0abf3055, #22242f 30%
            ); 
        animation: show 0.3s ease 1 forwards  
    }
    .toast i{
        color: var(--color);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: x-large;
    }
    .toast .title{
        font-size: x-large;
        font-weight: bold;
    }
    .toast span, .toast i:nth-child(3){
        color: #fff;
        opacity: 0.6;
    }
    @keyframes show{
        0%{
            transform: translateX(100%);
        }
        40%{
            transform: translateX(-5%);
        }
        80%{
            transform: translateX(0%);
        }
        100%{
            transform: translateX(-10%);
        }
    }
    .toast::before{
        position: absolute;
        bottom: 0;
        left: 0;
        background-color: var(--color);
        width: 100%;
        height: 3px;
        content: '';
        box-shadow: 0 0 10px var(--color);
        animation: timeOut 5s linear 1 forwards
    }
    @keyframes timeOut{
        to{
            width: 0;
        }
    }
    .toast.error{
        --color: #f24d4c;
        background-image: 
            linear-gradient(
                to right, #f24d4c55, #22242F 30%
            );
    }
    .toast.warning{
        --color: #e9bd0c;
        background-image: 
            linear-gradient(
                to right, #e9bd0c55, #22242F 30%
            );
    }
    .toast.info{
        --color: #3498db;
        background-image: 
            linear-gradient(
                to right, #3498db55, #22242F 30%
            );
    }
  .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
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
.kcsp{
  color: crimson;
  text-align: center;
}
header{
  z-index: 0;
}
</style>
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>
<?php
use App\Models\Product;
$content_cart=null;
$message_alert='';
if(isset($_SESSION['contentcart'])){
    $content_cart=$_SESSION['contentcart'];
   /*  var_dump($content_cart); */
}
?>

<h1>GIỎ HÀNG</h1>
<?php if($content_cart!=null):?>
  <form action="index.php?option=cart" method="post">
<table id="customers">
  <tr>
    <th>ID</th>
    <th>Ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th class="sl">Số lượng</th>
    <th>Thành Tiền</th>
    <th>Xoá</th>
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
        <input type="number" name="qty[<?= $cart['id']?>]" value="<?= $cart['qty']?>" min="1" class="sl">    
    </td>
    <td><?=number_format($cart['amount'])?> VNĐ</td>
    <td><a class="btncart danger" href="index.php?option=cart&dellcart=<?= $cart['id']?>">Xoá</a></td>
  </tr>
  <?php $total_money+=$cart['amount'] ?>
  <?php endforeach;?>
  <tr>
  <td colspan="4"><h2 class="tt">Tổng tiền: <?=number_format($total_money) . " VNĐ"?></h2></td>
  <td colspan="1" >
  <input type="submit" name="updateCart" value="Cập nhật" class="btncart info"> 
 </td>
 <td colspan="1">
 <a href="index.php?option=cart&checkout=true" class="btncart success">Thanh toán</a>
 </td>
 <td colspan="1">
 <a href="index.php?option=cart&dellcart=all" class="btncart danger">Xoá tất cả</a>
 </td>
  </tr>
</table>
</form>
<br>
 <div class="checkout">
    
 </div>
 <br>
 
<?php else :?>
    <h2 class="kcsp">Chưa có sản phẩm trong giỏ hàng</h2>
    <?php if($message_alert=="successOder"):?>
            <div class="toast info" id="tb">
                <i class="fa-solid fa-circle-info"></i>
                <div class="content">
                    <div class="title">THÔNG BÁO!</div>
                    <span>CẢM ƠN BẠN ĐÃ MUA HÀNG.</span>
                </div>
                <i class="fa-solid fa-xmark" onclick="(this.parentElement).remove()"></i>
            </div>
    <?php endif;?> 
<?php endif;?>






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
        <script>
        let newToast = document.getElementById('tb');
        newToast.timeOut = setTimeout(
            ()=>newToast.remove(), 5000
        )
      </script>
    <script>
    let notifications = document.querySelector('.notifications');
    let success = document.getElementById('success');
    let error = document.getElementById('error');
    let warning = document.getElementById('warning');
    let info = document.getElementById('info');
    
    function createToast(type, icon, title, text){
        let newToast = document.createElement('div');
        newToast.innerHTML = `
            <div class="toast ${type}">
                <i class="${icon}"></i>
                <div class="content">
                    <div class="title">${title}</div>
                    <span>${text}</span>
                </div>
                <i class="fa-solid fa-xmark" onclick="(this.parentElement).remove()"></i>
            </div>`;
        notifications.appendChild(newToast);
        newToast.timeOut = setTimeout(
            ()=>newToast.remove(), 5000
        )
    }
    success.onclick = function(){
        let type = 'success';
        let icon = 'fa-solid fa-circle-check';
        let title = 'Success';
        let text = 'This is a success toast.';
        createToast(type, icon, title, text);
    }
    error.onclick = function(){
        let type = 'error';
        let icon = 'fa-solid fa-circle-exclamation';
        let title = 'Error';
        let text = 'This is a error toast.';
        createToast(type, icon, title, text);
    }
    warning.onclick = function(){
        let type = 'warning';
        let icon = 'fa-solid fa-triangle-exclamation';
        let title = 'Warning';
        let text = 'This is a warning toast.';
        createToast(type, icon, title, text);
    }
    info.onclick = function(){
        let type = 'info';
        let icon = 'fa-solid fa-circle-info';
        let title = 'THÔNG BÁO!';
        let text = 'CẢM ƠN BẠN ĐÃ MUA HÀNG.';
        createToast(type, icon, title, text);
    }
    </script>

<?php require_once('./views/frontend/footer.php'); ?> 