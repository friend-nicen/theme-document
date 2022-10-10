<?php

/*
 * @author
 *
 * 后台表单渲染函数
 * 后台外部样式加载
 * */


/*
 * 部分组件没有输出表单元素，
 * 所以需要一个隐藏的input
 *
 * 例如select组件
 * 例如colorpicker组件
 * */


/*
 * 主题域输出
 *
 *
 * @支持 自定义函数输出+表单输出
 * @支持 自定义开关，显示隐藏所有表单，以及不参与该操作的表单
 * @支持 自定义表单的tip提示
 *
 * */
function nicen_theme_do_settings_fields_user( $page, $section, $callback = false ) {
	global $wp_settings_fields;
	if ( ! isset( $wp_settings_fields[ $page ][ $section ] ) ) {
		return;
	}

	/*
	 * 判断是否有条件判断
	 * */

	$param = [];//是否需要显示、隐藏切换
	if ( $callback ) {
		$param = $callback();
	}


	/*
	 * 遍历所有分节
	 * */
	foreach ( (array) $wp_settings_fields[ $page ][ $section ] as $field ) {

		/*
		 * 如果是文字说明
		 * */
		if ( $field['id'] == 'text_info' ) {
			echo sprintf( '<a-form-item label=%s>', $field['title'] );
			echo $field['callback']( $field['args'] );
			echo '</a-form-item>';
			continue;
		}


		/*
		 * 是否需要自定义提示
		 * */
		if ( ! isset( $field['args']['tip'] ) ) {
			$label = 'label="%s"';
		} else {
			$label = '';
		}

		/*
		 * 是否具有总开关
		 * */
		if ( ! isset( $param['key'] ) ) {
			echo sprintf( '<a-form-item ' . $label . '>', $field['title'] );
		} else {

			/*
			 * 总开关或者忽略的
			 * */
			if ( $param['key'] == $field['id'] || in_array( $field['id'], $param['ignore'] ) ) {
				echo sprintf( '<a-form-item ' . $label . '>', $field['title'] );
			} else {
				echo sprintf( '<a-form-item v-show="data.' . $param['key'] . ' == 1" ' . $label . '>', $field['title'] );
			}

		}

		/*
		 * 是否需要输出自定义tip
		 * */
		if ( isset( $field['args']['tip'] ) ) {
			echo sprintf( '<template #label>
                             <a-tooltip placement="rightTop">
                            <template slot="title">
                              %s
                            </template>
                            <a-icon style="margin-right: 6px;" type="question-circle" />
                          </a-tooltip>
                            %s
                            </template>', $field['args']['tip'], $field['title'] );
		}

		/*
		 * 调用输出函数
		 * */
		call_user_func(
			$field['callback'],
			/*合并出需要的参数*/
			array_merge(
				$field['args'] ?? [],
				[
					'label_for' => $field['id'],
					'title'     => $field['title']
				]
			) );

		echo '</a-form-item>';

	}
}

/*
 * 主题设置片段页面输出
 * */
function nicen_theme_do_settings_sections_user( $page ) {
	global $wp_settings_sections, $wp_settings_fields;

	if ( ! isset( $wp_settings_sections[ $page ] ) ) {
		return;
	}

	foreach ( (array) $wp_settings_sections[ $page ] as $key => $section ) {


		/*输出tab头*/
		echo sprintf( '<a-tab-pane key="%s" tab="%s" :force-render="true">', $key, $section['title'] );


		$param = [];//是否需要显示、隐藏切换

		if ( isset( $section['callback'] ) ) {
			$param = $section['callback']();
		}


		/*
		 * 输出输入组件
		 * */
		nicen_theme_do_settings_fields_user( $page, $section['id'], $section['callback'] ?? false );

		/*
		 * 如果有自定义输出
		 * */
		if ( isset( $param['render'] ) ) {
			$param['render']();
		}

		/*闭合*/
		echo "</a-tab-pane>";


	}
}


/*
 * 加载主题设置页面
 * */

function nicen_theme_setting_load() {

	global $plugin_page; //获取设置菜单的id

	// 检查用户权限
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
    <div class="wrap" id="VueApp" v-cloak>
        <a-config-provider :locale="zhCN">
            <div>
                <a-page-header
                        title="<?= esc_html( get_admin_page_title() ); ?>"
                        :backIcon="false"
                        sub-title="加油">
                    <template #extra>
                        <a-button :loading="resuming" type="primary" @click="resume">
                            {{resuming?"正在恢复...":"恢复默认配置"}}
                        </a-button>
                        <a-button :loading="loading" type="primary" @click="save">
                            {{loading?"正在保存...":"保存设置"}}
                        </a-button>
                    </template>
                </a-page-header>
                <a-form
                        action="options.php"
                        method="post"
                        label-align="left"
                        :label-col="{ span: 4 }"
                        :wrapper-col="{ span: 10 }"
                        ref="submit"
                >

					<?php
					// 输出可允许修改的选项
					settings_fields( $plugin_page );
					?>
                    <div class="card-container">
                        <a-tabs type="card" v-model="activeKey" @change="change">
							<?php
							//输出输入域
							nicen_theme_do_settings_sections_user( $plugin_page );
							?>
                        </a-tabs>
                    </div>
                </a-form>
            </div>
        </a-config-provider>
    </div>
	<?php
}


/*
 * 数字输入框
 * */
function nicen_theme_form_number( $args ) {
	?>
    <a-input-number
            name="<?= $args['label_for']; ?>"
            style="width: 100%;"
            placeholder="请输入<?= $args['title']; ?>"
            v-model="data.<?= $args['label_for']; ?>"
    />
	<?php
}


/*
 * 基础输入框
 * */
function nicen_theme_form_input( $args ) {
	?>
    <a-input
            name="<?= $args['label_for']; ?>"
            placeholder="请输入<?= $args['title']; ?>"
            v-model="data.<?= $args['label_for']; ?>"
            allow-clear/>
	<?php
}


/*
 * 基础密码输入框
 * */
function nicen_theme_form_password( $args ) {
	?>
    <a-input-password
            name="<?= $args['label_for']; ?>"
            placeholder="请输入<?= $args['title']; ?>"
            v-model="data.<?= $args['label_for']; ?>"
            allow-clear/>
	<?php
}


/*
 * 文字说明
 * */
function nicen_theme_form_text2( $args ) {
	?>
    <div style='line-height: 1.8;width: 150%;word-wrap:break-word;word-spacing:normal; word-break: break-all;'><?= $args['info']; ?></div>
	<?php
}

/*
 * 基础开关
 * */
function nicen_theme_form_switch( $args ) {
	?>
    <input name="<?= $args['label_for']; ?>" v-model="data.<?= $args['label_for']; ?>" hidden/>
    <a-switch
            name="<?= $args['label_for']; ?>"
            :checked="data.<?= $args['label_for']; ?> == 1"
            @change="(checked,events)=>{hasChange(checked,events,'<?= $args['label_for']; ?>')}"
    />
	<?php
}

/*
 * 基础开关
 * */
function nicen_theme_form_textarea( $args ) {
	?>
    <a-textarea
            name="<?= $args['label_for']; ?>"
            v-model="data.<?= $args['label_for']; ?>"
            placeholder="请输入<?= $args['title']; ?>"
            :rows="4"
            :auto-size="{minRows: 4}"
            allow-clear/>
	<?php
}

/*
 * 基础开关
 * */
function nicen_theme_form_color( $args ) {
	?>
    <div style="display: flex;align-items: center">
        <input name="<?= $args['label_for']; ?>" v-model="data.<?= $args['label_for']; ?>" hidden/>
        <color-picker v-model="data.<?= $args['label_for']; ?>"></color-picker>
        <a-input
                name="<?= $args['label_for']; ?>"
                placeholder="请输入<?= $args['title']; ?>"
                v-model="data.<?= $args['label_for']; ?>"
                allow-clear/>
    </div>
	<?php
}


/*
 * 单选
 * */
function nicen_theme_form_select( $args ) {
	?>
    <input name="<?= $args['label_for']; ?>" v-model="data.<?= $args['label_for']; ?>" hidden/>
    <a-select
            :options='<?= json_encode( is_array( $args['options'] ) ? $args['options'] : $args['options']() ); ?>'
            style="width: 100%"
            show-arrow
            v-model="data.<?= $args['label_for']; ?>"
            placeholder="请选择<?= $args['title']; ?>"
    />
	<?php
}


/*
 * 单选
 * */
function nicen_theme_form_multi( $args ) {
	?>

    <input name="<?= $args['label_for']; ?>" v-model="data.<?= $args['label_for']; ?>" hidden/>
    <a-select
            :options='<?= json_encode( is_array( $args['options'] ) ? $args['options'] : $args['options']() ); ?>'
            style="width: 100%"
            show-arrow
            mode="multiple"
            v-model="data.<?= $args['label_for']; ?>"
            placeholder="请选择<?= $args['title']; ?>"
    />
	<?php
}


