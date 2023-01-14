<?php

/*
 * @author 友人a丶
 * @date 2022-08-14
 * 主题前台设置
 * 主题后台设置
 *
 * 所有表单本质都可以看做类似json的配置结构
 * */


/*
 * 已定义的表单组件
 * nicen_theme_form_input
 * nicen_theme_form_number
 * nicen_theme_form_password
 * nicen_theme_form_textarea
 * nicen_theme_form_select  @option 数组或者回调函数代表选项
 * nicen_theme_form_switch
 * nicen_theme_form_color
 * */

/*
 * 后台所有表单
 *
 * 初始化函数在admin/setting.php
 *
 * document_menu_register ,初始化菜单
 * document_config_register，表单初始化
 *
 * 初始化函数在admin/admin.php
 *
 * do_settings_sections_user ,初始化分节
 * do_settings_fields_user，初始化所有输入组件
 *
 * */

/*
 * 主题版本
 * */
const DOCUMENT_VERSION = "1.2.5";

const ADMIN = [
	/*菜单设置*/
	[
		"id"         => "document_theme",//主题后台设置字段
		"menu_title" => '主题选项',
		'page_title' => '主题设置',
		'callback'   => 'nicen_theme_setting_load',
		'capablity'  => 'manage_options',
		/*分节*/
		"sections"   => [
			[
				"id"     => "document_theme_section",
				'title'  => '基础设置',
				'fields' => [
					[
						'id'       => 'H1_title',
						'title'    => '主题配置',
						'callback' => 'nicen_theme_form_title',
						'args'     => []
					],
					[
						'id'       => 'document_theme_color',
						'title'    => '主题主要颜色',
						'callback' => 'nicen_theme_form_color',
					],
					[
						'id'       => 'document_switch_theme',
						'title'    => '显示主题调色板',
						'callback' => 'nicen_theme_form_switch',
					],

					[
						'id'       => 'document_Gravatar',
						'title'    => 'Gravatar镜像服务器',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => 'V2EX',
									'value' => 'cdn.v2ex.com/gravatar'
								],
								[
									'label' => 'loli',
									'value' => 'gravatar.loli.net/avatar'
								],
								[
									'label' => 'Cravatar',
									'value' => 'cravatar.cn/avatar'
								]
							]
						]
					],

					[
						'id'       => 'document_thumbnail_position',
						'title'    => '缩略图显示位置',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => '文章列表右侧',
									'value' => 'right'
								],
								[
									'label' => '文章列表左侧',
									'value' => 'left'
								]
							]
						]
					],
					[
						'id'       => 'H1_title',
						'title'    => '文章设置',
						'callback' => 'nicen_theme_form_title',
						'args'     => []
					],
					[
						'id'       => 'document_index_excerpt_number',
						'title'    => '文章摘要字数',
						'callback' => 'nicen_theme_form_number',
					],
					[
						'id'       => 'document_thumbnail',
						'title'    => '显示文章列表缩略图',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => '不显示缩略图',
									'value' => '0'
								],
								[
									'label' => '有缩略图的显示，没有就不显示',
									'value' => '1'
								],
								[
									'label' => '有缩略图的直接显示，没有的显示文章第一张图片，文章没有图片就显示默认的缩略图',
									'value' => '2'
								]
							]
						]
					],
					[
						'id'       => 'document_thumbnail_default',
						'title'    => '默认缩略图',
						'callback' => 'nicen_theme_form_media',
					],
					[
						'id'       => 'document_publish_show',
						'title'    => '文章发布多少天后显示日期',
						'callback' => 'nicen_theme_form_number',
						'args'     => [
							'tip' => '小于设定的日期，文章发布日期将显示时间段，如：【15天前、15小时前、15分钟前】；大于指定日志将显示具体日期，如【2022-07-16】'
						]
					],
					[
						'id'       => 'document_view_add',
						'title'    => '文章阅读量自动增加',
						'callback' => 'nicen_theme_form_number',
						'args'     => [
							'tip' => '所有文字阅读数增加指定数量'
						]
					],
					[
						'id'       => 'H1_title',
						'title'    => '链接设置',
						'callback' => 'nicen_theme_form_title',
						'args'     => []
					],
					[
						'id'       => 'text_info',
						'title'    => '功能说明',
						'callback' => 'nicen_theme_form_text',
						'args'     => [
							'info' => '修改这里后需要重新去保存一下固定链接，才能生效'
						]
					],
					[
						'id'       => 'document_rewrite_page',
						'title'    => '修改分页链接前缀',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_rewrite_page_prefix',
						'title'    => '分页链接前缀',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_rewrite_search',
						'title'    => '修改搜索翻页前缀',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_rewrite_search_prefix',
						'title'    => '搜索翻页前缀',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_rewrite_author',
						'title'    => '修改作者信息页前缀',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_rewrite_author_prefix',
						'title'    => '作者信息页前缀',
						'callback' => 'nicen_theme_form_input',
					],
				]
			],
			[
				"id"       => "document_theme_tdk",
				'title'    => 'TDK设置',
				'callback' => [
					"key"    => "document_tdk",
					"ignore" => []
				],
				'fields'   => [
					[
						'id'       => 'document_tdk',
						'title'    => '显示主题自带的tdk',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_subtitle',
						'title'    => '博客副标题',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_keywords',
						'title'    => '博客页面关键字',
						'callback' => 'nicen_theme_form_textarea',
					],
					[
						'id'       => 'document_description',
						'title'    => '博客页面描述',
						'callback' => 'nicen_theme_form_textarea',
					],

				]
			],
			[
				"id"       => "document_theme_smtp",
				'title'    => 'SMTP设置',
				'callback' => [
					"key"    => "document_smtp_open",
					"ignore" => []
				],
				'fields'   => [
					[
						'id'       => 'document_smtp_open',
						'title'    => '自定义SMTP',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_smtp_server',
						'title'    => 'SMTP服务器',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_smtp_port',
						'title'    => '服务器端口',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_smtp_protocol',
						'title'    => '传输协议',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_smtp_acccount',
						'title'    => '邮件账号',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_smtp_password',
						'title'    => '账号密码',
						'callback' => 'nicen_theme_form_password',
					],
				]
			],
			[
				"id"     => "document_theme_code",
				'title'  => '页脚设置',
				'fields' => [
					[
						'id'       => 'document_footer_bg_color',
						'title'    => '页脚背景颜色',
						'callback' => 'nicen_theme_form_color',
						'args'     => [
							'tip' => "修改为transparent（透明）代表不显示"
						]
					],
					[
						'id'       => 'document_footer_font_color',
						'title'    => '页脚字体颜色',
						'callback' => 'nicen_theme_form_color',
						'args'     => [
							'tip' => "修改为transparent（透明）代表不显示"
						]
					],
					[
						'id'       => 'document_footer_extra',
						'title'    => '页脚HTML代码',
						'callback' => 'nicen_theme_form_textarea',
					],
					[
						'id'       => 'document_footer_tongji',
						'title'    => '访问统计代码',
						'callback' => 'nicen_theme_form_textarea',
					],
				]
			],
			[
				"id"       => "document_theme_index",
				'title'    => '首页设置',
				'callback' => [
					'key'    => 'document_dynamic',
					'ignore' => [
						'document_publish_show',
						'document_pagination',
						'document_searchnum',
						'document_show_sidebar',
						'document_show_left_nav'
					]
				],

				'fields' => [
					[
						'id'       => 'document_pagination',
						'title'    => '文章分页类型',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => '不显示分页',
									'value' => '2'
								],
								[
									'label' => '动态分页',
									'value' => '1'
								],
								[
									'label' => '传统分页',
									'value' => '0'
								]
							]
						]
					],
					[
						'id'       => 'document_paginate_auto_load_index',
						'title'    => '动态分页时自动加载',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_show_sidebar',
						'title'    => '显示右侧边栏',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_show_left_nav',
						'title'    => '显示文章左侧阅读目录',
						'callback' => 'nicen_theme_form_switch',
						'args'     => [
							'tip' => '文章没有目录时，会自动隐藏'
						]
					],
					[
						'id'       => 'document_searchnum',
						'title'    => '显示文章搜索数量',
						'callback' => 'nicen_theme_form_switch'
					],
					[
						'id'       => 'document_dynamic',
						'title'    => '显示首页动态栏目',
						'callback' => 'nicen_theme_form_switch',
						'args'     => [
							'tip' => '点击之后会动态加载指定栏目的文章'
						]
					],
					[
						'id'       => 'document_dynamic_list',
						'title'    => '显示哪些栏目',
						'callback' => 'nicen_theme_form_multi',
						'args'     => [
							'tip'     => '栏目包括所有分类和标签',
							'options' => 'nicen_theme_getAllCat'
						]
					],
					[
						'id'       => 'document_no_display',
						'title'    => '哪些栏目的文章不显示',
						'callback' => 'nicen_theme_form_multi',
						'args'     => [
							'tip'     => '栏目包括所有分类和标签',
							'options' => 'nicen_theme_getAllCat'
						]
					],
				]
			],
			[
				"id"     => "document_page_index",
				'title'  => '页面设置',
				'fields' => [
					[
						'id'       => 'document_page_show_info',
						'title'    => '显示文章详情',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_page_show_sidebar',
						'title'    => '显示侧边栏',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_page_show_comments',
						'title'    => '显示评论',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_page_show_bread',
						'title'    => '显示面包屑导航',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_page_show_structrue',
						'title'    => '显示底部结构化数据',
						'callback' => 'nicen_theme_form_switch',
					],
				]
			],
			[
				"id"     => "document_single_index",
				'title'  => '文章设置',
				'fields' => [
					[
						'id'       => 'document_single_show_info',
						'title'    => '显示文章详情',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_single_show_sidebar',
						'title'    => '显示侧边栏',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_single_show_comments',
						'title'    => '显示评论',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_single_show_bread',
						'title'    => '显示面包屑导航',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_single_show_structrue',
						'title'    => '显示底部结构化数据',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_single_show_catalog',
						'title'    => '显示文章左侧阅读目录',
						'callback' => 'nicen_theme_form_switch',
						'args'     => [
							'tip' => '文章没有目录时，会自动隐藏'
						]
					],
					[
						'id'       => 'document_show_donate',
						'title'    => '显示文章打赏按钮',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_donate_url',
						'title'    => '页面打赏跳转链接',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_show_copyright',
						'title'    => '显示底部版权信息',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_copyright',
						'title'    => '文章底部版权说明',
						'callback' => 'nicen_theme_form_textarea',
						'args'     => [
							'tip' => '支持通配符 #title#（输出文章标题）、#url#（输出文章URL）、#author#（输出作者信息）、#author_home#（输出作者主页URL）'
						]


					],
					[
						'id'       => 'document_assiciate_type',
						'title'    => '文章底部相关文章类型',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => '所有文章',
									'value' => '1'
								],
								[
									'label' => '同栏目（分类和标签）下的文章',
									'value' => '2'
								]
							]
						]
					],
				]
			],
			[
				"id"    => "document_else_index",
				'title' => '栏目设置',

				'fields' => [
					[
						'id'       => 'document_else_show_sidebar',
						'title'    => '显示右侧边栏',
						'callback' => 'nicen_theme_form_switch',
						'args'     => [
							'tip' => '分类页面、标签页面、搜索页面是否显示侧边栏'
						]
					],
					[
						'id'       => 'document_show_else_left_nav',
						'title'    => '显示左侧文章导航',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_else_pagination',
						'title'    => '栏目文章分页类型',
						'callback' => 'nicen_theme_form_select',
						'args'     => [
							'options' => [
								[
									'label' => '不显示分页',
									'value' => '2'
								],
								[
									'label' => '动态分页',
									'value' => '1'
								],
								[
									'label' => '传统分页',
									'value' => '0'
								]
							]
						]
					],
					[
						'id'       => 'document_paginate_auto_load_else',
						'title'    => '动态分页时自动加载',
						'callback' => 'nicen_theme_form_switch',
					],
				]
			],
			[
				"id"    => "document_header_index",
				'title' => '导航栏设置',

				'fields' => [
					[
						'id'       => 'document_header_show_readmode',
						'title'    => '显示白天/黑夜模式切换',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_header_show_logo',
						'title'    => '显示站点logo',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_header_show_title',
						'title'    => '显示站点标题',
						'callback' => 'nicen_theme_form_switch',
					],
					[
						'id'       => 'document_header_border_color',
						'title'    => '导航栏下边框颜色',
						'callback' => 'nicen_theme_form_color',
						'args'     => [
							'tip' => "修改为transparent（透明）代表不显示"
						]
					],
					[
						'id'       => 'document_header_shadow_color',
						'title'    => '导航栏阴影颜色',
						'callback' => 'nicen_theme_form_color',
						'args'     => [
							'tip' => "修改为transparent（透明）代表不显示"
						]
					],
					[
						'id'       => 'document_header_bg_color',
						'title'    => '导航栏背景颜色',
						'callback' => 'nicen_theme_form_color',
					],
					[
						'id'       => 'document_header_font_color',
						'title'    => '导航栏字体颜色',
						'callback' => 'nicen_theme_form_color',
					],
					[
						'id'       => 'document_sub_menu_bg_color',
						'title'    => '子菜单背景颜色',
						'callback' => 'nicen_theme_form_color',
					],
					[
						'id'       => 'document_sub_menu_font_color',
						'title'    => '子菜单字体颜色',
						'callback' => 'nicen_theme_form_color',
					],
					[
						'id'       => 'document_logo_url',
						'title'    => '博客logo链接',
						'callback' => 'nicen_theme_form_media',
					],
				]
			],
			[
				"id"       => "document_theme_seo",
				'title'    => 'SEO功能',
				'callback' => [
					"render" => "des_seo"
				],

				'fields' => [
					[
						'id'       => 'document_baidu',
						'title'    => '百度站长推送Token',
						'callback' => 'nicen_theme_form_input',
					],
					[
						'id'       => 'document_seo_og',
						'title'    => '显示og协议元数据',
						'callback' => 'nicen_theme_form_switch',
					],
				]
			],
			[
				"id"       => "document_theme_update",
				'title'    => '关于主题',
				'callback' => [
					"render" => "des_theme_update"
				],
			]
		]
	]
];


