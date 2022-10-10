<?php

/*
 * @author 友人a丶
 *
 * 输出自定义的表单元素
 * */



/*
 * 获取所有标签和分类
 * */
function nicen_theme_getAllCat()
{

	$cat = [];

	/*
	 * 遍历目录
	 * */
	$terms = get_terms('category', 'orderby=name&hide_empty=0');

	if (count($terms) > 0) {
		foreach ($terms as $term) {
			$cat[] = [
				'label' => '分类：' . $term->name,
				'value' => $term->term_id
			];
		}
	}

	/*
	 * 遍历标签
	 * */
	$tags = get_terms("post_tag");

	if (count($tags) > 0) {
		foreach ($tags as $tag) {
			$cat[] = [
				'label' => '标签：' . $tag->name,
				'value' => $tag->term_id
			];
		}
	}

	return $cat;
}


/*
 * 提交百度token
 * */
function des_seo(){
    echo '<a-form-item label="相关操作">';
    echo '<a-button type="primary" @click="postLink">提交站点URL到百度</a-button>';
	echo '</a-form-item>';
	echo '<a-form-item label="相关操作">';
	echo '<a-space>
            <a-button type="primary" @click="sitemap">生成txt站点地图</a-button>
            <a-button type="primary" @click="lookSitemap">查看txt站点地图</a-button>
          </a-space>';
	echo '</a-form-item>';
}
