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

	$args = [
		'theme_location' => 'top-leval',
		'menu_class'     => 'menu',
		'container'      => 'ul',
		'walker'         => ( new Walker_Nav_Menu() )
	];


	/* 是否显示白天黑夜模式切换 */
	if ( nicen_theme_config( 'document_header_show_readmode', false ) ) {
		$args['items_wrap'] = '<ul id="%1$s" class="%2$s"><li class="menu-item read-mode"><i class="iconfont icon-baitian-qing"></i></li>%3$s</ul>';
	} else {
		$args['items_wrap'] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
	}

	wp_nav_menu($args);
}
?>
