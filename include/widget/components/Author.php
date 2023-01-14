<?php
/*
 * 显示最近更新文章的小部件
 * */


/*
 * 注册小部件的同时 会按照规则插入 option
 * */

class Author extends WP_Widget {
	/** 构造函数 */
	function __construct() {
		parent::__construct( false, $name = '主题小工具【作者信息】', [
			"description" => "显示作者的相关信息"
		] );
	}


	/*
	 * 获取指定字段值
	 * */

	function widget( $args, $instance ) {

		$avatar      = $this->getValue( $instance, 'avatar', '/wp-content/themes/nicen_theme/assets/images/avatars.jpg' );//作者logo
		$nickname    = $this->getValue( $instance, 'nickname', '友人a丶' ); //作者昵称
		$profession  = $this->getValue( $instance, 'profession', 'PHPer' ); //职业描述
		$beijin      = $this->getValue( $instance, 'beijin', '/wp-content/themes/nicen_theme/assets/images/bg.jpg' ); //作者卡片背景
		$description = $this->getValue( $instance, 'description', '前端、PHPer，做更好的自己。' ); //文章数量

		include get_template_directory() . '/template/widget/author.php';//最新文章

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

		$user = wp_get_current_user();

		widget_input( $this, $instance, [
			'title'   => '昵称',
			'type'    => 'text',
			'field'   => 'nickname',
			'default' => $user->nickname
		] );


		widget_input( $this, $instance, [
			'title'   => '职业',
			'type'    => 'text',
			'field'   => 'profession',
			'default' => 'PHPer'
		] );


		widget_input( $this, $instance, [
			'title'   => '描述',
			'type'    => 'text',
			'field'   => 'description',
			'default' => $user->description
		] );


		widget_media( $this, $instance, [
			'title'   => '头像',
			'type'    => 'text',
			'field'   => 'avatar',
			'default' => get_template_directory_uri() . '/assets/images/avatars.jpg',
		] );

		widget_media( $this, $instance, [
			'title'   => '背景',
			'type'    => 'text',
			'field'   => 'beijin',
			'default' => get_template_directory_uri() . '/assets/images/bg.jpg',
		] );

		?>

		<?php
	}

}
