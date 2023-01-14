<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Swiper extends WP_Widget {
	/** 构造函数 */
	function __construct() {
		parent::__construct( false, $name = '主题小工具【首页Banner】', [
			"description" => "首页Banner列表"
		] );
	}


	/*
	 * 获取指定字段值
	 * */

	function widget( $args, $instance ) {
		$thumbnail      = $this->getValue( $instance, 'wiget_thumbnail', nicen_theme_create_array( '', 5 ) ); //栏目id
		$link           = $this->getValue( $instance, 'wiget_link', nicen_theme_create_array( '', 5 ) ); //栏目id
		$category       = $this->getValue( $instance, 'category', nicen_theme_create_array( '', 5 ) ); //栏目id
		$title          = $this->getValue( $instance, 'title', nicen_theme_create_array( '', 5 ) ); //栏目id
		$datetime       = $this->getValue( $instance, 'datetime', nicen_theme_create_array( '', 5 ) ); //栏目id
		$number         = $this->getValue( $instance, 'number', nicen_theme_create_array( '', 5 ) ); //栏目id
		$show_in_mobile = $this->getValue( $instance, 'show_in_mobile', false ); //是否在移动端显示

		/* 如果不是移动端 ，如果移动端也显示 */

		include get_template_directory() . '/template/widget/swiper.php';//最新文章
	}


	/*
	 * 输出小部件显示的代码
	 * @param $args,注册小部件时的array参数
	 * */

	function getValue( $instance, $field, $default = "" ) {

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
		?>
        <div id="jq-tabs">

        <ul>
			<?php
			for ( $i = 0; $i < 3; $i ++ ) {
				echo sprintf( '<li><a href="#tabs-%s">%s</a></li>', $i + 1, '栏目' . ( $i + 1 ) );
			}
			?>
        </ul>
		<?php

		$default = '';

		for ( $i = 0; $i < 3; $i ++ ) {

			echo '<div id="tabs-' . ( $i + 1 ) . '">';

			widget_media( $this, $instance, [
				'title'   => '背景图片链接',
				'type'    => 'text',
				'field'   => 'wiget_thumbnail',
				'default' => $default,
				'index'   => $i
			], true );

			widget_input( $this, $instance, [
				'title'   => '点击访问的链接',
				'type'    => 'text',
				'field'   => 'wiget_link',
				'default' => $default,
				'index'   => $i
			], true );

			widget_input( $this, $instance, [
				'title'   => '左上角分类名',
				'type'    => 'text',
				'field'   => 'category',
				'default' => $default,
				'index'   => $i
			], true );

			widget_input( $this, $instance, [
				'title'   => '显示的标题',
				'type'    => 'text',
				'field'   => 'title',
				'default' => $default,
				'index'   => $i
			], true );

			widget_datepicker( $this, $instance, [
				'title'   => '显示的时间',
				'type'    => 'text',
				'field'   => 'datetime',
				'default' => $default,
				'index'   => $i
			], true );

			widget_input( $this, $instance, [
				'title'   => '显示的阅读数',
				'type'    => 'text',
				'field'   => 'number',
				'default' => $default,
				'index'   => $i
			], true );

			echo '</div>';

		}


		widget_select( $this, $instance,
			[
				'title'   => '移动端',
				'field'   => 'show_in_mobile',
				'default' => '0'
			],
			[
				'0' => '不显示',
				'1' => '显示',
			]
		);

		echo "</div>";
	}

}
