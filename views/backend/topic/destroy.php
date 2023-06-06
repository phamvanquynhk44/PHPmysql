<?php 
  use App\Models\Topic;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=Topic&cat=trash");
  }
  $row=Topic::where([['id','=',$id],['status','=',0]])->first();
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=Topic&cat=trash");
  }
  $row->delete();
  MyClass::set_flash('message',['type'=> 'success','msg'=>'Xoá thành công']);
  header("location: index.php?option=Topic&cat=trash");

