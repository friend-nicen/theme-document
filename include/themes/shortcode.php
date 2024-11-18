<?php

/*
 * 短标签
 * */

/*
 * 短标签处理
 * */
function nicen_theme_init_shortcode()
{


	static $h1_count = 0;
	static $h2_count = 0;
	static $h3_count = 0;

	function h1($atts, $content = null, $code = "")
	{

		global $h1_count;
		$h1_count++;

		return '<h2 id="h2' . $h1_count . '">' . $content . '</h2>';
	}

	add_shortcode('h1', 'h1');

	function h2($atts, $content = null, $code = "")
	{

		global $h2_count;
		$h2_count++;

		return '<h3 id="h3' . $h2_count . '">' . $content . '</h3>';
	}

	add_shortcode('h2', 'h2');

	function h3($atts, $content = null, $code = "")
	{

		global $h3_count;
		$h3_count++;

		return '<h4 id="h4' . $h3_count . '">' . $content . '</h4>';
	}

	add_shortcode('h3', 'h3');

	function success($atts, $content = null, $code = "")
	{

		$content = do_shortcode($content);

		if (isset($atts['title'])) {
			$title = '<div class="title">'
			         . do_shortcode($atts['title']) .
			         '</div>';
		} else {
			$title = '';
		}

		return '<div class="custom-container success">
  ' . $title . '
    <div class="content">
      ' . $content . '
    </div>
</div>';
	}

	add_shortcode('success', 'success');

	function error($atts, $content = null, $code = "")
	{

		$content = do_shortcode($content);

		if (isset($atts['title'])) {
			$title = '<div class="title">'
			         . do_shortcode($atts['title']) .
			         '</div>';
		} else {
			$title = '';
		}


		return '<div class="custom-container error">
  ' . $title . '
    <div class="content">
      ' . $content . '
    </div>
</div>';
	}

	add_shortcode('error', 'error');

	function alerts($atts, $content = null, $code = "")
	{

		$content = do_shortcode($content);

		if (isset($atts['title'])) {
			$title = '<div class="title">'
			         . do_shortcode($atts['title']) .
			         '</div>';
		} else {
			$title = '';
		}

		return '<div class="custom-container alert">
  ' . $title . '
    <div class="content">
      ' . $content . '
    </div>
</div>';
	}

	add_shortcode('alert', 'alerts');

	function lightbox($atts, $content = null, $code = "")
	{
		$title = do_shortcode($atts['title']);

		if (strpos($content, 'class') === false) {
			$content = str_replace("<img", '<img loading="lazy" class="viewerLightBox"', $content);
		} else {
			$content = preg_replace("/class=\"(.*?)\"/", "loading=\"lazy\" class=\"$1 viewerLightBox\"", $content);
		}

		return '<div class="container-image">
   		' . $content . '
    <div class="image-info"> ' . $title . '</div>
</div>';
	}

	add_shortcode('lightbox', 'lightbox');


	function mark($atts, $content = null, $code = "")
	{
		return '<code class="code">' . $content . '</code>';
	}

	add_shortcode('mark', 'mark');

}

add_action('after_setup_theme', 'nicen_theme_init_shortcode'); //新增短标签处理
