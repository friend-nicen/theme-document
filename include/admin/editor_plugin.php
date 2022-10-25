<?php


/*
 * 后台加载初始化
 * */
function nicen_theme_admin_init() {

	//禁止Gutenberg编辑器
	add_filter( 'use_block_editor_for_post', '__return_false' );
	//禁止新版小工具
	add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
	add_filter( 'use_widgets_block_editor', '__return_false' );

	remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );


	//不进行权限判断
	/*if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
		return;
	}*/



	//判断用户是否使用可视化编辑器
	if ( get_user_option( 'rich_editing' ) == 'true' ) {
		/*tinymce加载时引入插件的js*/
		add_filter( 'mce_external_plugins', function ( $plugin_array ) {
			/*
			 * 引入插件的js
			 * */
			$plugin_array['success']  = get_template_directory_uri() . '/common/plugins/success.js';/*指定要加载的插件*/
			$plugin_array['alert']    = get_template_directory_uri() . '/common/plugins/alert.js';/*指定要加载的插件*/
			$plugin_array['error']    = get_template_directory_uri() . '/common/plugins/error.js';/*指定要加载的插件*/
			$plugin_array['h1']       = get_template_directory_uri() . '/common/plugins/h1.js';/*指定要加载的插件*/
			$plugin_array['h2']       = get_template_directory_uri() . '/common/plugins/h2.js';/*指定要加载的插件*/
			$plugin_array['h3']       = get_template_directory_uri() . '/common/plugins/h3.js';/*指定要加载的插件*/
			$plugin_array['code']     = get_template_directory_uri() . '/common/plugins/code.js';/*指定要加载的插件*/
			$plugin_array['lightbox'] = get_template_directory_uri() . '/common/plugins/lightbox.js';/*指定要加载的插件*/
			$plugin_array['mark']     = get_template_directory_uri() . '/common/plugins/mark.js';/*指定要加载的插件*/
			$plugin_array['table']    = get_template_directory_uri() . '/common/plugins/table.js';/*指定要加载的插件*/
			$plugin_array['u']        = get_template_directory_uri() . '/common/plugins/u.js';/*指定要加载的插件*/


			return $plugin_array;
		} );


		/*add_filter( 'tiny_mce_plugins', function ( $plugins ) {
			$plugins[] = 'image';
			$plugins[] = 'directionality';
			return $plugins;
		} );*/


		/*过滤 TinyMCE 按钮的第一行列表（Visual 选项卡）,在可视编辑器中注册一个按钮*/
		add_filter( 'mce_buttons', function ( $buttons ) {
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
			$buttons[] = 'table';

			return $buttons;
		} );

		/*过滤 TinyMCE 按钮的第一行列表（Visual 选项卡）,在可视编辑器中注册一个按钮*/
		add_filter( 'mce_buttons_2', function ( $buttons ) {
			/*每一个按钮代表一个插件的类*/
			array_unshift( $buttons, 'u' );
			return $buttons;
		} );
	}

}

/*
 * 后台相关操作
 * 加载编辑器的小插件
 * 引入插件->wp注册插件->js加载插件
 * */
add_action( 'admin_init', 'nicen_theme_admin_init' );//启用经典编辑器，加载编辑器插件

