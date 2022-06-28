<?php
/*
 * 后台主题设置注册和模块
*/

/*
 * 注册菜单
 * */
add_action( 'admin_menu', 'theme_options_admin_menu' );


/*
 * 注册菜单
 * */
function theme_options_admin_menu() {
	/*后台管理面板侧栏添加选项*/
	add_menu_page(
		"Document主题设置",
		"主题选项",
		'edit_themes',
		'document_theme',
		'setting_load'
	);
}


/*
 * 主题设置页面输出
 * */
function setting_load() {
	// 检查用户权限
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
    <div class=wrap>
        <h1><?= esc_html( get_admin_page_title() ); ?></h1>
        <form action=options.php method=post>
			<?php
			// 输出可允许修改的选项
			settings_fields( 'document_theme' );
			// 输出所有表单
			do_settings_sections( 'document_theme' );
			// 输出保存的按钮
			// submit_button( '保存设置' );
			?>
            <div style="width: 50%;display: flex;justify-content: center;margin-top: 50px">
                <button type="submit" name="submit" id="submit" class="button button-primary">保存设置</button>
            </div>
        </form>
    </div>
	<?php
}


add_action( 'admin_init', 'document_theme_register' );

/*
 * 分节信息输出
 * */


/*
 * 域输出
 * */
function document_theme_field_input( $args ) {
	// 获取我们使用 register_setting() 注册的字段的值
	$setting = get_option( $args['label_for'] );
	// 输出字段
	?>
    <input type="text" style="width: 50%" name="<?php echo $args['label_for']; ?>"
           value="<?php echo isset( $setting ) ? $setting : ''; ?>"/>
	<?php
}

/*
 * 域输出
 * */
function document_theme_field_textarea( $args ) {
	// 获取我们使用 register_setting() 注册的字段的值
	$setting = get_option( $args['label_for'] );
	?>
    <textarea style="width: 50%;" rows="5"
              name="<?php echo $args['label_for']; ?>"><?php echo isset( $setting ) ? $setting : ''; ?></textarea>
	<?php
}


/*
 * 单选
 * */
function document_theme_field_select( $args ) {
	// 获取我们使用 register_setting() 注册的字段的值
	$setting = get_option( $args['label_for'] );
	?>
    <select style="width: 50%;" name="<?php echo $args['label_for']; ?>"
            value="<?php echo isset( $setting ) ? $setting : ''; ?>">
        <option <?php echo $setting == "cdn.v2ex.com/gravatar" ? 'selected' : ''; ?> value="cdn.v2ex.com/gravatar">
            V2EX
        </option>
        <option <?php echo $setting == "gravatar.loli.net/avatar" ? 'selected' : ''; ?>
                value="gravatar.loli.net/avatar">
            loli
        </option>
    </select>
	<?php
}







/*
 * 注册主题设置
 * */
function document_theme_register() {

	register_setting( 'document_theme', "document_subtitle" ); //主题首页副标题
	register_setting( 'document_theme', "document_keywords" ); //主题关键字
	register_setting( 'document_theme', "document_description" ); //主题描述
	register_setting( 'document_theme', "document_logo_url" ); //主题logo
	register_setting( 'document_theme', "document_author_nickname" ); //作者昵称
	register_setting( 'document_theme', "document_author_profession" ); //作者昵称
	register_setting( 'document_theme', "document_author_avatar" ); //作者logo
	register_setting( 'document_theme', "document_author_description" ); //作者描述
	register_setting( 'document_theme', "document_footer" ); //插入页脚的内容
	register_setting( 'document_theme', "document_Gravatar" ); //头像
	register_setting( 'document_theme', "document_author_beijin" ); //作者卡片背景
	register_setting( 'document_theme', "document_icp" ); //备案号
	register_setting( 'document_theme', "document_donate" ); //赞赏
    register_setting( 'document_theme', "document_baidu" ); //百度站长

	/*
	 * __ ，多语言翻译函数
	 * */

	/*
	 * 添加分节
	 * */
	add_settings_section( 'document_theme_section', "", null, 'document_theme' );

	/*
	 * 注册输入域
	 * */
	add_settings_field(
		'document_subtitle', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'博客副标题',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_subtitle"
		]
	);
	add_settings_field(
		'document_keywords', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'博客页面关键字',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_keywords"
		]
	);
	add_settings_field(
		'document_description', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'博客页面描述',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_description"
		]
	);
	add_settings_field(
		'document_logo_url', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'博客logo链接',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_logo_url"
		]
	);
	add_settings_field(
		'document_donate', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'赞赏码',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_donate"
		]
	);
    add_settings_field(
        'document_baidu', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '百度站长推送Token',
        'document_theme_field_input',
        'document_theme',
        'document_theme_section',
        [
            'label_for' => "document_baidu"
        ]
    );
	add_settings_field(
		'document_author_nickname', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'作者昵称',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_author_nickname"
		]
	);
	add_settings_field(
		'document_author_profession', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'作者职业',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_author_profession"
		]
	);
	add_settings_field(
		'document_author_avatar', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'作者头像',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_author_avatar"
		]
	);
	add_settings_field(
		'document_author_beijin', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'作者卡片背景',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_author_beijin"
		]
	);
	add_settings_field(
		'document_author_description', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'作者描述',
		'document_theme_field_textarea',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_author_description"
		]
	);


	add_settings_field(
		'document_icp', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'ICP备案号',
		'document_theme_field_input',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_icp"
		]
	);
	add_settings_field(
		'document_Gravatar', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'Gravatar镜像服务器',
		'document_theme_field_select',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_Gravatar"
		]
	);

	add_settings_field(
		'document_footer', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback
		'页脚附加代码',
		'document_theme_field_textarea',
		'document_theme',
		'document_theme_section',
		[
			'label_for' => "document_footer"
		]
	);

}

