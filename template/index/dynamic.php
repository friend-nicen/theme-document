<?php
/*
 * 动态栏目
 * 只在首页显示
 * */
if ( nicen_theme_config( 'document_dynamic', false ) && is_home() ) {
	?>
    <div class="dynamic">
        <ul class="list">
            <li class="tab active-tab" data-key="default">
                最新文章
            </li>
			<?php

			$dynamic_list = explode( ',', nicen_theme_config( 'document_dynamic_list', false ) );

			/*
			 * 如果设置了栏目
			 * */
			if ( ! empty( $dynamic_list ) ) {
				foreach ( $dynamic_list as $value ) {
					$term = nicen_theme_getTerm( $value );
					if ( $term ) {
						echo sprintf( '<li class="tab" data-key="tab%s" data-url="%s">%s</li>', $value, $term['link'], $term['name'] );
					}

				}
			}

			?>
        </ul>
    </div>
    <div id="dynamic">
        <i class="iconfont icon-loading animate-rotate"></i>
    </div>
	<?php
}
?>