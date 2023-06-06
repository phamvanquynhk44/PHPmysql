<?php require_once('./views/frontend/linkdata.php'); ?> 
<style>
  .footermenu{
    list-style: none;
  }
  .footermenu li a:hover{
    background-color: crimson;
    color:white;
  }
</style>
<?php require_once('./views/frontend/header.php'); ?> 
<?php require_once('./views/frontend/mod-mainmenu.php'); ?>
<?php
            use App\Models\post;

            use App\Models\Menu;
            $slug=$_REQUEST['cat'];
            $arr_page=[
                ['status','=', '1'],
                ['type','=', 'page'],
                ['slug','=', $slug]
            ];
            $row_post = post::where($arr_page)
            ->first();

            $arr_footer=[
                ['status','=', '1'],
                ['position','=', 'footermenu'],
            ];
            $list_menu_footer = Menu::where($arr_footer)
            ->get();

        ?>

    <h1><?=$row_post->title;?></h1>
    <p><?=$row_post->detail;?></p>


    <?php require_once('./views/frontend/mod-footermenu.php'); ?>


