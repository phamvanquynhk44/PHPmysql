<?php require_once('./views/frontend/linkdata.php'); ?> 
<style>
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

.alert-success {
  background-color: #008eff;
}
.close{
  display: none;
}
</style>
  <?php require_once('./views/frontend/header.php'); ?> 
  <?php require_once('./views/frontend/mod-mainmenu.php'); ?>




  <!-- ĐĂNG NHẬP -->
  <div id="login">
  <?php require_once('./views/frontend/message.php');?>
            <h1>Đăng nhập khách hàng</h1>
            <?php if(!isset($_SESSION['logincustomer'])):?>
                <form action="index.php?option=custumer&f=processLogin" method="POST">
                    <div class="f-e">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="text" name="username" placeholder="Tên đăng nhập hoặc Email" required>
                    </div>
                    <div class="f-pass">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="btn-login">
                        <button name="DANGNHAP">Đăng nhập</button>
                    </div>
                </form>
                <div class="for">
                    <a href="index.php?option=custumer&f=forgotPassword">Quên mật khẩu?</a> hoặc <a href="index.php?option=custumer&f=register">Đăng ký</a>
                </div>
                <?php else:?> 
                    <div class="alert info">
                    <span class="closebtn">&times;</span>  
                    <strong>THÔNG BÁO!</strong> Bạn đã đăng nhập
                    </div> 
              <?php endif;?> 

                <?php if(isset($message_alert)):?>
                   <div class="alert info">
                    <span class="closebtn">&times;</span>  
                    <strong>THÔNG BÁO!</strong> <?= $message_alert;?>
                    </div>
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
                
          </div>





  <?php require_once('./views/frontend/footer.php'); ?> 