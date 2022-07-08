<?php

/*
 * 主题相关操作
 * @author 友人a丶
 * @date 2022-07-08
 * */





/*
 * 主题选项
 * */
$documents = [];

/*
 * 输出主题选项
 * */
function documents($index)
{
    global $documents;
    echo $documents[$index];
}

/*
 * 加载主题选项
 * */
function reload()
{

    global $documents;

    $documents = [
        'document_subtitle' => get_option("document_subtitle"),//主题首页副标题
        'document_keywords' => get_option("document_keywords"), //主题关键字
        'document_description' => get_option("document_description"), //主题描述
        'document_logo_url' => get_option("document_logo_url"), //主题logo
        'document_icp' => get_option("document_icp"),//作者描述
        'document_author_nickname' => get_option("document_author_nickname"), //作者昵称
        'document_author_profession' => get_option("document_author_profession"), //作者职业
        'document_author_avatar' => get_option("document_author_avatar"),//作者logo
        'document_author_beijin' => get_option("document_author_beijin"), //插入页脚的内容
        'document_author_description' => get_option("document_author_description"),//作者描述
        'document_footer' => get_option("document_footer"), //插入页脚的内容
        'document_donate' => get_option("document_donate"), //赞赏
        'document_baidu' => get_option("document_baidu"), //百度站长推送
        'document_board' => get_option("document_board"), //留言页面链接
        'document_pages' => get_option("document_pages"), //文章聚合
    ];

}


/*
 * 主题激活
 * */
function switch_theme_self()
{

    /*
     * 相当于手动修改 菜单的显示选项
     * */
    update_user_meta(1, "managenav-menuscolumnshidden", ['xfn']); //显示菜单的所有属性


    /*
     * 更新主题选项
     * 只会在第一次的时候添加，之后都是false
     * */

    add_option("document_subtitle", '与你共享美好生活'); //主题首页副标题
    add_option("document_keywords", '学习笔记'); //主题关键字
    add_option("document_description", '一款类似文档的博客主题'); //主题描述
    add_option("document_logo_url", '/wp-content/themes/document/assets/images/logo.png'); //主题logo
    add_option("document_author_nickname", '友人a丶'); //作者昵称
    add_option("document_author_profession", 'PHPer'); //作者昵称
    add_option("document_author_beijin", '/wp-content/themes/document/assets/images/bg.jpg'); //作者卡片背景
    add_option("document_author_avatar", '/wp-content/themes/document/assets/images/avatars.jpg'); //作者logo
    add_option("document_author_description", '前端、PHPer，做更好的自己。'); //作者描述
    add_option("document_footer", '前端、PHPer，做更好的自己。'); //插入页脚的内容
    add_option("document_Gravatar", 'gravatar.loli.net/avatar'); //默认替换的gavatar源
    add_option("document_icp", 'ICP中国10086'); //ICP备案号
    add_option("document_donate", '/wp-content/themes/document/assets/images/avatar.png'); //赞赏码
    add_option("document_baidu", ''); //百度站长
    add_option("document_pages", ''); //文章聚合
    add_option("document_board", ''); //留言板

    reload();//刷新主题选项
}

/*
 * 主题启用关闭切换后，第一次加载触发的钩子
 * switch_theme
 * */
add_action('after_switch_theme', 'switch_theme_self');


/*
 * 后台加载初始化
 * */
function admin_init()
{

    //禁止Gutenberg编辑器
    add_filter('use_block_editor_for_post', '__return_false');
    //禁止新版小工具
    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
    add_filter( 'use_widgets_block_editor', '__return_false');

    remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');


    //判断用户是否有编辑文章和页面的权限
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    //判断用户是否使用可视化编辑器
    if (get_user_option('rich_editing') == 'true') {
        /*tinymce加载时引入插件的js*/
        add_filter('mce_external_plugins', function ($plugin_array) {
            /*
             * 引入插件的js
             * */
            $plugin_array['success'] = get_template_directory_uri() . '/common/plugins/success.js';/*指定要加载的插件*/
            $plugin_array['alert'] = get_template_directory_uri() . '/common/plugins/alert.js';/*指定要加载的插件*/
            $plugin_array['error'] = get_template_directory_uri() . '/common/plugins/error.js';/*指定要加载的插件*/
            $plugin_array['h1'] = get_template_directory_uri() . '/common/plugins/h1.js';/*指定要加载的插件*/
            $plugin_array['h2'] = get_template_directory_uri() . '/common/plugins/h2.js';/*指定要加载的插件*/
            $plugin_array['h3'] = get_template_directory_uri() . '/common/plugins/h3.js';/*指定要加载的插件*/
            $plugin_array['code'] = get_template_directory_uri() . '/common/plugins/code.js';/*指定要加载的插件*/
            $plugin_array['lightbox'] = get_template_directory_uri() . '/common/plugins/lightbox.js';/*指定要加载的插件*/
            $plugin_array['mark'] = get_template_directory_uri() . '/common/plugins/mark.js';/*指定要加载的插件*/

            return $plugin_array;
        });

        /*过滤 TinyMCE 按钮的第一行列表（Visual 选项卡）,在可视编辑器中注册一个按钮*/
        add_filter('mce_buttons', function ($buttons) {
            /*每一个按钮代表一个插件的类*/
            $buttons[] = 'success';
            $buttons[] = 'alert';
            $buttons[] = 'error';
            $buttons[] = 'h1';
            $buttons[] = 'h2';
            $buttons[] = 'h3';
            $buttons[] = 'code';
            $buttons[] = 'lightbox';
            $buttons[] = 'mark';

            return $buttons;
        });
    }

}

