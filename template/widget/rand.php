<?php

/*
 * 侧边栏最新文章
 * @author 友人a丶
 * @date 2022-07-08
 * */
global $table_prefix, $wpdb;
?>

<div class="div-info <?php echo $show ? 'recent' : ''; ?>">
    <div class="header">
        <ul>
            <li class="active"><div class="mark"></div><?php echo $title; ?></li>
            <!-- <li>修改记录</li>-->
        </ul>
    </div>
    <ul class="ul">

		<?php
		/*
		 * 判断显示类型
		 * */
		switch ( intval( $type ) ) {
			case 1:
				query_posts( "showposts=" . $number );
				break;
			case 2:
				query_posts( "showposts=" . $number . "&orderby=modified" );
				break;
			case 3:
				query_posts( "posts_per_page=" . $number . "&orderby=rand" );
				break;
			case 4:

				/*
				 * 获取浏览量最高的文章
				 * */
				$sql    = 'select `post_id`,`meta_value` from `' . $table_prefix . 'postmeta` where `meta_key` = "post_views_count" order by `meta_value`+0 DESC limit ' . $number;
				$result = $wpdb->get_results( $sql, ARRAY_A );


				$post_ids = array_map( fn( $item ) => $item['post_id'], $result );


				query_posts( [
						"post__in"  => $post_ids,
						'showposts' => $number
					]
				);
				break;
			default:
				query_posts( "showposts=" . $number );
				break;
		}

		/*
		 * 递归显示文章
		 * */
		while ( have_posts() ) {
			the_post();//移动文字指定到此处

			if ( $show ) {
				echo '<li>
                <a href="' . get_the_permalink() . '" title="' . get_the_title() . '" target="_blank">
                     <div class="thumnbnail">
                        <img loading="lazy" src="' . nicen_theme_getThumb() . '" alt="' . get_the_title() . '" />
                    </div>
                    <div class="article">
                        <div class="caption">
                        ' . get_the_title() . '
                        </div> 
                        <div class="datetime">
                        ' . nicen_theme_timeToString( get_the_time( "Y-m-d H:i:s" ) ) . '
                        </div> 
                    </div>
                </a>
            </li>';

			} else {
				echo '<li>
                <div class="title">
                    <a href="' . get_the_permalink() . '" title="' . get_the_title() . '"><i class="iconfont icon-xiangxiazhankai1"></i>' . get_the_title() . '</a>
                </div>
            </li>';
			}
		}
		wp_reset_query(); //重置文章指指针
		?>
    </ul>

</div>