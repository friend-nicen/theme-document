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
function document_theme_field_password( $args ) {
    // 获取我们使用 register_setting() 注册的字段的值
    $setting = get_option( $args['label_for'] );
    // 输出字段
    ?>
    <input type="password" style="width: 50%" name="<?php echo $args['label_for']; ?>"
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
 * 单选
 * */
function document_theme_smtp_select( $args ) {
    // 获取我们使用 register_setting() 注册的字段的值
    $setting = get_option( $args['label_for'] );
    ?>
    <select style="width: 50%;" name="<?php echo $args['label_for']; ?>"
            value="<?php echo isset( $setting ) ? $setting : ''; ?>">
        <option <?php echo $setting == "1" ? 'selected' : ''; ?> value="1">
            开启
        </option>
        <option <?php echo $setting == "0" ? 'selected' : ''; ?>
                value="0">
            关闭
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
    register_setting( 'document_theme', "document_footer" ); //插入页脚的内容
	register_setting( 'document_theme', "document_logo_url" ); //站点logo
	register_setting( 'document_theme', "document_Gravatar" ); //头像
	register_setting( 'document_theme', "document_author_beijin" ); //作者卡片背景
	register_setting( 'document_theme', "document_icp" ); //备案号
	register_setting( 'document_theme', "document_donate" ); //赞赏
    register_setting( 'document_theme', "document_baidu" ); //百度站长
    register_setting( 'document_theme', "document_board" ); //留言板
    register_setting( 'document_theme', "document_pages" ); //文章聚合

    register_setting( 'document_theme', "document_column" ); //首页单双栏



    /*smtp相关配置*/
    register_setting( 'document_theme', "document_smtp_open" ); //是否开启smtp
    register_setting( 'document_theme', "document_smtp_server" ); //邮件服务器
    register_setting( 'document_theme', "document_smtp_port" ); //服务器端口
    register_setting( 'document_theme', "document_smtp_protocol" ); //传输协议
    register_setting( 'document_theme', "document_smtp_acccount" ); //邮件账户
    register_setting( 'document_theme', "document_smtp_password" ); //邮件密码


    /*
     * __ ，多语言翻译函数
     * */

	/*
	 * 添加分节
	 * */
	add_settings_section( 'document_theme_section', "基础设置", null, 'document_theme' );
    add_settings_section( 'document_theme_smtp', "SMTP设置", null, 'document_theme' );

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
        'document_board', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '留言板链接',
        'document_theme_field_input',
        'document_theme',
        'document_theme_section',
        [
            'label_for' => "document_board"
        ]
    );
    add_settings_field(
        'document_pages', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '文章聚合链接',
        'document_theme_field_input',
        'document_theme',
        'document_theme_section',
        [
            'label_for' => "document_pages"
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
        'document_column', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '首页显示单栏还是双栏',
        'document_theme_smtp_select',
        'document_theme',
        'document_theme_section',
        [
            'label_for' => "document_column"
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



    /*
     *smtp 相关设置
     * */





    add_settings_field(
        'document_smtp_open', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '是否开启SMTP',
        'document_theme_smtp_select',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_open"
        ]
    );

    add_settings_field(
        'document_smtp_server', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        'SMTP服务器',
        'document_theme_field_input',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_server"
        ]
    );


    add_settings_field(
        'document_smtp_port', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '服务器端口',
        'document_theme_field_input',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_port"
        ]
    );

    add_settings_field(
        'document_smtp_protocol', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '传输协议',
        'document_theme_field_input',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_protocol"
        ]
    );



    add_settings_field(
        'document_smtp_acccount', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '邮件账号',
        'document_theme_field_input',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_acccount"
        ]
    );

    add_settings_field(
        'document_smtp_password', // as of WP 4.6 this value is used only internally
        // use $args' label_for to populate the id inside the callback
        '账号密码',
        'document_theme_field_password',
        'document_theme',
        'document_theme_smtp',
        [
            'label_for' => "document_smtp_password"
        ]
    );







}

