<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */


/*
 * WP_Widget类的567行调用了下面这个函数，懂的都懂
 * wp_register_sidebar_widget
 * */

class Rand extends WP_Widget {
	/** 构造函数 */
	function __construct() {
		parent::__construct( false, $name = '主题小工具【随机文章】', [
			"description" => "显示指定类型的随机文章"
		] );
	}


	/*
	 * 获取指定字段值
	 * */

	function widget( $args, $instance ) {
		$title  = $this->getValue( $instance, 'title', '最新文章' );
		$number = $this->getValue( $instance, 'number', 5 ); //文章数量
		$type   = $this->getValue( $instance, 'type', 1 ); //最新文章
		$show   = $this->getValue( $instance, 'show', 1 ); //显示缩略图
		include get_template_directory() . '/template/widget/rand.php';//最新文章

	}


	/*
	 * 输出小部件显示的代码
	 * @param $args,注册小部件时的array参数
	 * */

	function getValue( $instance, $field, $default ) {

		if ( isset( $instance[ $field ] ) ) {
			return $instance[ $field ];
		} else {
			return $default;
		}

	}

	/*
	 * 小部件更新字段
	 * */

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	/*
	 * 小部件选项表单
	 * @param $instance，当前选项字段的数组
	 * */
	function form( $instance ) {

		widget_input( $this, $instance, [
			'title'   => '文章数量',
			'type'    => 'number',
			'field'   => 'number',
			'default' => 5
		] );

		widget_input( $this, $instance, [
			'title'   => '显示标题',
			'type'    => 'text',
			'field'   => 'title',
			'default' => '最新文章'
		] );

		widget_select( $this, $instance,
			[
				'title'   => '显示类型',
				'field'   => 'type',
				'default' => '1'
			],
			[
				'1' => '最新文章',
				'2' => '最近更新',
				'3' => '随机文章'
			]
		);

		widget_select( $this, $instance,
			[
				'title'   => '显示缩略图',
				'field'   => 'show',
				'default' => '1'
			],
			[
				'1' => '显示缩略图',
				'0' => '不显示缩略图',
			]
		);
	}

}
