<?php require_once('./views/frontend/linkdata.php'); ?> 
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>


<div id="login">
            <h1>Tạo tài khoản</h1>
                <form action="index.php?option=custumer&f=processRegister" method="post">
                    <div class="f-e">
                        <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
                        <input type="text" name="username" placeholder="Tên tài khoản" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
                        <input type="text" name="name" placeholder="Họ và tên" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <input type="phone" name="phone" placeholder="Điện thoại" required>
                    </div>
                    <div class="f-e">
                        <span><i class="fa fa-address-book-o" aria-hidden="true"></i></span>
                        <input type="text" name="address" placeholder="Địa chỉ" required>
                    </div>
                    <div class="f-pass">
                        <span><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="f-e">
                        <label for="gender">Giới tính: </label>
                        <select name="gender" id="gender">
                          <option value="1">Nam</option>
                          <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="btn-r">
                        <button name="DANGKY" type="submit">Đăng ký</button>
                    </div>
                </form>        
          </div>


  <?php require_once('./views/frontend/footer.php'); ?> 