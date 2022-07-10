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
 * 加载小部件
 * */
include_once get_template_directory().'/include/functions/widget.php';

/*
 * 加载smtp
 * */
include_once get_template_directory().'/include/functions/smtp.php';

/*
 * 覆盖wordpress默认设置
 * */
include_once get_template_directory().'/include/functions/initialize.php';