<?php
 use App\Models\Brand;
 use App\Libraries\MyClass;
 use App\Libraries\Mystring;
 if(isset($_POST['THEM'])){
 $Brand=new Brand();
 $Brand->name=$_POST['name'];
 $Brand->slug=Mystring::str_slug($_POST['name']);
 $Brand->metadesc=$_POST['metadesc'];
 $Brand->metakey=$_POST['metakey'];
 $Brand->sort_order=$_POST['sort_order'];
 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/Brand/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/Brand/" . $_FILES["img"]["name"]);
        $Brand->img=$file["name"];

    }
 }
 $Brand->created_at=date("Y-m-d H:i:s");
 $Brand->created_by=$_SESSION["userid"]??1;
 $Brand->updated_at=date('y-m-d H:i:s');
 $Brand->updated_by=$_SESSION["userid"]??1;
 $Brand->status=$_POST['status'];

 $Brand->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=Brand");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $Brand=Brand::find($id);
    $Brand->name=$_POST['name'];
    $Brand->slug=Mystring::str_slug($_POST['name']);
    $Brand->metadesc=$_POST['metadesc'];
    $Brand->metakey=$_POST['metakey'];
    $Brand->sort_order=$_POST['sort_order'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/Brand/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/Brand/" . $_FILES["img"]["name"]);
           $Brand->img=$file["name"];
   
       }
    }
    $Brand->created_at=date("Y-m-d H:i:s");
    $Brand->created_by=$_SESSION["userid"]??1;
    $Brand->updated_at=date("Y-m-d H:i:s");
    $Brand->updated_by=$_SESSION["userid"]??1;
    $Brand->status=$_POST['status'];
   
    $Brand->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=Brand");
   }
?>