<?php
 use App\Models\Topic;
 use App\Libraries\MyClass;
 use App\Libraries\Mystring;
 if(isset($_POST['THEM'])){
 $Topic=new Topic();
 $Topic->name=$_POST['name'];
 $Topic->slug=Mystring::str_slug($_POST['name']);
 $Topic->metadesc=$_POST['metadesc'];
 $Topic->metakey=$_POST['metakey'];
 $Topic->parent_id=$_POST['parent_id'];
 
 $Topic->created_at=date("Y-m-d H:i:s");
 $Topic->created_by=$_SESSION["userid"]??1;
 $Topic->updated_at=date('Y-m-d H:i:s');
 $Topic->updated_by=$_SESSION["userid"]??1;
 $Topic->status=$_POST['status'];

 $Topic->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=Topic");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $Topic=Topic::find($id);
    $Topic->name=$_POST['name'];
    $Topic->slug=Mystring::str_slug($_POST['name']);
    $Topic->metadesc=$_POST['metadesc'];
    $Topic->metakey=$_POST['metakey'];
    $Topic->parent_id=$_POST['parent_id'];

    $Topic->created_at=date("Y-m-d H:i:s");
    $Topic->created_by=$_SESSION["userid"]??1;
    $Topic->updated_at=date("Y-m-d H:i:s");
    $Topic->updated_by=$_SESSION["userid"]??1;
    $Topic->status=$_POST['status'];
   
    $Topic->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=Topic");
   }
?>