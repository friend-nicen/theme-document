<?php

/*
 * 侧边栏最新文章
 * @author 友人a丶
 * @date 2022-07-08
 * */

?>

<div class="div-info">
	<div class="header">
		<ul>
			<li class="active">最新文章</li>
			<!-- <li>修改记录</li>-->
		</ul>
	</div>
	<ul class="ul">

		<?php
		query_posts("showposts=10");
		while (have_posts()) {
			the_post();//移动文字指定到此处
			echo '<li>
                <div class="title">
                    <a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>
                </div>
            </li>';

		}
		wp_reset_query(); //重置文章指指针
		?>
	</ul>

</div>