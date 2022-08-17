<?php

/*
 * 全局顶部模板
 * @author 友人a丶
 * @date 2022-07-08
 * */

$url = get_template_directory_uri();//主题url

?>
<!DOCTYPE html>
<html lang="zh-cn" xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php title() ?></title>
<meta name="keywords" content="<?php documents( 'document_keywords' ); ?>"/>
<meta name="description" content="<?php description()  ?>"/>
<?php wp_head(); ?>
</head>
<body>
<!--顶部导航栏-->
<header class="main-header">
    <!--  顶部左侧标题 和 logo -->
    <div class="left">
        <img class="logo" src="<?php documents( 'document_logo_url' ); ?>" title="logo"/>
        <a href="/" title="回到首页"><h2 class="title tooltip" data-hint="<?php echo bloginfo( 'name' ); ?>"><?php echo bloginfo( 'name' ); ?> </h2></a>
    </div>
    <!--移动端展开导航栏-->
    <div class="daohang iconfont icon-daohangmoren"></div>
    <!--  右边导航栏  -->
    <div class="right">
        <!--  搜索图标  -->
        <div class="search-icon iconfont icon-sousuo"></div>
        <!--  搜索框  -->
        <input id="search" class="search" type="text" placeholder="输入关键词回车搜索"/>
        <!--菜单栏-->
		<?php get_template_part( 'template/index/nav_menu' ); ?>
    </div>
</header>
