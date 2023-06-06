<?php
 use App\Models\Product;
 use App\Libraries\MyClass;
 use App\Libraries\Mystring;
 if(isset($_POST['THEM'])){
 $product=new Product();
 $product->name=$_POST['name'];
 $product->slug=Mystring::str_slug($_POST['name']);
 $product->category_id=$_POST['category_id'];
 $product->brand_id=$_POST['brand_id'];
 $product->detail=$_POST['detail'];
 $product->price=$_POST['price'];
 $product->price_sale=$_POST['price_sale'];
 $product->qty=$_POST['qty'];
 $product->metadesc=$_POST['metadesc'];
 $product->metakey=$_POST['metakey'];
 if(strlen($_FILES["img"]["name"])>0){
    $file=$_FILES["img"];
    $target_dir = "../public/img/product/";
    $target_file = $target_dir . basename($file["name"]);
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
        move_uploaded_file($file["tmp_name"],"../public/img/product/" . $_FILES["img"]["name"]);
        $product->img=$file["name"];

    }
 }
 $product->created_at=date("Y-m-d H:i:s");
 $product->created_by=$_SESSION["userid"]??1;
 $product->updated_at=date('y-m-d H:i:s');
 $product->updated_by=$_SESSION["userid"]??1;
 $product->status=$_POST['status'];

 $product->save();
 MyClass::set_flash('message',['type'=> 'success','msg'=>'Thêm thành công']);
 header("location: index.php?option=product");
}
if(isset($_POST['CAPNHAT'])){
    $id=$_POST['id'];
    $product=Product::find($id);
    $product->name=$_POST['name'];
    $product->slug=Mystring::str_slug($_POST['name']);
    $product->category_id=$_POST['category_id'];
    $product->brand_id=$_POST['brand_id'];
    $product->detail=$_POST['detail'];
    $product->price=$_POST['price'];
    $product->price_sale=$_POST['price_sale'];
    $product->qty=$_POST['qty'];
    $product->metadesc=$_POST['metadesc'];
    $product->metakey=$_POST['metakey'];
   
    if(strlen($_FILES["img"]["name"])>0){
       $file=$_FILES["img"];
       $target_dir = "../public/img/product/";
       $target_file = $target_dir . basename($file["name"]);
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       if(in_array($extension,['png','jpg','jpeg','webp','gif'])){
           move_uploaded_file($file["tmp_name"],"../public/img/product/" . $_FILES["img"]["name"]);
           $product->img=$file["name"];
   
       }
    }
    $product->created_at=date("Y-m-d H:i:s");
    $product->created_by=$_SESSION["userid"]??1;
    $product->updated_at=date("Y-m-d H:i:s");
    $product->updated_by=$_SESSION["userid"]??1;
    $product->status=$_POST['status'];
   
    $product->save();
    MyClass::set_flash('message',['type'=> 'success','msg'=>'Sửa thành công']);
    header("location: index.php?option=product");
   }
?>