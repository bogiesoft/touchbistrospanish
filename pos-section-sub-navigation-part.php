<?php
global $section_no;
$sub_menu_items = TbHtmlHelper::getPosSubMenuItems();
?>
<section class="section-sub-navigation">
	<div class="container">
		<ul class="nav">
			<?php $x = count($sub_menu_items);
			$num = $x - 1;
			$i = 0;
			?>
			<?php foreach ($sub_menu_items as $key => $menu_item) : ?>
				<?php $class_active = ($section_no == $key) ? 'active' : ''; ?>
				<?php
				$i = $i + 1;
				if ($i == 2) {

				$position = 'leftmost';
			} else if ($i == $num){
				$position = 'rightmost';
			} else if ($i == $x){
				$position = 'lastchild fadeoutright';
			} else if ($i == 1){
				$position = 'firstchild';
			}else {
				$position = '';
			}?>

				<?php $section_id = TbHelper::convertSubNaviMenuId($menu_item); ?>
				<li class="<?php echo $position; ?>"><a href="#<?php echo $section_id; ?>" class="<?php echo $class_active; ?>"><?php echo $menu_item; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<script>
	jQuery(function(){
		var $j = jQuery;
		$j('.section-sub-navigation ul li a').on('click', function(){
			var speed = 400;
			var href =  $j(this).attr('href');
			var target = $j(href == '#' || href == "" ? 'html' : href);
			var position = target.offset().top;
			$j('body, html').animate({scrollTop:position}, speed, 'swing');



			return false;
		});
	});

	jQuery('.section-sub-navigation').affix({
	   	offset: {
	   		//2773
	        //top: jQuery('.section-sub-navigation').offset().top,
			top: jQuery('.section-sub-navigation').parent().offset().top,
			
	    }
	});
	//console.log('section-sub-navigation offset: ' + jQuery('.section-sub-navigation').offset().top);
	//console.log('parent offset: ' + jQuery('.section-sub-navigation').parent().offset().top);
	

	//jQuery('body').scrollspy({target: ".section-sub-navigation", offset: 500 });
	jQuery('body').scrollspy({target: ".section-sub-navigation" });


	jQuery('.section-sub-navigation').on('activate.bs.scrollspy', function () {
  // do something…

		if (jQuery('.section-sub-navigation ul .active').hasClass('leftmost')){
			jQuery('.section-sub-navigation ul').animate({scrollLeft:0}, 400, 'swing');
			jQuery('.lastchild').addClass('fadeoutright');
			jQuery('.firstchild').removeClass('fadeoutleft');


		}

		if (jQuery('.section-sub-navigation ul .active').hasClass('rightmost')){
			jQuery('.section-sub-navigation ul').animate({scrollLeft:1500}, 400, 'swing');
			jQuery('.firstchild').addClass('fadeoutleft');
			jQuery('.lastchild').removeClass('fadeoutright');

		}
		if (jQuery('.section-sub-navigation ul .active').hasClass('fadeoutleft')){
			jQuery('.section-sub-navigation ul .active').removeClass('fadeoutleft');
		}

		if (jQuery('.section-sub-navigation ul .active').hasClass('fadeoutright')){
			jQuery('.section-sub-navigation ul .active').removeClass('fadeoutright');
		}

})
var scrollOffset = 120;
if (jQuery('.pos-quick-service-hero').length){
	scrollOffset = 0;
}

jQuery(window).scroll(function () {
	if (jQuery(window).width() > 1024) {
			jQuery('.section-sub-navigation').data('bs.affix').options.offset.top = jQuery('.section-sub-navigation').parent().offset().top + scrollOffset;
	}

    
});
</script>
