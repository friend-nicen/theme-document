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
remove_filter('the_content', 'wptexturize');  //关闭文章转义
reload(); //加载主题选项，获取主题需要的选项数据



