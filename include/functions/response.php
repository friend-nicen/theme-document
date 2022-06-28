<?php
/*
 * 处理所有前端请求
 * */


/*
 * 点赞
 * */

if (isset($_GET['nice'])) {
    if (is_numeric($_GET['nice'])) {
        setPostNice($_GET['nice']);

        /*
         * 增加作者点赞次数
         * */

        $query = new WP_Query(array('p' => $_GET['nice']));
        $auhor = $query->post->post_author; //作者id

        setAuthorNice($auhor);//作者获赞总数+1


        exit(json_encode([
            'code' => 1,
            'errMsg' => "点赞成功！"
        ]));
    }
}

/*
 * 踩
 * */

if (isset($_GET['bad'])) {
    if (is_numeric($_GET['bad'])) {
        setPostBad($_GET['bad']);
        exit(json_encode([
            'code' => 1,
            'errMsg' => "踩成功！"
        ]));
    }
}


/*
 * 踩
 * */

if (isset($_GET['submit'])) {

    $token = get_option("document_baidu");

    /*
     * 检查token
     * */
    if (empty($token)) {
        exit("token尚未填写，无法进行推送！");
    }

    $site_url = site_url();//获取站点url

    $api = 'http://data.zz.baidu.com/urls?site=' . $site_url . '&token=' . $token;
    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $api,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => implode("\n", getLinks()),
        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
    );

    curl_setopt_array($ch, $options);
    $result = curl_exec($ch);

    /*
     * 输出推送结果
     * */
    exit($result);
}