<?php

/*
 * 后台编辑器加载样式
 * */

function nicen_theme_admin_edit_load_style( $mce_css ) {
    $url = get_template_directory_uri();//主题url
    if ( ! is_array( $mce_css ) ) {
        $mce_css = explode( ',', $mce_css );
    }
    $mce_css[] = $url . '/common/prism/prism.admin.css';

    return implode( ',', $mce_css );
}


/*
 * 后台编辑器加载样式和脚本
 * */
add_filter( 'mce_css', 'nicen_theme_admin_edit_load_style' );

/*
 * 去除底部信息
 * */
function remove_footer( $text ) {
    $text = '';

    return $text;
}

/*
 * 删除WordPress后台底部版权信息、版本号
 * */
add_filter( 'update_footer', 'remove_footer', 11 );
add_filter( 'admin_footer_text', 'remove_footer', 11 );


/*
 * 添加后台可选的页面模板
 * */
function register_page_template( $page_templates ) {

    $path=get_template_directory(); //获取主题目录

    /*
     * 遍历所有页面模板
     * */
    foreach (PAGES as $key=>$value){
        /*
         * 判断模板文件是否存在
         * */
        if(empty($value['template'])){
            continue;
        }

        /*
         * 判断模板文件是否存在
         * */
        if(!file_exists($path.'/'.$value['template'])){
            continue;
        }

        /*
         * 注册
         * */
        $page_templates[$value['template']] = $key;
    }


    return $page_templates;
}

/*页面模板*/
add_filter( 'theme_page_templates', 'register_page_template' );
/*文章模板*/
/*add_filter( 'theme_post_templates', 'register_page_template' );*/


