<?php


/*
 * 外部文件加载
 * */
function nicen_theme_load_source() {


	$root = get_template_directory(); //主题路径
	$url  = get_template_directory_uri();//主题url

	/* 底部推荐区域 */
	if ( is_active_sidebar( 'content_down' ) ) {
		wp_enqueue_script( 'swiper', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/Swiper/8.0.6/swiper-bundle.js', false );
		wp_enqueue_style( 'swiper-styles', 'https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/Swiper/8.0.6/swiper-bundle.css' );
	}


	/*主题的JS*/
	wp_enqueue_script( 'jquerys', 'https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery/3.6.0/jquery.min.js', false );
	wp_enqueue_script( 'enquire', 'https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/enquire.js/2.1.6/enquire.js', false );


	wp_enqueue_script( 'main-sub', $url . '/common/inline/main.js', array(), filemtime( $root . '/common/inline/main.js' ), false );

	wp_enqueue_script( 'main', $url . '/common/main.js', array(), filemtime( $root . '/common/main.js' ), false );


	/*主题的style.css*/
	wp_enqueue_style( 'main-styles', get_stylesheet_uri(), array(), filemtime( $root . '/style.css' ) );

	/*
	 * 去除无用的css
	 * */
	wp_dequeue_style( 'wp-block-library' );


	/*
	 * 是否显示文章目录
	 * */
	if ( is_single() ) {
		if ( nicen_theme_config( "document_single_show_catalog", false ) ) {
			wp_enqueue_script( 'main-monitor', $url . '/common/inline/monitor.js', array(), filemtime( $root . '/common/inline/monitor.js' ), false );
		}
		if ( is_active_sidebar( 'content_down' ) ) {
			wp_enqueue_script( 'page-swiper', $url . '/common/inline/swiper.js', array(), filemtime( $root . '/common/inline/swiper.js' ), false );
		}
	}


	if ( is_home() ) {
		if ( nicen_theme_config( "document_show_left_nav", false ) ) {
			wp_enqueue_script( 'main-monitor', $url . '/common/inline/monitor.js', array(), filemtime( $root . '/common/inline/monitor.js' ), false );
		}
	}
	if ( is_category() || is_tag() || is_search() ) {
		if ( nicen_theme_config( "document_show_else_left_nav", false ) ) {
			wp_enqueue_script( 'main-monitor', $url . '/common/inline/monitor.js', array(), filemtime( $root . '/common/inline/monitor.js' ), false );
		}
	}
	/*
	 * 文章页面加载的资源
	 * */
	if ( is_single() ) {

		wp_enqueue_script( 'glightboxs', $url . '/common/glightbox/glightbox.min.js', array(), filemtime( $root . '/common/glightbox/glightbox.min.js' ), false );
		wp_enqueue_script( 'prism', $url . '/common/prism/prism.js', array(), filemtime( $root . '/common/prism/prism.js' ), false );
		wp_enqueue_style( 'prism', $url . '/common/prism/prism.css', array(), filemtime( $root . '/common/prism/prism.css' ) );
		wp_enqueue_style( 'glightboxs', $url . '/common/glightbox/glightbox.min.css', array(), filemtime( $root . '/common/glightbox/glightbox.min.css' ) );
	}


	/*
	 * 主页轮播相关资源加载
	 * */
	if ( is_home() ) {
		wp_enqueue_style( 'swiper_self', $url . '/common/swiper/swiper.css', array(), filemtime( $root . '/common/swiper/swiper.css' ) );
		wp_enqueue_script( 'swiper_self', $url . '/common/swiper/swiper.js', array(), filemtime( $root . '/common/swiper/swiper.js' ), true );
		wp_enqueue_script( 'swiper', 'https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/Swiper/8.0.3/swiper-bundle.min.js', false );
		wp_enqueue_style( 'swiper', 'https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/Swiper/8.0.3/swiper-bundle.css', array() );
		/*
		 * 内联的js代码
		 * */
		wp_add_inline_script( "main", vsprintf( 'const DYNAMIC=%s;const IN_HOME=true;', [ nicen_theme_config( 'document_dynamic', false ) ] ), 'before' );

	} else {
		wp_add_inline_script( "main", 'const DYNAMIC=false;const IN_HOME=false;', 'before' );
	}


	/*
	 * 文章ID
	 * */
	if ( is_singular() ) {

		wp_enqueue_script( 'main-emoji', $url . '/common/inline/emoji.js', array(), filemtime( $root . '/common/inline/emoji.js' ), false );

		/*
		 * 内联的js
		 * */
		wp_add_inline_script( "main-sub", preg_replace( '/\s/', '', vsprintf( '
			window.Current = "%s";'
			, [ get_the_ID() ] ) ), 'before' );
	} else {
		wp_enqueue_script( 'main-index', $url . '/common/inline/index.js', array( 'main' ), filemtime( $root . '/common/inline/index.js' ), false );
		/*
		 * 内联的js代码
		 * */
		wp_add_inline_script( "main-index", vsprintf( 'const Auto_load_index=%s;const Auto_load_else=%s;', [
			nicen_theme_config( 'document_paginate_auto_load_index', false ),
			nicen_theme_config( 'document_paginate_auto_load_else', false )
		] ), 'before' );

	}

	/*
	 * 内联的js
	 * */
	wp_add_inline_script( "main-sub", preg_replace( '/\s/', '', vsprintf( '
			window.ROOT = "%s";
			window.HOME = "%s";'
		, [ $url, home_url() ] ) ), 'before' );

	/*
	 * 内联的css
	 * */
	wp_add_inline_style( "main-styles", vsprintf( '.personal{--theme-color:%s;--theme-header-bg-color:%s;--theme-header-font-color:%s;--theme-sub-menu-bg-color:%s;--theme-sub-menu-font-color:%s;--theme-header-border-color:%s;--theme-header-shadow-color:%s;--theme-footer-bg-color: %s;--theme-footer-font-color: %s;}',
		[
			nicen_theme_config( 'document_theme_color', false ),
			nicen_theme_config( 'document_header_bg_color', false ),
			nicen_theme_config( 'document_header_font_color', false ),
			nicen_theme_config( 'document_sub_menu_bg_color', false ),
			nicen_theme_config( 'document_sub_menu_font_color', false ),
			nicen_theme_config( 'document_header_border_color', false ),
			nicen_theme_config( 'document_header_shadow_color', false ),
			nicen_theme_config( 'document_footer_bg_color', false ),
			nicen_theme_config( 'document_footer_font_color', false ),
		] ) );


	/*
	 * 动态加载页面资源
	 *
	 */

	$template = get_page_template_slug( get_queried_object_id() );
	foreach ( PAGES as $key => $value ) {

		/*
		 * 判断当前页面是不是指定的模板
		 * */
		if ( strpos( $template, $value['template'] ) === false ) {
			continue;
		}

		/*
		 * 是否有样式依赖
		 * */
		if ( isset( $value['dependent']['styles'] ) ) {

			foreach ( $value['dependent']['styles'] as $style ) {

				/*
				 * 如果不是外部文件
				 * */
				if ( strpos( $style, 'http' ) === false ) {
					wp_enqueue_style( $key, $url . $style, array() );
				} else {
					wp_enqueue_style( $key, $style, array() );
				}
			}
		}

		/*
		 * 是否有脚本依赖
		 * */
		if ( isset( $value['dependent']['scripts'] ) ) {
			foreach ( $value['dependent']['scripts'] as $script ) {
				/*
				 * 如果不是外部文件
				 * */
				if ( strpos( $style, 'http' ) === false ) {
					wp_enqueue_script( $key, $url . $script, array() );
				} else {
					wp_enqueue_script( $key, $script, array() );
				}
			}
		}
	}

}

/*
 * 前台加载样式和脚本
 * */
add_action( 'wp_enqueue_scripts', 'nicen_theme_load_source' ); //加载前台资源文件


