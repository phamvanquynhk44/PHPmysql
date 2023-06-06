<?php
 use App\Models\post;
 use App\Libraries\MyClass;
 use App\Libraries\Mystring;
 if(isset($_POST['THEM'])){
 $post=new post();
 $post->title=$_POST['title'];
 $post->slug=Mystring::str_slug($_POST['title']);
 $post->detail=$_POST['detail'];
 $post->topic_id=$_POST['topic_id'];
 $post->type='post';
 $post->metadesc=$_POST['metadesc'];
 $post->metakey=$_POST['metakey'];
 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/post/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/post/" . $_FILES["img"]["name"]);
        $post->img=$file["name"];

    }
 }
 $post->created_at=date("Y-m-d H:i:s");
 $post->created_by=$_SESSION["userid"]??1;
 $post->updated_at=date('y-m-d H:i:s');
 $post->updated_by=$_SESSION["userid"]??1;
 $post->status=$_POST['status'];

 $post->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=post");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $post=post::find($id);
    $post->title=$_POST['title'];
    $post->slug=Mystring::str_slug($_POST['title']);
    $post->detail=$_POST['detail'];
    $post->topic_id=$_POST['topic_id'];
    $post->type='post';
    $post->metadesc=$_POST['metadesc'];
    $post->metakey=$_POST['metakey'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/post/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/post/" . $_FILES["img"]["name"]);
           $post->img=$file["name"];
   
       }
    }
    $post->created_at=date("Y-m-d H:i:s");
    $post->created_by=$_SESSION["userid"]??1;
    $post->updated_at=date("Y-m-d H:i:s");
    $post->updated_by=$_SESSION["userid"]??1;
    $post->status=$_POST['status'];
   
    $post->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=post");
   }
?>