<?php
 use App\Models\slider;
 use App\Libraries\MyClass;
 if(isset($_POST['THEM'])){
 $slider=new slider();
 $slider->name=$_POST['name'];
 $slider->link=$_POST['link'];
 $slider->position=$_POST['position'];
 $slider->sort_order=$_POST['sort_order'];
 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/slider/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/slider/" . $_FILES["img"]["name"]);
        $slider->img=$file["name"];

    }
 }
 $slider->created_at=date("Y-m-d H:i:s");
 $slider->created_by=$_SESSION["userid"]??1;
 $slider->updated_at=date('y-m-d H:i:s');
 $slider->updated_by=$_SESSION["userid"]??1;
 $slider->status=$_POST['status'];

 $slider->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=slider");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $slider=slider::find($id);
    $slider->name=$_POST['name'];
    $slider->link=$_POST['link'];
    $slider->position=$_POST['position'];
    $slider->sort_order=$_POST['sort_order'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/slider/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/slider/" . $_FILES["img"]["name"]);
           $slider->img=$file["name"];
   
       }
    }
    $slider->created_at=date("Y-m-d H:i:s");
    $slider->created_by=$_SESSION["userid"]??1;
    $slider->updated_at=date("Y-m-d H:i:s");
    $slider->updated_by=$_SESSION["userid"]??1;
    $slider->status=$_POST['status'];
   
    $slider->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=slider");
   }
?>