<?php
use App\Models\User;
use App\Libraries\MyClass;
if(isset($_POST['DANGKY'])){
    $user=new User();
    $user->name=$_POST['name'];
    $user->email=$_POST['email'];
    $user->phone=$_POST['phone'];
    $user->username=$_POST['username'];
    $user->password= sha1($_POST['password']);
    $user->gender=$_POST['gender'];
    $user->address=$_POST['address'];
    $user->roles=0;
    $user->status=1;

    $user->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Đăng ký tài khoản thành công']);
    header("location:index.php?option=custumer&f=login");
}