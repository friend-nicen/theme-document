<?php
/*
 * 初始化主题功能
 * */

/*
 * 前台主题加载完之后相关的方法
 * */
function nicen_theme_initialize() {

	/*
	 * 去除头部多余无用的东西
	 * */
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' ); //内联样式
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );//dobate图标
	remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
	remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
	remove_action( 'wp_head', 'wlwmanifest_link' ); //移除离线编辑器开放接口
	remove_action( 'wp_head', 'index_rel_link' ); //去除本页唯一链接信息
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); //清除前后文信息
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); //清除前后文信息
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); //清除前后文信息
	remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
	remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); //移除wp-json链
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //头部的JS代码
	//remove_action( 'wp_head', 'wp_print_styles', 8 ); //emoji载入css
	remove_action( 'wp_head', 'rel_canonical' ); //rel=canonical
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); //rel=shortlink

	/*移除emjoy*/
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	/*移除文章内的embed内容*/
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );


	add_filter( 'wp_resource_hints', //移除WordPress头部加载DNS预获取（dns-prefetch）
		function ( $hints, $relation_type ) {
			if ( 'dns-prefetch' === $relation_type ) {
				return array_diff( wp_dependencies_unique_hosts(), $hints );
			}

			return $hints;
		}, 10, 2 ); //头部加载DNS预获取（dns-prefetch）


}


/*
 * 修改url
 * */
function nicen_theme_modify_url() {

	global $wp_rewrite;
	$count = 0; //修改的数量

	if ( nicen_theme_config( "document_rewrite_author", false ) ) {
		$count ++;
		$wp_rewrite->author_base = nicen_theme_config( "document_rewrite_author_prefix", false );// 作者归档翻页前缀
	}

	if ( nicen_theme_config( "document_rewrite_search", false ) ) {
		$count ++;
		$wp_rewrite->search_base = nicen_theme_config( "document_rewrite_search_prefix", false );// 作者归档翻页前缀
	}

	if ( nicen_theme_config( "document_rewrite_page", false ) ) {
		$count ++;
		$wp_rewrite->pagination_base = nicen_theme_config( "document_rewrite_page_prefix", false );// 作者归档翻页前缀
	}

	if ( $count > 0 ) {
		$wp_rewrite->flush_rules();
	}

}

/*
 * 主题初始化
 * */
add_action( 'init', 'nicen_theme_modify_url' );
add_action( 'after_setup_theme', 'nicen_theme_initialize' ); //去除博客无用代码
add_action( 'admin_init', 'nicen_theme_initialize' );//去除后台无用的东西


/* 如果开启了时区校准 */
if ( nicen_theme_config( 'document_switch_adjust_date', false ) ) {
	date_default_timezone_set( get_option( 'timezone_string' ) ); //设置时区
}


/* 如果是管理员，直接忽略文章密码 */
if ( current_user_can( 'administrator' ) ) {
	add_filter( 'post_password_required', '__return_false' );
}


/**
 * @param $content
 * html解析模式下，给内容添加ID
 */
function nicen_theme_fit_html_cat_mode( $content ) {

	/* 如果显示文章目录 */
	if ( nicen_theme_showCatelog() ) {

		$header = [ 1, 1, 1 ]; //标题数量

		/* 正则 */
		$h   = "/\<h2[\s\S]*?\<\/h2\>|\<h3[\s\S]*?\<\/h3\>|\<h4[\s\S]*?\<\/h4\>/"; //匹配h1标题的正则
		$cat = [ 'h2', 'h3', 'h4' ]; //标签
		/* 替换内容，新增ID */

		return preg_replace_callback( $h, function ( $match ) use ( $cat, &$header ) {

			/* 标签匹配 */
			if ( strpos( $match[0], $cat[0] ) !== false ) {

				$content = str_replace( '<h2', "<h2 id='h2{$header[0]}' ", $match[0] );
				$header[0] ++;

			} else if ( strpos( $match[0], $cat[1] ) !== false ) {

				$content = str_replace( '<h3', "<h3 id='h3{$header[1]}' ", $match[0] );
				$header[1] ++;

			} else if ( strpos( $match[0], $cat[2] ) !== false ) {

				$content = str_replace( '<h4', "<h4 id='h4{$header[2]}' ", $match[0] );
				$header[2] ++;
			}

			return $content;

		}, $content );

	} else {
		return $content;
	}


}


/**
 * 是否需要显示文章目录
 * 是html模式
 */
if ( nicen_theme_config( "document_catelog_mode", false ) === 'html' ) {
	add_filter( 'the_content', 'nicen_theme_fit_html_cat_mode' );
}












