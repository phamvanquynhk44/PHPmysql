<?php 
  use App\Models\order;
  use App\Libraries\MyClass;
  $id= $_REQUEST['id'];
  if(!is_numeric($id)){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=order");
  }
  $row=order::where([['id','=',$id],['status','!=',0]])->first();
  if($row==NULL){
    MyClass::set_flash('message',['type'=> 'danger','msg'=>'Mẫu tin không tồn tại']);
    header("location: index.php?option=order");
  }
  $row->status=($row->status==1)?2:4;
  $row->updated_at=date('Y-m-d H:i:s');
  $row->updated_by=$_SESSION['userid'] ?? 1;
  $row->save();
  MyClass::set_flash('message',['type'=> 'success','msg'=>'Thay đổi trạng thái thành công']);
  header("location: index.php?option=order");

