<?php


/*
 * @author 友人a丶
 * @date 2022-07-10
 * 覆盖、添加设置
 *
 * */

/*
 * 注册菜单
 * */
register_nav_menus( [ 'top-leval' => '顶部导航' ] );


/*
 * 关闭登陆后前台显示工具栏
 * */
show_admin_bar( false );
/*
 * 主题功能
 * */
add_theme_support( 'post-thumbnails' ); //开启主题缩略图
add_theme_support( 'menus' ); //开启主题菜单功能
add_theme_support( 'widgets' ); //开启自定义侧边栏
add_theme_support( 'widgets-block-editor' ); //开启自定义侧边栏
remove_filter( 'the_content', 'wptexturize' );  //关闭文章转义




