<?php

/*
 * 文章顶部面包屑
 * @author 友人a丶
 * @date 2022-07-08
 * */


/*
 * 是否有目录
 * */
if (empty(get_the_category())) {
    $no_category = true;
} else {
    $category = get_the_category()[0]->cat_name;//目录名
    $tags = get_the_tags()[0]->name;//目录名
    $no_category = false;
}

/*
 * 是否有标签
 * */
if (empty(get_the_tags())) {
    $no_tag = true;
} else {
    $link = get_category_link(get_the_category()[0]->term_id);//目录地址
    $linkTag = get_term_link(get_the_tags()[0]->term_id);//目录地址
    $no_tag = false;
}


?>
<div class="breadcrumb">
    现在位置: <a href="/" title="首页">首页</a>
    <?php if (!$no_category) { ?>
        &gt;
        <a href="<?= $link ?>" title=" <?= $category; ?>"> <?= $category; ?></a>
    <?php }
    if (!$no_tag) { ?>
        &gt;
        <a href="<?= $linkTag ?>" title=" <?= $tags; ?>"> <?= $tags; ?></a>
    <?php } ?>
    &gt; 正文
</div>
