<?php

/*
 * 首页轮播导航
 * @author 友人a丶
 * @date 2022-07-08
 * */
$default = get_template_directory_uri() . "/assets/images/default.png";

?>
<div class="swiper mySwiper <?php echo $show_in_mobile ? '' : 'mobile'; ?>">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
			<?php

			for ( $i = 0; $i < 3; $i ++ ) {
				$class = '';
				switch ( $i ) {
					case 0:
						$class = "swiper-a";
						break;
					case 1:
						$class = "swiper-b";
						break;
					case 2:
						$class = "swiper-c";
						break;
				}
				?>
                <div class="swiper-item <?php echo $class; ?>">
                    <a href="<?php echo $link[ $i ]; ?>" title="<?php echo $title[ $i ]; ?>" target="_blank"
                       class="modal">
                        <span class="category"><?php echo $category[ $i ]; ?></span>
                        <div class="bottom">
                            <div class="title"><?php echo $title[ $i ]; ?></div>

							<?php
							if ( ! empty( $datetime[ $i ] ) ) {
								echo ' <span>' . $datetime[ $i ] . '</span>';
							}
							if ( ! empty( $number[ $i ] ) ) {
								echo ' <span><i class="iconfont icon-icon-test"></i>' . $number[ $i ] . '</span>';
							}
							?>

                        </div>
                    </a>
                    <img loading="lazy" src="<?php echo empty( $thumbnail[ $i ] ) ? $default : $thumbnail[ $i ]; ?>"/>
                </div>
				<?php
			}
			?>
        </div>
		<?php
		?>
    </div>
</div>
