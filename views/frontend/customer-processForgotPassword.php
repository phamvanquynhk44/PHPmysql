<?php
use App\Models\User;
use App\Libraries\MyClass;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

if(isset($_POST['FORGOTPASS'])){
    $email= $_POST['email'];
   // echo($email);
    $list_user = User::where([['status', '=', '1'],['email', '=' ,$email]])
    ->get();

    if (count($list_user)===0) {
        MyClass::set_flash('message',['type'=> 'danger','msg'=>'Email tài khoản chưa được đăng ký']);
        header("location:index.php?option=custumer&f=forgotPassword");
      } else {
        require("./PHPMailer/src/PHPMailer.php");
        require("./PHPMailer/src/SMTP.php");
        require("./PHPMailer/src/Exception.php");
          $mail = new PHPMailer\PHPMailer\PHPMailer();
          $mail->IsSMTP(); // enable SMTP
          $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465; // or 587
          $mail->IsHTML(true);
          $mail->Username = "phamvanquynhk44@gmail.com";
          $mail->Password = "hwosmucwvljbjipb";
          $mail->SetFrom("phamvanquynhk44@gmail.com");
          $mail->Subject = "Khôi phục mật khẩu";
          $mail->Body = '<button><a href="http://localhost/phamvanquynh2120030166/index.php?option=custumer&f=resetPassword">khôi phục mật khẩu</a></button>';
          $mail->AddAddress($email);
      
           if(!$mail->Send()) {
                MyClass::set_flash('message',['type'=> 'danger','msg'=>'Không gửi được email']);
                header("location:index.php?option=custumer&f=forgotPassword");
           } else {
              MyClass::set_flash('message',['type'=> 'success','msg'=>'Hãy kiểm tra email để lấy lại mật khẩu']);
              header("location:index.php?option=custumer&f=forgotPassword");
           }
      }
    
    // MyClass::set_flash('message',['type'=> 'success','msg'=>'Khôi phục tài khoản thành công']);
    // header("location:index.php?option=custumer&f=login");
}

