if (window._ts) {
    /* 获取当前时间的时间戳（单位：秒） */
    const currentTime = Math.floor(Date.now() / 1000);
    /* 计算时间差（单位：秒） */
    const timeDiff = currentTime - window._ts;
    /* 判断时间差是否超过 60 秒 */
    if (timeDiff > 60) {
        $.post(location.pathname + "?document_view=" + Current, function (res) {
            const data = JSON.parse(res);
            $(() => {
                $("div.article-info > ul > li:nth-child(4)").html(`<i class="iconfont icon-icon-test"></i>${data.view}热度`)
            })
        });
    }
}