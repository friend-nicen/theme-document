<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class NewComments extends WP_Widget {
	/** 构造函数 */
	function __construct() {
		parent::__construct( false, $name = '主题小工具【最新评论】', [
			"description" => "显示站内指定数量的最新评论"
		] );
	}


	/*
	 * 获取指定字段值
	 * */

	function widget( $args, $instance ) {
		$title  = $this->getValue( $instance, 'title', '最新评论' );
		$number = $this->getValue( $instance, 'number', 5 );; //评论数量

		include get_template_directory() . '/template/widget/new-comments.php';//最新文章

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
			'title'   => '评论数量',
			'type'    => 'number',
			'field'   => 'number',
			'default' => 5
		] );

		widget_input( $this, $instance, [
			'title'   => '显示标题',
			'type'    => 'text',
			'field'   => 'title',
			'default' => '最新评论'
		] );

	}

}
