<?php
 use App\Models\contact;
 use App\Libraries\MyClass;
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $contact=contact::find($id);
    $contact->replay_id=$_POST['user_id'];
    $contact->reply=$_POST['reply'];
   
    $contact->created_at=date("Y-m-d H:i:s");
    $contact->updated_at=date("Y-m-d H:i:s");
    $contact->updated_by=$_SESSION["userid"]??1;
    $contact->status=2;
   
    $contact->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Trả lời thành công']);
    header("location: index.php?option=contact");
   }
?>