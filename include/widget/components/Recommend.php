<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Recommend extends WP_Widget {
	/** 构造函数 */
	function __construct() {
		parent::__construct( false, $name = '主题小工具【文章推荐】', [
			"description" => "显示一定数量的推荐文章"
		] );
	}


	/*
	 * 获取指定字段值
	 * */

	function widget( $args, $instance ) {
		$title  = $this->getValue( $instance, 'title', '文章推荐' );
		$type   = $this->getValue( $instance, 'type', 1 ); //最新文章
		$number = $this->getValue( $instance, 'number', 5 );; //推荐数量
		$show_title = $this->getValue( $instance, 'show_title', 1 );; //显示标题
		include get_template_directory() . '/template/widget/recommend.php';//推荐
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
			'title'   => '标题文字',
			'type'    => 'text',
			'field'   => 'title',
			'default' => "文章推荐"
		] );

		widget_select( $this, $instance,
			[
				'title'   => '显示标题',
				'field'   => 'show_title',
				'default' => '1'
			],
			[
				'1' => '显示',
				'2' => '不显示',
			]
		);

		widget_input( $this, $instance, [
			'title'   => '推荐数量',
			'type'    => 'number',
			'field'   => 'number',
			'default' => 5
		] );

		widget_select( $this, $instance,
			[
				'title'   => '显示类型',
				'field'   => 'type',
				'default' => '1'
			],
			[
				'1' => '栏目最新文章',
				'2' => '栏目最近更新',
				'3' => '栏目随机文章',
				'4' => '栏目热门文章'
			]
		);


	}

}
