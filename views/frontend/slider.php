<?php
use App\Models\slider;
$list_slider = slider::where([['status', '=', '1'],['position','=','slideshow']])
->orderBy('sort_order', 'asc')
->get();
?>
<div class="slideshow-container">

<?php foreach($list_slider as $slider):?>
<?php if($slider->status==1):?>
  <div class="mySlides fade">
    <a href="<?=$slider['link'];?>">
    <img src="./public/img/slider/<?=$slider['img'];?>" style="width:100%">
    </a>
  </div>
  <?php endif;?>
  <?php endforeach;?>
  
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
  
  </div>
 
  <br>
  
  <div style="text-align:center">
  <?php foreach($list_slider as $slider):?>
    <span class="dot" onclick="currentSlide(<?=$slider['sort_order'];?>)"></span> 
    <?php endforeach;?>
  </div>