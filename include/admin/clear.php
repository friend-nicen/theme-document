<?php

/**
 * 删除仪表盘模块
 */
function example_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;
	// 以下这一行代码将删除 "快速发布" 模块
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// 以下这一行代码将删除 "引入链接" 模块
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
	// 以下这一行代码将删除 "插件" 模块
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
	// 以下这一行代码将删除 "近期评论" 模块
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	// 以下这一行代码将删除 "近期草稿" 模块
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// 以下这一行代码将删除 "WordPress 开发日志" 模块
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	// 以下这一行代码将删除 "其它 WordPress 新闻" 模块
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );
	// 以下这一行代码将删除 "概况" 模块
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
}

add_action( 'wp_dashboard_setup', 'example_remove_dashboard_widgets' );
remove_action( 'welcome_panel', 'wp_welcome_panel' );


/**
 * wordpress删除仪表盘站点健康模块
 */
function remove_dashboard_meta() {
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );//3.8版开始
}

add_action( 'admin_init', 'remove_dashboard_meta' );


/**
 * wordpress删除仪表盘站点健康模块
 */
function remove_dashboard_siteHealth() {
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}

add_action( 'wp_dashboard_setup', 'remove_dashboard_siteHealth' );


/**
 * 保留文章的反斜杠
 */
$document_content_save_pre = 1; //次数

function keep_slash( $content ) {
	global $document_content_save_pre;
	if ( $document_content_save_pre > 1 ) {
		return $content;
	}
	$document_content_save_pre ++;

	return str_replace( "\\", '\\\\', $content );
}


global $post; //文章
$slash = isset( $_POST['nicen_slash'] ) ? sanitize_text_field( $_POST['nicen_slash'] ) : "";

if ( strpos( $_SERVER['SCRIPT_NAME'] ?? "", '/post' ) ) {
	if ( nicen_theme_config( 'document_switch_keep_slash', false ) || ( $slash ?: get_post_meta( $post->ID, 'nicen_slash', true ) ) ) {
		add_filter( 'content_save_pre', 'keep_slash' );
	}
}
