<?php
use App\Models\User;
use App\Libraries\MyClass;
if(isset($_POST['DANGNHAP']))
{
    $message_alert="";
    $username=$_POST['username'];
    $password= sha1($_POST['password']);
    $args=null;
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args=[
            ['email','=',$username],
            ['password','=',$password],
            ['status','=',1],
        ];    
      }else{
        $args=[
            ['username','=',$username],
            ['password','=',$password],
            ['status','=',1],
        ]; 
      }
    $user=User::where($args)->first();
    if($user!=null){
        
        if($user->password==$password){
            $_SESSION['logincustomer']=$user->name;
            $_SESSION['user_id']=$user->id;
            $_SESSION['message_alert']=null;
            MyClass::set_flash('message',['type'=> 'success','msg'=>'Đăng nhập tài khoản thành công']);
            header("location:index.php");
        }   
    }
    else{ 
        MyClass::set_flash('message',['type'=> 'danger','msg'=>'Tên tài khoản hoặc mật khẩu không đúng']);
        header("location:index.php?option=custumer&f=login");
    }  

}