/*
 * 后台相关操作
 * 加载编辑器的小插件
 * 引入插件->wp注册插件->js加载插件
 * */
add_action('admin_init', 'admin_init');//启用经典编辑器，加载编辑器插件


/*
 * 后台编辑器加载样式
 * */
function admin_edit_load_style($mce_css)
{
    $url = get_template_directory_uri();//主题url
    if (!is_array($mce_css)) {
        $mce_css = explode(',', $mce_css);
    }
    $mce_css[] = $url . '/common/prism/prism.admin.css';

    return implode(',', $mce_css);
}


/*
 * 后台编辑器加载样式和脚本
 * */
add_filter('mce_css', 'admin_edit_load_style');


/*
 * 前台主题加载完之后相关的方法
 * */

function initialize()
{

    /*
     * 去除头部多余无用的东西
     * */
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles'); //内联样式
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);//dobate图标
    remove_action('wp_head', 'wp_generator'); //移除WordPress版本
    remove_action('wp_head', 'rsd_link'); //移除离线编辑器开放接口
    remove_action('wp_head', 'wlwmanifest_link'); //移除离线编辑器开放接口
    remove_action('wp_head', 'index_rel_link'); //去除本页唯一链接信息
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); //清除前后文信息
    remove_action('wp_head', 'start_post_rel_link', 10, 0); //清除前后文信息
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); //清除前后文信息
    remove_action('wp_head', 'feed_links', 2); //移除feed
    remove_action('wp_head', 'feed_links_extra', 3); //移除feed
    remove_action('wp_head', 'rest_output_link_wp_head', 10); //移除wp-json链
    remove_action('wp_head', 'print_emoji_detection_script', 7); //头部的JS代码
    //remove_action( 'wp_head', 'wp_print_styles', 8 ); //emoji载入css
    remove_action('wp_head', 'rel_canonical'); //rel=canonical
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); //rel=shortlink

    /*移除emjoy*/
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    /*移除文章内的embed内容*/
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');


    add_filter('wp_resource_hints', //移除WordPress头部加载DNS预获取（dns-prefetch）
        function ($hints, $relation_type) {
            if ('dns-prefetch' === $relation_type) {
                return array_diff(wp_dependencies_unique_hosts(), $hints);
            }

            return $hints;
        }, 10, 2); //头部加载DNS预获取（dns-prefetch）

}

/*
 * 后台初始化
 * */
add_action('admin_init', 'initialize');//去除无用的东西

/*
 * 去除底部信息
 * */
function remove_footer($text)
{
    $text = '';
    return $text;
}

/*
 * 删除WordPress后台底部版权信息、版本号
 * */
add_filter('update_footer', 'remove_footer', 11);
add_filter('admin_footer_text', 'remove_footer', 11);


/*
 * 外部文件加载
 * */
