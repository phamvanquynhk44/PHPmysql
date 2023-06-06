<?php require_once('./views/frontend/linkdata.php'); ?> 
<style>
  .footermenu{
    list-style: none;
  }
  .footermenu li a:hover{
    background-color: crimson;
    color:white;
  }
  .f-e textarea{
          width: 43%;

        }

.alert-success {
    color: #fff;
    background-color: #28a745;
    border-color: #23923d;
}
.alert-dismissible {
    padding-right: 4rem;
}
.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;

}
.alert .close, .alert .mailbox-attachment-close {
    color: #000;
    opacity: .2;
}
.alert-dismissible .close, .alert-dismissible .mailbox-attachment-close {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    padding: 0.75rem 1.25rem;
    color: inherit;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
button.close, button.mailbox-attachment-close {
    padding: 0;
    background-color: transparent;
    border: 0;
}
button.close, button.mailbox-attachment-close {
    padding: 0;
    background-color: transparent;
    border: 0;
}
.close, .mailbox-attachment-close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}
.close, .mailbox-attachment-close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}
[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button;
}
button, select {
    text-transform: none;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button {
    border-radius: 0;
}
*, ::after, ::before {
    box-sizing: border-box;
}
</style>
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>
<?php
            use App\Models\contact;
            use App\Libraries\MyClass;
            if(isset($_POST['GUI'])){
                $contact= new contact();
                $contact->name=$_POST['name'] ?? null;
                $contact->email=$_POST['email'];
                $contact->phone=$_POST['phone'];
                $contact->title=$_POST['title'];
                $contact->content=$_POST['detail'];
                $contact->status=1;
                $contact->save();
                MyClass::set_flash('message',['type'=> 'success','msg'=>'Góp ý của bạn đã được nhận']);
            }

        ?>




<h1>LIÊN LẠC</h1>  
<?php require_once('./views/backend/message.php');?> 
      <div id="login">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.7608709846486!2d106.77063267486946!3d10.829603258210911!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701cbacce21%3A0xc55b53936092d0e1!2zS8O9IFTDumMgWMOhIFRyxrDhu51uZyBDYW8gxJDhurNuZyBDw7RuZyBUaMawxqFuZyBUUC5IQ00!5e0!3m2!1svi!2s!4v1682003167046!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form action="index.php?option=contact" method="post">	
            <div class="showmessage"  style="color: red;"><h2></h2></div>   
                <div class="f-e">
                  <span><i class="fa fa-user"></i></span>
                    <input type="text" id="name" name="name" placeholder="Nhập họ tên" required>
                </div>
                <div class="f-e">
                  <span><i class="fa fa-envelope"></i></span>
                  <input type="email" id="email" name="email" placeholder="Nhập Email" required>
              </div>
              <div class="f-e">
                <span><i class="fa fa-phone"></i></span>
                <input type="number" id="phone" name="phone" placeholder="Nhập Số điện thoại" required>
            </div>
            <div class="f-e">
                  <span><i class="fa fa-user"></i></span>
                    <input type="text" id="title" name="title" placeholder="Nhập tiêu đề" required>
                </div>
              <div class="f-e">  
                <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Nhập nội dung" required></textarea>
            </div>
                <div class="btn-login">
                    <button name="GUI">Gửi</button>
                </div>
            </form>
            
             
      </div>


<script src="./public/plugins/jquery/jquery.min.js"></script>
<script src="./public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php require_once('./views/frontend/mod-footermenu.php'); ?>