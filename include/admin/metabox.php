<?php

/**
 * 自定义文章关键词和描述
 * @author 友人a丶
 */

if ( nicen_theme_config( 'document_article_tdk', false ) ) {
	add_action( 'add_meta_boxes', 'nicen_theme_kd_meta_box' );
	add_action( 'edit_post', 'nicen_document_kd_save_post' );
}

add_action( 'edit_post', 'nicen_document_slash_save_post' );


/**
 * 新增元框
 */
function nicen_theme_kd_meta_box() {
	add_meta_box( 'nicen_theme_slash_meta_box', "反斜杠", 'nicen_theme_slash_callback', 'post', 'side', 'core' );
	add_meta_box( 'nicen_theme_kd_meta_box', "文章SEO", 'nicen_theme_kd_callback', 'page', 'normal', 'core' );
	add_meta_box( 'nicen_theme_kd_meta_box', "文章SEO", 'nicen_theme_kd_callback', 'post', 'normal', 'core' );
}


/**
 * @param $post
 * 回调
 */
function nicen_theme_slash_callback( $post ) {
	$nice_slash = intval( get_post_meta( $post->ID, 'nicen_slash', true ) ?: "0" );
	echo '<div style="display:flex;gap:10px;">';
	echo '<label><input type="radio" name="nicen_slash" value="1" ' . checked( 1, $nice_slash, false ) . '> 保存</label>';
	echo '<label><input type="radio" name="nicen_slash" value="0" ' . checked( 0, $nice_slash, false ) . '> 不处理</label>';
	echo '</div>';
}


/**
 * @param $post
 * 自定义表单输出
 */
function nicen_theme_kd_callback( $post ) {
	$keywords    = get_post_meta( $post->ID, 'nicen_keywords', true );
	$description = get_post_meta( $post->ID, 'nicen_description', true );
	wp_nonce_field( basename( __FILE__ ), 'nicen_kd_nonce' );
	?>
    <div style="display: flex;padding:20px 10px;6px;gap: 25px;align-items: flex-start;">
     <textarea style="width: 50%;" placeholder="请输入文章关键词" rows="5" id="nicen_keywords"
               name="nicen_keywords"><?php echo esc_attr( $keywords ); ?></textarea>
        <textarea style="width: 50%;" placeholder="请输入文章描述" rows="5" id="nicen_description"
                  name="nicen_description"><?php echo esc_attr( $description ); ?></textarea>
    </div>

	<?php
}

/**
 * @param $post_id
 *
 * @return mixed|void
 * 保存元框数据
 */
function nicen_document_slash_save_post( $post_id ) {
	if ( isset( $_POST['nicen_slash'] ) ) {
		$slash = sanitize_text_field( $_POST['nicen_slash'] );
		update_post_meta( $post_id, 'nicen_slash', $slash );
	}
}

/**
 * @param $post_id
 *
 * @return mixed|void
 * 保存元框数据
 */
function nicen_document_kd_save_post( $post_id ) {


	/* nonce数验证 */
	if ( ! isset( $_POST['nicen_kd_nonce'] ) || ! wp_verify_nonce( $_POST['nicen_kd_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	/* 编辑文章的权限 */
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}


	/* 过滤数据 */
	$keywords    = sanitize_text_field( $_POST['nicen_keywords'] );
	$description = sanitize_text_field( $_POST['nicen_description'] );

	/* 更新数据 */
	update_post_meta( $post_id, 'nicen_keywords', $keywords );
	update_post_meta( $post_id, 'nicen_description', $description );
}