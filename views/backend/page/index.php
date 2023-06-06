
<?php require_once('../views/backend/header.php'); ?>
<?php 
  use App\Models\post;
  use App\Models\Topic;
  $list_post = post::where([['status','!=', '0'],['type','=', 'page']])
  ->orderBy('created_at', 'desc')
  ->get();

  $list_topic = Topic::where('status','!=', '0')
  ->orderBy('created_at', 'desc')
  ->get();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>QUẢN LÝ TRANG ĐƠN</h1>
          </div>
        </div>
        <div class="buttonC">

            <a href="index.php?option=page&cat=create"><button class="btn info">Thêm</button></a>
            <a href="index.php?option=page&cat=trash"><button class="btn danger">Thùng rác</button></a>       
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <br>
      <br>
      <?php require_once('../views/backend/message.php');?>
      
    <table id="customers">
  <tr>
    <th>Hình</th>
    <th>Tiêu đề trang đơn</th>
    <th>Chủ đề</th>
    <th>Ngày tạo</th>
    <th>Chức năng</th>
    <th>Id</th>
  </tr>

  <?php foreach($list_post as $item):?>
    <tr>
    <td class="img"><img src="../public/img/post/<?=$item['img'];?>" alt="anh"></td>
    <td><?=$item['title'];?></td>

    <td>
    <?php foreach($list_topic as $item1):?>
      <?php if($item1->id==$item->topic_id):?>
        <?=$item1['name'];?>
          <?php endif;?>
    <?php endforeach;?>
  </td> 

    <td><?=$item['created_at'];?></td>
    <td class="function">  
      <?php if($item->status==1):?>
        <a href="index.php?option=page&cat=status&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-toggle-on"></i></button></a>
        <?php else:?>
          <a href="index.php?option=page&cat=status&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-toggle-on"></i></button></a>
          <?php endif;?>
        <a href="index.php?option=page&cat=edit&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-edit"></i></button></a>
        <a href="index.php?option=page&cat=show&id=<?=$item['id'];?>"><button class="btn info"><i class="fas fa-eye"></i></button></a> 
        <a href="index.php?option=page&cat=delete&id=<?=$item['id'];?>"><button class="btn danger"><i class="fas fa-trash-alt"></i></button></a> 
    </td>
    <td><?=$item['id'];?></td>
  </tr>
  <?php endforeach;?>

  
</table>
    </section>
  </div>


<?php require_once('../views/backend/footer.php');
