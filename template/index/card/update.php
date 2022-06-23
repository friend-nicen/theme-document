

<div class="div-info">
	<div class="header">
		<ul>
			<li class="active">最近更新</li>
			<!-- <li>修改记录</li>-->
		</ul>
	</div>
	<ul class="ul">

		<?php
		query_posts("showposts=10&orderby=modified");
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