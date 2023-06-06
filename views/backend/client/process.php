<?php
 use App\Models\user;
 use App\Libraries\MyClass;
 if(isset($_POST['THEM'])){
 $user=new user();
 $user->username=$_POST['username'];
 $password=$_POST['password'];
 $confirm_password=$_POST['confirm_password'];
 if($confirm_password!=$password){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mật khẩu không trung khớp']);
    header("location: index.php?option=user&cat=create");
 }else{
    $user->password=sha1($password);
 }
 $user->email=$_POST['email'];
 $user->phone=$_POST['phone'];
 $user->name=$_POST['name'];
 $user->gender=$_POST['gender'];
 $user->address=$_POST['address'];
 $user->roles=0;
 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/user/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/user/" . $_FILES["img"]["name"]);
        $user->img=$file["name"];

    }
 }
 $user->created_at=date("Y-m-d H:i:s");
 $user->created_by=$_SESSION["userid"]??1;
 $user->updated_at=date('y-m-d H:i:s');
 $user->updated_by=$_SESSION["userid"]??1;
 $user->status=$_POST['status'];

 $user->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=client");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $user=user::find($id);
    $user->username=$_POST['username'];
    $password= $_POST['password'];
    if($password==1){
      $user->password=sha1($password);
    }else{
       $user->password=$password;
    }
    $user->email=$_POST['email'];
    $user->phone=$_POST['phone'];
    $user->name=$_POST['name'];
    $user->gender=$_POST['gender'];
    $user->address=$_POST['address'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/user/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/user/" . $_FILES["img"]["name"]);
           $user->img=$file["name"];
   
       }
    }
    $user->created_at=date("Y-m-d H:i:s");
    $user->created_by=$_SESSION["userid"]??1;
    $user->updated_at=date("Y-m-d H:i:s");
    $user->updated_by=$_SESSION["userid"]??1;
    $user->status=$_POST['status'];
   
    $user->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=client");
   }
?>