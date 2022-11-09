<?php

/*
 * 引入小部件
 * */
include_once get_template_directory() . '/include/widget/common.php';//随机文章
include_once get_template_directory() . '/include/widget/components/Rand.php';//随机文章
include_once get_template_directory() . '/include/widget/components/Swiper.php';//轮播
include_once get_template_directory() . '/include/widget/components/Info.php';//文章信息
include_once get_template_directory() . '/include/widget/components/Author.php';//作者信息
include_once get_template_directory() . '/include/widget/components/NewComments.php';//作者信息
/*
 * 注册侧边栏
 * */
function nicen_theme_add_sidebar() {


	/*
	 * 注册小工具
	 * */
	register_widget( "Rand" );
	register_widget( "Swiper" );
	register_widget( "Info" );
	register_widget( "Author" );
	register_widget( "NewComments" );

	/*
	 * 注册部件位置
	 * */
	register_sidebar( array(
		'name'         => '右侧边栏',
		'id'           => 'sidebar',
		'description'  => '站点侧边栏区域',
		'before_title' => '<h2>',
		'after_title'  => '</h2>',
	) );

	/*
	 * 注册部件位置
	 * */
	register_sidebar( array(
		'name'         => '首页顶部',
		'id'           => 'index',
		'description'  => '首页顶部区域',
		'before_title' => '<h2>',
		'after_title'  => '</h2>',
	) );
}

/*
 * 添加钩子
 * */
add_action( 'widgets_init', 'nicen_theme_add_sidebar' );