function load_source()
{

    $root = get_template_directory(); //主题路径
    $url = get_template_directory_uri();//主题url


    /*主题的JS*/

    wp_enqueue_script('jquerys', 'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery/3.6.0/jquery.min.js', false);
    wp_enqueue_script('enquire', 'https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/enquire.js/2.1.6/enquire.js', false);

    wp_enqueue_script('main', $url . '/common/main.min.js', array(), filemtime($root . '/common/main.min.js'), false);

    /*主题的style.css*/
    wp_enqueue_style('main-styles', get_stylesheet_uri(), array(), filemtime($root . '/style.css'));

    /*
     * 去除无用的css
     * */
    wp_dequeue_style('wp-block-library');

    /*
     * 文章加载的资源
     * */
    if (is_single()) {

        wp_enqueue_script('glightboxs', $url . '/common/glightbox/glightbox.min.js', array(), filemtime($root . '/common/glightbox/glightbox.min.js'), false);
        wp_enqueue_script('prism', $url . '/common/prism/prism.js', array(), filemtime($root . '/common/prism/prism.js'), false);

        wp_enqueue_style('prism', $url . '/common/prism/prism.css', array(), filemtime($root . '/common/prism/prism.css'));
        wp_enqueue_style('glightboxs', $url . '/common/glightbox/glightbox.min.css', array(), filemtime($root . '/common/glightbox/glightbox.min.css'));

    }


    /*
     * 页面加载的资源
     * */
    if (is_page()) {
        wp_enqueue_style('page', $url . '/assets/page/page.css', array(), filemtime($root . '/assets/page/page.css'));
    }


}

/*
 * 前台加载样式和脚本
 * */
add_action('wp_enqueue_scripts', 'load_source'); //加载前台资源文件


/*
 * 短标签处理
 * */
function init_shortcode()
{

    static $h1_count = 0;
    static $h2_count = 0;
    static $h3_count = 0;

    function h1($atts, $content = null, $code = "")
    {

        global $h1_count;
        $h1_count++;

        return '<h2 id="h2' . $h1_count . '">' . $content . '</h2>';
    }

    add_shortcode('h1', 'h1');

    function h2($atts, $content = null, $code = "")
    {

        global $h2_count;
        $h2_count++;

        return '<h3 id="h3' . $h2_count . '">' . $content . '</h3>';
    }

    add_shortcode('h2', 'h2');

    function h3($atts, $content = null, $code = "")
    {

        global $h3_count;
        $h3_count++;

        return '<h4 id="h4' . $h3_count . '">' . $content . '</h4>';
    }

    add_shortcode('h3', 'h3');

    function success($atts, $content = null, $code = "")
    {

        $content = do_shortcode($content);
        $title = do_shortcode($atts['title']);

        return '<div class="custom-container success">
    <div class="title">
     ' . $title . '
    </div>
    <div class="content">
      ' . $content . '
    </div>
</div>';
    }

    add_shortcode('success', 'success');

    function error($atts, $content = null, $code = "")
    {

        $content = do_shortcode($content);
        $title = do_shortcode($atts['title']);

        return '<div class="custom-container error">
    <div class="title">
     ' . $title . '
    </div>
    <div class="content">
      ' . $content . '
    </div>
</div>';
    }

    add_shortcode('error', 'error');

    function alerts($atts, $content = null, $code = "")
    {

        $content = do_shortcode($content);
        $title = do_shortcode($atts['title']);

        return '<div class="custom-container alert">
    <div class="title">
     ' . $title . '
    </div>
    <div class="content">
      ' . $content . '
    </div>
</div>';
    }

    add_shortcode('alert', 'alerts');

    function lightbox($atts, $content = null, $code = "")
    {
        $title = do_shortcode($atts['title']);

        if (strpos($content, 'class') === false) {
            $content = str_replace("<img", '<img class="glightbox"', $content);
        } else {
            $content = preg_replace("/class=\"(.*?)\"/", "class=\"$1 glightbox\"", $content);
        }

        return '<div class="container-image">
   		' . $content . '
    <div class="image-info"> ' . $title . '</div>
</div>';
    }

    add_shortcode('lightbox', 'lightbox');


    function mark($atts, $content = null, $code = "")
    {
        return '<code class="code">' . $content . '</code>';
    }

    add_shortcode('mark', 'mark');

}

/*
 * 主题初始化
 * */
add_action('after_setup_theme', 'initialize'); //去除博客无用代码
add_action('after_setup_theme', 'init_shortcode'); //新增短标签处理


/*
 * 替换Gravatar头像镜像站地址
 * */
function replace_https_avatar($avatar)
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
add_filter('get_avatar', 'replace_https_avatar');
add_filter('get_avatar_url', 'replace_https_avatar');


/*
 * 修改文字摘要字数
 * */
function article_excerpt_lengths($length)
{
    return 300;
}

/*修改文章摘要的数量*/
add_filter('excerpt_length', 'article_excerpt_lengths', 999);


/*
 * 添加后台可选的页面模板
 * */
function add_page_template($page_templates)
{
    $page_templates['template/page/posts.php'] = '文章聚合';
    $page_templates['template/page/board.php'] = '留言板';
    return $page_templates;
}

add_filter('theme_page_templates', 'add_page_template');
add_filter('theme_post_templates', 'add_page_template');



