<?php

/*
 * 文章推荐
 * @author 友人a丶
 * @date 2022-07-08
 * */
global $table_prefix, $wpdb;


?>
<div class="div-info recommend <?php echo $show_title == 1 ? '' : 'no-title'; ?>">

	<?php if ( $show_title == 1 ) { ?>
        <div class="header">
            <ul>
                <li class="active" style="padding-left:1rem;padding-right:1rem;"><?php echo $title; ?></li>
                <!-- <li>修改记录</li>-->
            </ul>
        </div>
	<?php } ?>

    <div class="list" id="swiper">
        <div class="swiper-wrapper">
			<?php
			/*
			 * 判断显示类型
			 * */

			$condition = [ 'showposts' => $number ];

			$count = 0; //加载的文章数量

			if ( is_single() ) {

				/* 获取目录 */
				$cat = get_the_category( get_the_ID() );

				/* 条件 */
				if ( $cat ) {

					$category = []; //分类ID

					foreach ( $cat as $item ) {
						$category[] = $item->term_id;
					}


					$condition = array_merge( $condition, [
						'tax_query' => [
							[
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => $category,
							],
						]
					] );
				}
			}


			switch ( intval( $type ) ) {
				case 1:
					query_posts( $condition );
					break;
				case 2:

					$condition = array_merge( $condition, [ "orderby" => "modified" ] );

					query_posts( $condition );
					break;
				case 3:

					$condition = array_merge( $condition, [
						'posts_per_page' => $number,
						"orderby"        => "rand"
					] );

					query_posts( $condition );

					break;
				case 4:

					/*
					 * 获取浏览量最高的文章
					 * */
					if ( is_single() && ! empty( $category ) ) {

						$sql = 'select a.post_id,a.meta_value 
                                                from `' . $table_prefix . 'postmeta` As a join `' . $table_prefix . 'term_relationships` as b on a.post_id = b.object_id 
                                                where a.meta_key = "post_views_count" and b.term_taxonomy_id in (' . join( ',', $category ) . ') order by a.meta_value+0 DESC limit ' . $number;

					} else {

						$sql = 'select a.post_id,a.meta_value 
                                                from `' . $table_prefix . 'postmeta` As a join `' . $table_prefix . 'term_relationships` as b on a.post_id = b.object_id 
                                                where a.meta_key = "post_views_count" order by a.meta_value+0 DESC limit ' . $number;

					}

					$result   = $wpdb->get_results( $sql, ARRAY_A );
					$post_ids = array_map( fn( $item ) => $item['post_id'], $result );

					query_posts( array_merge( $condition, [ "post__in" => $post_ids ] ) );
					break;
				default:
					query_posts( $condition );
					break;
			}

			/*
			 * 递归显示文章
			 * */

			while ( have_posts() ) {
				$count ++;
				the_post();//移动文字指定到此处
				?>

                <div class="swiper-slide">
                    <a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title() ?>"
                       target="_blank">
                        <div class="thumnbnail">
                            <img src="<?php echo nicen_theme_getThumb() ?>" alt="<?php echo get_the_title() ?>"/>
                        </div>
                        <div class="caption">
							<?php echo get_the_title() ?>
                        </div>
                        <div class="detail">
                            <span><?php echo get_the_time( "Y年m月d日" ) ?></span>
                            <span>
                                        <i class="iconfont icon-icon-test"></i><?php echo nicen_theme_getPostViews( get_the_ID() ); ?>
                                    </span>
                        </div>
                        <div class="category">
							<?php echo nicen_make_getCategory( get_the_ID() ); ?>
                        </div>
                    </a>
                </div>

				<?php
			}
			wp_reset_query(); //重置文章指指针
			?>
        </div>
		<?php

		if ( $count == 0 ) {
			$url = get_template_directory_uri() . "/assets/images/nothing.svg"; //主题url
			echo '<div class="empty">
                            <img src="' . $url . '" title="暂无相关文章" />
                            <span>暂无可推荐内容</span>
                      </div>';
		} else {
			echo '         
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>';
		}


		?>

    </div>
</div>
