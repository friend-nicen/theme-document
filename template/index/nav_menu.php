<?php

/*
 * 顶部导航栏模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


?>

<?php
/*
 * 判断菜单是否已经被分配，分配则显示菜单
 * */
if ( has_nav_menu( 'top-leval' ) ) {
	wp_nav_menu( [
		'theme_location' => 'top-leval',
		'menu_class'     => 'menu',
		'container'      => 'ul',
		'items_wrap'     => '<ul id="%1$s" class="%2$s"> <li class="menu-item read-mode"><i class="iconfont icon-baitian-qing"></i></li>%3$s</ul>',
		'walker'         => ( new Walker_Nav_Menu() )
	] );
}
?>
