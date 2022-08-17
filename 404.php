<?php

/*
 * 404页面模板
 * @author 友人a丶
 * @date 2022-07-08
 * */


$url      = get_template_directory_uri();//主题url
$page_404 = $url . '/common/404/404.svg';
$page_css = $url . '/common/404/404.css';
?>
<!DOCTYPE html>
<html lang="zh-CN" data-mode="light">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>404未找到您要的资源</title>
    <meta name="renderer" content="webkit">
    <meta name="format-detection" content="email=no">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
    <meta name="keywords" content="404">
    <meta name="description" content="404">
    <link href="<?= $url; ?>/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
    <link rel='stylesheet' href='<?= $page_css; ?>' type='text/css'/>

</head>
<body>
<div class="joe_page_404">
    <div class="error">
        <img src="<?= $page_404; ?>" alt="404">
        <h3 class="title">“未找到您要的资源”</h3>
        <a href="/" class="error_link">回到主页</a>
    </div>
</div>

</body>
</html>