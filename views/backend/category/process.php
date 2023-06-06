<?php
 use App\Models\Category;
 use App\Libraries\MyClass;
 use App\Libraries\Mystring;
 if(isset($_POST['THEM'])){
 $category=new Category();
 $category->name=$_POST['name'];
 $category->slug=Mystring::str_slug($_POST['name']);
 $category->metadesc=$_POST['metadesc'];
 $category->metakey=$_POST['metakey'];
 $category->parent_id=$_POST['parent_id'];
 $category->sort_order=$_POST['sort_order'];

 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/category/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/category/" . $_FILES["img"]["name"]);
        $category->img=$file["name"];

    }
 }
 $category->created_at=date("Y-m-d H:i:s");
 $category->created_by=$_SESSION["userid"]??1;
 $category->updated_at=date('y-m-d H:i:s');
 $category->updated_by=$_SESSION["userid"]??1;
 $category->status=$_POST['status'];

 $category->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=category");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $category=Category::find($id);
    $category->name=$_POST['name'];
    $category->slug=Mystring::str_slug($_POST['name']);
    $category->metadesc=$_POST['metadesc'];
    $category->metakey=$_POST['metakey'];
    $category->parent_id=$_POST['parent_id'];
    $category->sort_order=$_POST['sort_order'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/category/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/category/" . $_FILES["img"]["name"]);
           $category->img=$file["name"];
   
       }
    }
    $category->created_at=date("Y-m-d H:i:s");
    $category->created_by=$_SESSION["userid"]??1;
    $category->updated_at=date("Y-m-d H:i:s");
    $category->updated_by=$_SESSION["userid"]??1;
    $category->status=$_POST['status'];
   
    $category->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=category");
   }
?>