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
            $slug=$_REQUEST['slug'];
            $arr_page=[
                ['status','=', '1'],
                ['type','=', 'post'],
                ['slug','=', $slug]
            ];
            $row_post = post::where($arr_page)
            ->first();

            $arr_post_detail=[
                ['status','=', '1'],
                ['type','=', 'post'],
                ['topic_id','=',  $row_post->topic_id]
            ];
            $list_post = post::where($arr_post_detail)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();
        ?>

    <h1><?=$row_post->title;?></h1>
    <p><?=$row_post->detail;?></p>

    <?php if(count($list_post)>0):?>
    <h2>BÀI VIẾT KHÁC</h2>
    <ul class="footermenu">
        <?php foreach($list_post as $item):?>
            <li><a href="index.php?option=post&slug=<?= $item->slug?>"><?= $item->title?></a></li>
        <?php endforeach;?>
    </ul>
    <?php endif;?>

    <?php require_once('./views/frontend/mod-footermenu.php'); ?>