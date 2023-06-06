  
        <header>
        <div class="headerxxx">
             <div id="menu-h">
              <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="DK.html">Đăng ký</a>
                <a href="DN.html">Đăng nhập</a>
                <a href="">Khuyến mãi</a><br>
                <a href="#" style="color: red;">Danh mục
                  <div class="dropdown">
                    <button class="dropbtn"><img src="./img/logo/laptop.webp" alt=""> Chuột 1
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content1"> 
                      <div class="row">
                        <div class="column">
                          <h3>Category 1</h3>
                          <a href="collections.html">Link 1</a>
                          <a href="collections.html">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 2</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>   
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>   
                        <div class="column">
                          <h3>Category 1</h3>
                          <a href="collections.html">Link 1</a>
                          <a href="collections.html">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 2</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>   
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>  
      
                      </div>
                    </div>
                  </div> 
      
                  <div class="dropdown">
                    <button class="dropbtn"><img src="./img/logo/laptop.webp" alt=""> Chuột
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content1">
                      <div class="row">
                        <div class="column">
                          <h3>Category 1</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 2</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                    </div>
                  </div> 
    
    
                  <div class="dropdown">
                    <button class="dropbtn"><img src="./img/logo/laptop.webp" alt=""> Chuột
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content1">
                      <div class="row">
                        <div class="column">
                          <h3>Category 1</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 2</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                    </div>
                  </div> 
    
    
                  <div class="dropdown">
                    <button class="dropbtn"><img src="./img/logo/laptop.webp" alt=""> Chuột
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content1">
                      <div class="row">
                        <div class="column">
                          <h3>Category 1</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 2</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                        <div class="column">
                          <h3>Category 3</h3>
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                    </div>
                  </div> 
                  
                </a>
              </div>
              <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
           </div>

             <div id="home-page1">
              <a href="index.html"><img src="./public/img/logo/logo-icon-01.png"></a>
           </div>

           <div id="home-page">
            <a href="index.php"><img src="./public/img/logo/logo.svg" title="GEARVN PC HIGH-END &amp; GAMING GEAR" alt="ẢNH TRANG CHỦ"></a>
         </div>

             <div id="search">
                <input type="search" placeholder="Nhập mã hoặc tên sản phẩm"  required>
               <button><a href="#"><i class="fa fa-search"></i></a></button>
            </div>

            <div id="function">
              <?php if(isset($_SESSION['logincustomer'])):?>
               
                <a href="index.php?option=cart"><img src="./public/img/logo/gh.webp"> Giỏ hàng</a>
                <a href="index.php?option=custumer&f=logout"><img src="./public/img/logo/logout.svg"> Đăng xuất</a>
                <a href="index.php?option=custumer&f=profile"><img src="./public/img/logo/user-solid.svg">  <?php echo($_SESSION['logincustomer']); ?></a>
                <?php else:?> 
             
              <a href="index.php?option=cart"><img src="./public/img/logo/gh.webp"> Giỏ hàng</a>
              <a href="index.php?option=custumer&f=login"><img src="./public/img/logo/dn.webp" > Thành viên</a>

              <?php endif;?> 
          </div>
         
          <div class="cart-home">
            <i class="fa fa-shopping-cart fa-flip-horizontal">0</i>
          </div>  
            </div>

          </header>
            