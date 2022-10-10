<?php




/*
 * 替换Gravatar头像镜像站地址
 * */
function nicen_theme_replace_https_avatar($avatar)
{
	
    $Image = get_option('document_Gravatar');
    //~ 替换为 https 的域名
    $avatar = str_replace(array(
        'secure.gravatar.com/avatar',
        "www.gravatar.com/avatar",
        "0.gravatar.com/avatar",
        "1.gravatar.com/avatar",
        "2.gravatar.com/avatar"
    ), $Image, $avatar);
    //~ 替换为 https 协议
    $avatar = str_replace("http://", "https://", $avatar);

    return $avatar;
}

/*
 * 替换Gravatar镜像站地址
 * */
add_filter('get_avatar', 'nicen_theme_replace_https_avatar');
add_filter('get_avatar_url', 'nicen_theme_replace_https_avatar');


/*
 * 修改文字摘要字数
 * */
function nicen_theme_article_excerpt_lengths($length)
{
    return nicen_theme_config('document_index_excerpt_number', false);
}


/*修改文章摘要的数量*/
add_filter('excerpt_length', 'nicen_theme_article_excerpt_lengths', 999);


