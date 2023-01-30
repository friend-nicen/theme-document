<?php

/*
 * 引入小部件
 * */
include_once get_template_directory() . '/include/widget/common.php';//随机文章
include_once get_template_directory() . '/include/widget/components/Rand.php';//随机文章
include_once get_template_directory() . '/include/widget/components/Swiper.php';//轮播
include_once get_template_directory() . '/include/widget/components/Info.php';//文章信息
include_once get_template_directory() . '/include/widget/components/Author.php';//作者信息
include_once get_template_directory() . '/include/widget/components/Comments.php';//最新评论
include_once get_template_directory() . '/include/widget/components/Recommend.php';//最新评论

/*
 * 注册侧边栏
 * */
function nicen_theme_add_sidebar()
{


    /*
     * 注册小工具
     * */
    register_widget("Rand");
    register_widget("Swiper");
    register_widget("Info");
    register_widget("Author");
    register_widget("Comments");
    register_widget("Recommend");

    //禁用默认自带小工具
    unregister_widget('WP_Widget_Archives');          //年份文章归档
    unregister_widget('WP_Widget_Calendar');          //日历
    unregister_widget('WP_Widget_Categories');        //分类列表
    unregister_widget('WP_Widget_Links');             //链接
    unregister_widget('WP_Widget_Media_Audio');       //音乐
    unregister_widget('WP_Widget_Media_Video');       //视频
    unregister_widget('WP_Widget_Media_Gallery');     //相册
    //unregister_widget( 'WP_Widget_Custom_HTML' );     //html
    //unregister_widget( 'WP_Widget_Media_Image' );     //图片
    //unregister_widget( 'WP_Widget_Text' );            //文本
    unregister_widget('WP_Widget_Meta');              //默认工具链接
    unregister_widget('WP_Widget_Pages');             //页面
    unregister_widget('WP_Widget_Recent_Comments');   //自带的丑丑的评论
    unregister_widget( 'WP_Widget_Recent_Posts' );      //文章列表
    unregister_widget('WP_Widget_RSS');               //RSS订阅
    unregister_widget( 'WP_Widget_Search' );          //搜索
    unregister_widget('WP_Widget_Tag_Cloud');         //自带的丑丑的标签云
    unregister_widget('WP_Nav_Menu_Widget');          //菜单


    /*
     * 注册部件位置
     * */
    register_sidebar(array(
        'name' => '首页顶部',
        'id' => 'index',
        'description' => '首页顶部区域',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    /*
     * 注册部件位置
     * */
    register_sidebar(array(
        'name' => '首页侧边栏',
        'id' => 'index_sidebar',
        'description' => '首页、栏目、标签页面的侧边栏区域',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


    /*
     * 注册部件位置
     * */
    register_sidebar(array(
        'name' => '文章下方区域',
        'id' => 'content_down',
        'description' => '文章下方区域',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


    /*
     * 注册部件位置
     * */
    register_sidebar(array(
        'name' => '内容页右侧边栏',
        'id' => 'content_sidebar',
        'description' => '文章、页面的右侧边栏区域',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));


}

/*
 * 添加钩子
 * */
add_action('widgets_init', 'nicen_theme_add_sidebar');




