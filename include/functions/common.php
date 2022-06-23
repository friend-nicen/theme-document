<?php
/*文章浏览次数+1*/
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/**
 * 获取文章浏览次数
 */
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return 0;
    }

    return $count;
}

/**
 * 文章点赞次数+1
 */
function setPostNice($postID)
{
    $count_key = 'post_nice_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/**
 * 获取作者点赞次数
 */
function getAuthorNice($author)
{
    $count_key = 'author_nice_count';
    $key = $author . '-author';
    $count = get_post_meta($key, $count_key, true);
    if ($count == '') {
        delete_post_meta($key, $count_key);
        add_post_meta($key, $count_key, '0');

        return 0;
    }

    return $count;
}


/**
 * 作者点赞次数+1
 */
function setAuthorNice($author)
{
    $count_key = 'author_nice_count';
    $key = $author . '-author';
    $count = get_post_meta($key, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($key, $count_key);
        add_post_meta($key, $count_key, '1');
    } else {
        $count++;
        update_post_meta($key, $count_key, $count);
    }
}


/**
 * 获取文章点赞次数
 */
function getPostNice($postID)
{
    $count_key = 'post_nice_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return 0;
    }

    return $count;
}


/**
 * 文章点赞次数+1
 */
function setPostBad($postID)
{
    $count_key = 'post_bad_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/**
 * 获取文章被踩的次数
 */
function getPostBad($postID)
{
    $count_key = 'post_bad_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return 0;
    }

    return $count;
}


/*
 * 根据文章内容生成侧边导航
 * */
function navigator($content)
{


    $h1_number = 1; //h1个数
    $h2_number = 1; //h2个数
    $h3_number = 1; //h3个数

    $h = "/\[h2\][\s\S]*?\[\/h2\]|\[h1\][\s\S]*?\[\/h1\]|\[h3\][\s\S]*?\[\/h3\]/"; //匹配h1标题的正则


    preg_match_all($h, $content, $match, PREG_OFFSET_CAPTURE);

    $replace = '';


    foreach ($match[0] as $item) {


        if (strpos($item[0], 'h1') !== false) {
            $temp = str_replace(['[h1]', '[/h1]'], ['', ''], $item[0]);
            $replace .= '<li>
							<div class="first-index">
								<div><a href="#h2' . $h1_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
            $h1_number++;
        } else if (strpos($item[0], 'h2') !== false) {
            $temp = str_replace(['[h2]', '[/h2]'], ['', ''], $item[0]);
            $replace .= '<li>
							<div class="secondary-index">
								<div><a href="#h3' . $h2_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
            $h2_number++;
        } else if (strpos($item[0], 'h3') !== false) {
            $temp = str_replace(['[h3]', '[/h3]'], ['', ''], $item[0]);
            $replace .= '<li>
							<div class="third-index">
								<div><a href="#h4' . $h3_number . '" title="' . $temp . '">' . $temp . '</a></div>
							</div>
						</li>';
            $h3_number++;
        }

    }

    return $replace;


}


/*
 * 处理文章摘要
 * */
function getExcerpt($content, $password)
{

    if ($password) {
        echo "这是一篇受保护的文章，输入密码后才能查看哈";
        return;
    }

    $content = strip_tags($content);//去除html
    $content = preg_replace("/\[[\s\S]*?\]/", "", $content); //去除短标签
    echo $content;
}


/*
 * 获取整站的所有链接
 * */
function getLinks()
{

    $links = []; //存储链接

    $links[] = get_home_url(); //首页

    query_posts("nopaging=true&posts_per_page=-1");

    while (have_posts()) {
        the_post();
        $links[] = get_the_permalink();
    }

    wp_reset_query();//重置文章指指针

    $pages = get_pages();

    foreach ($pages as $page) {
        $links[] = get_page_link($page->ID);
    }

    $terms = get_terms('category', 'orderby=name&hide_empty=0');

    if (count($terms) > 0) {
        foreach ($terms as $term) {
            $links[] = get_category_link($term->term_id);
        }
    }

    $tags = get_terms("post_tag");

    foreach ($tags as $tag) {
        $links[] = get_tag_link($tag->term_id);
    }

    return $links;

}

