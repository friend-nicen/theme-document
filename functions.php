<?php

/*
 *
 * 主题初始化
 * @author 友人a丶
 * @date 2022-06-06
 * @life，加油
 *
 *
 * */


/*
 * 加载一些通用方法
 * */
include_once get_template_directory().'/include/functions/common.php'; //浏览量，访问量


/*
 * 处理前端ajax请求
 * */
include_once get_template_directory().'/include/functions/response.php'; //浏览量，访问量



/*
 * 继续加载
 * */
include_once get_template_directory().'/include/functions/theme.php'; //主题钩子
include_once get_template_directory().'/include/class/NewWalker.php';//自定义菜单输出
include_once get_template_directory().'/include/class/CommentsWalker.php';//自定义评论输出
include_once get_template_directory().'/template/admin/setting.php';//自定义后台



/*
 * 注册菜单
 * */
register_nav_menus(['top-leval' => '顶部导航' ]);

/*
 * 关闭登陆后前台显示工具栏
 * */
show_admin_bar( false );

/*
 * 主题功能
 * */
add_theme_support( 'post-thumbnails'); //开启主题缩略图
add_theme_support( 'menus'); //开启主题菜单功能
add_theme_support( 'widgets'); //开启自定义侧边栏
add_theme_support( 'widgets-block-editor'); //开启自定义侧边栏


/*
 * 删除WordPress后台底部版权信息
 * */
add_filter('update_footer', 'remove_footer', 11);
/*
 * 删除WordPress后台版本号信息
 * */
add_filter('admin_footer_text', 'remove_footer');

reload(); //加载主题选项


/*
 * 主题启用关闭切换后，第一次加载触发的钩子
 * switch_theme
 * */
add_action( 'after_switch_theme', 'switch_theme_self');
/*
 * 后台相关操作
 * 加载编辑器的小插件
 * 引入插件->wp注册插件->js加载插件
 * */
add_action( 'admin_init','admin_init');//启用经典编辑器，加载编辑器插件
add_action( 'admin_init','initialize');//去除无用的东西
/*
 * 前台加载样式和脚本
 * */
add_action( 'wp_enqueue_scripts','load_source'); //加载前台资源文件
/*
 * 主题初始化
 * */
add_action( 'after_setup_theme', 'initialize'); //去除博客无用代码
add_action( 'after_setup_theme', 'init_shortcode'); //新增短标签处理
/*
 * 替换Gravatar镜像站地址
 * */
add_filter('get_avatar', 'replace_https_avatar');
add_filter('get_avatar_url', 'replace_https_avatar');


/*
 * 后台编辑器加载样式和脚本
 * */
add_filter( 'mce_css', 'admin_edit_load_style');
