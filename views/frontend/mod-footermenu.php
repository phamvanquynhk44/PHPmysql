
<?php
            use App\Models\Menu;
            $arr_footer=[
                ['status','=', '1'],
                ['position','=', 'footermenu'],
            ];
            $list_menu_footer = Menu::where($arr_footer)
            ->get();

        ?>
<div class="container main">
                    <div class="text-f">
                        <H3>VỀ CHÚNG TÔI</H3>
                            <ul class="footermenu">
                            <?php foreach($list_menu_footer as $menu):?>            
                                <li><a href="<?=$menu['link'];?>"><?=$menu['name'];?></a></li>
                                <?php endforeach;?>
                            </ul>
                    </div>
                    <div class="f-email">
                      <input type="text" class="form-control" name="contact[email]" id="your_email" placeholder="Nhập email của bạn">
                      <span class="input-group-btn">
                        <button name="bt_submitemail" id="bt_submitemail" class="btn btn-default" type="submit">Đăng ký</button>
                      </span>
                  </div>
                </div>
              </div>
            </div>

		<div id="footer">
      </div>