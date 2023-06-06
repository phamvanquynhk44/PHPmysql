
<?php
use App\Models\Menu;
use App\Models\Category;
$arg_mainmenu=[
  ['status', '=', '1'],
  ['position','=','mainmenu'],
  ['parent_id','=','0']
];
$list_menu = Menu::where($arg_mainmenu)
->orderBy('sort_order', 'asc')
->get();

$list_menu_all = Menu::where('status', '=', '1')
->orderBy('sort_order', 'asc')
->get();


$arg_category=[
  ['status', '=', '1'],
  ['parent_id','=','0']
];
$list_category = Category::where($arg_category)
->orderBy('sort_order', 'asc')
->get();

$list_category_all = Category::where('status', '=', '1')
->orderBy('sort_order', 'asc')
->get();
?>

<div class="navbar">
<div class="menu-img">
              </div>
<?php foreach($list_menu as $menu):?>
<?php if($menu->status==1):?>
              <div class="dropdown">
                <a href="<?= $menu->link?>"> <?= $menu->name?> </a> 
                
              </div> 
  <?php endif;?>
  <?php endforeach;?>

                             <?php foreach($list_category as $category):?>
                                <?php if($category->status==1):?>
                        <div class="dropdown">
                          <button class="dropbtn"> <?= $category->name?>
                            <i class="fa fa-caret-down"></i>
                          </button>
                          <div class="dropdown-content"> 
                            <div class="row">
                              <div class="column">       
                                <?php foreach($list_category_all as $category_all):?>
                                  <?php if($category_all->parent_id==$category->id):?>
                                    <?php
                                      $list_category1 = Category::where([['status', '=', '1'],['parent_id','=',$category_all->id]])
                                      ->orderBy('sort_order', 'asc')
                                      ->get();
                                    ?>
                                    
                                    <h3><?= $category_all->name?></h3>
                                    <?php foreach($list_category1 as $category1):?>
                                    <a href="index.php?option=product&cat=<?= $category1->slug?>"><?= $category1->name?></a>
                                    <?php endforeach;?>

                                  <?php endif;?>
                                  <?php endforeach;?>

                              </div>
                            </div>
                          </div>
                        </div> 
                        <?php endif;?>
                      <?php endforeach;?>

            </div>
          </div>
        </div>
      </div>