/*
 * 主题所有配置
 * 键=>默认值
 *
 * 初始化在
 * wp-content/themes/nicen_theme/include/functions/theme.php
 *
 * 的documents，reload函数
 * */

define( "CONFIG", [
	"document_tdk"         => 1,
	//显示主题自带的tdk
	"document_subtitle"    => '与你共享美好生活',
	//主题首页副标题
	"document_keywords"    => 'desitination主题',
	//主题关键字
	"document_description" => '一款自由的博客主题',
	//主题描述


	'document_else_pagination'          => 1,
	//显示分页的类型，默认动态分页
	'document_else_show_sidebar'        => 1,
	/* 自动加载下一页 */
	"document_paginate_auto_load_index" => 1,
	//分类、标签栏目是否显示侧边栏
	'document_show_else_left_nav'       => 1,
	//栏目文章导航

	'document_rewrite_author'        => 'who',
	//作者信息前缀开关
	'document_rewrite_search'        => 'keyword',
	//搜索信息前缀开关
	'document_rewrite_page'          => 'much',
	//分页信息前缀开关
	'document_rewrite_author_prefix' => 'who',
	//作者信息前缀
	'document_rewrite_search_prefix' => 'keyword',
	//搜索信息前缀
	'document_rewrite_page_prefix'   => 'much',
	//分页信息前缀
	'document_show_left_nav'         => 1,
	//首页文章导航
	'document_show_sidebar'          => 1,
	//首页显示侧边栏
	"document_publish_show"          => '30',
	//发布30天的文章显示日期
	"document_dynamic"               => 0,
	"document_dynamic_list"          => '',

	"document_no_display"              => '',
	"document_paginate_auto_load_else" => 1,
	"document_pagination"              => 1,
	//显示分页的类型，默认动态分页
	'document_index_excerpt_number'    => 200,
	//文章摘要字数

	'document_thumbnail'          => 1,
	"document_thumbnail_position" => "right",
	'document_thumbnail_default'  => get_theme_root_uri() . '/destination/assets/images/default.png',
	"document_Gravatar"           => 'gravatar.loli.net/avatar',
	//默认替换的gavatar源
	"document_theme_color"        => '#3eaf7c',
	"document_show_copyright"     => 1,
	//主题色
	"document_searchnum"          => 1,
	//显示搜索数量
	'document_view_add'           => 0,
	//阅读量增加
	'document_switch_theme'       => 1,
	//主题色切换

	//捐赠和版权
	"document_show_donate"        => 1,
	"document_donate_url"         => site_url(),
	"document_copyright"          => "赠人玫瑰，手有余香",

	"document_smtp_open"     => 0,
	//是否开启smtp
	"document_smtp_server"   => '',
	//smtp服务器
	"document_smtp_port"     => '',
	//服务器端口
	"document_smtp_protocol" => '',
	//传输协议
	"document_smtp_acccount" => '',
	//邮件账户
	"document_smtp_password" => '',
	//邮件密码

	'document_footer_bg_color'   => 'transparent',
	'document_footer_font_color' => '#262626',
	"document_footer_tongji"     => '',
	//插入页脚的内容
	"document_footer_extra"      => '<span>基于<a href="https://wordpress.org" target="_blank" rel="nofollow" title="Wordpress">Wordpress.</a> Theme By <a href="https://github.com/friend-nicen/theme-document" title="Document" target="_blank" rel="nofollow">Document.</a> ICP备案号 </span>
    <a href="https://beian.miit.gov.cn/" title="工信部ICP备案" target="_blank" rel="nofollow" style="color:"> ICP备10086号</a>',
	//插入页脚的内容

	'document_seo_og'                => 0,
	"document_baidu"                 => '',
	//百度站长
	"document_private"               => md5( time() ),
	//初次安装时的接口密钥

	/*
	 * 文章设置
	 * */
	'document_single_show_info'      => 1,
	'document_single_show_comments'  => 1,
	'document_single_show_sidebar'   => 1,
	'document_single_show_bread'     => 1,
	'document_single_show_structrue' => 1,
	'document_single_show_catalog'   => 0,
	'document_assiciate_type'        => 1,
	/*
	 * 页面设置
	 * */
	'document_page_show_info'        => 1,
	'document_page_show_comments'    => 1,
	'document_page_show_sidebar'     => 1,
	'document_page_show_bread'       => 1,
	'document_page_show_structrue'   => 1,

	/*
	 * 导航栏设置
	 * */
	'document_header_show_readmode'  => 1,
	'document_header_show_title'     => 1,
	'document_header_show_logo'      => 1,
	'document_header_bg_color'       => '#fff',
	'document_header_font_color'     => '#262626',
	'document_sub_menu_bg_color'     => '#fff',
	'document_sub_menu_font_color'   => 'rgba(0,0,0,0.65)',
	"document_logo_url"              => get_theme_root_uri() . '/destination/assets/images/logo.png',
	//主题logo
	'document_header_border_color'   => '#e1e1e1',
	'document_header_shadow_color'   => 'hsl(230deg 68% 14% / 1%)',
] );


/*
 * 注册自定义页面
 * 初始化模板在 admin/initialize.php 最下面
 *
 * 初始化前台依赖在 include/funcitons/theme.php
 * */
const PAGES = [
	'文章聚合' => [
		'template'  => 'template/page/posts.php', //模板文件
		'dependent' => [
			/*
			 * 依赖的样式
			 * 可以使远程资源
			 * */
			'styles' => [
				'/common/page/page.css'
			],
			/*依赖的脚本*/
			'script' => [

			]
		]
	],
	'留言板'   => [
		'template' => 'template/page/board.php',
	]
];