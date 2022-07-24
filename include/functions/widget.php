<?php

/*
 * 引入小部件
 * */

include_once get_template_directory().'/include/class/Recent.php';//最新文章
include_once get_template_directory().'/include/class/Update.php';//最近更新
include_once get_template_directory().'/include/class/Info.php';//文章信息
include_once get_template_directory().'/include/class/Author.php';//作者信息
/*
 * 注册侧边栏
 * 注册侧边栏
 * */
function add_sidebar() {

    register_widget("Recent");
    register_widget("Update");
    register_widget("Info");
    register_widget("Author");

    register_sidebar( array(
        'name'          => '右侧边栏',
        'id'            => 'sidebar',
        'description'   => '站点侧边栏区域',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );

}

/*
 * 添加钩子
 * */
add_action( 'widgets_init', 'add_sidebar' );



