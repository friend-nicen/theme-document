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



/**
 * 插件升级
 */
function des_theme_update()
{

    echo '
		<a-form-item label="版本信息">
		  		当前版本（' . esc_html(DOCUMENT_VERSION) . '）/ 最新版本（{{version}}）
	    </a-form-item>
	    <a-form-item label="BUG反馈">
		  		微信号good7341、Github提交issue、博客nicen.cn下方留言均可
	    </a-form-item>
	    <a-form-item label="仓库地址">
		  		Github：<a target="_blank" href="https://github.com/friend-nicen/theme-document">https://github.com/friend-nicen/theme-document</a>
				<br />
				Gitee：<a target="_blank" href="https://gitee.com/friend-nicen/theme-document">https://gitee.com/friend-nicen/theme-document</a>
				<br />
				博客：<a target="_blank" href="https://nicen.cn/1552.html">https://nicen.cn/1552.html</a>
				<br />
				仓库内的版本永远是最新版本，如您觉得插件给你带来了帮助，欢迎star！祝您早日达成自己的目标！
	    </a-form-item>
	';

}
