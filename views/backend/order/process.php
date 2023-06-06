<?php
 use App\Models\order;
 use App\Libraries\MyClass;
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $order=order::find($id);
    $order->replay_id=$_POST['user_id'];
    $order->reply=$_POST['reply'];
   
    $order->created_at=date("Y-m-d H:i:s");
    $order->updated_at=date("Y-m-d H:i:s");
    $order->updated_by=$_SESSION["userid"]??1;
    $order->status=2;
   
    $order->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Trả lời thành công']);
    header("location: index.php?option=order");
   }
?>