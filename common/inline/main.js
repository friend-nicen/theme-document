/*
* 切换主题皮肤
* */
function toggleTheme(flag = true) {
    if (flag) {
        //暗黑主题
        $('html').addClass('dark');
        //白天主题
        $('html').removeClass('personal');
        //标记暗黑模式
        localStorage.setItem('night', 1);
        //改变图标
        $(function () {
            $('.read-mode i').removeClass("icon-baitian-qing");
            $('.read-mode i').addClass("icon-yueliang");
        });
    } else {
        //暗黑主题
        $('html').removeClass('dark');
        //白天主题
        $('html').addClass('personal');
        //移除暗黑模式标记
        localStorage.removeItem('night');
        //改变图标
        $(function () {
            $('.read-mode i').removeClass("icon-yueliang");
            $('.read-mode i').addClass("icon-baitian-qing");
        });
    }
}


/*
* 动态rem
* */
let l = () => {
    let r = document.documentElement, o = r.offsetWidth / 100;
    o < 17 && (o = 17), r.style.fontSize = o + "px", window.rem = o
};
window.onresize = l;
l();

/*同步主题*/
let theme = localStorage.getItem('theme-color');
if (!!theme) {
    $('html').addClass(theme)
}
/*同步阅读模式 */
let night = localStorage.getItem('night');

/*
* 是否需要切换模式
* */
if (!!night) {
    toggleTheme(true); //切换暗黑
}

/*
* 获取元素在网页的实际top
* */
$.fn.getTop = function () {
    let position = this.position();
    /*
    * 为0代表有很多offsetTop要计算
    * */
    if (position.top !== 0) {
        return position.top;
    } else {
        let html = $('html').get(0);
        return this.get(0).getBoundingClientRect().top + html.scrollTop;
    }
}


/*jq内存清理函数*/
$.fn.removeWithLeakage = function () {
    this.each(function (i, e) {
        $("*", e).add([e]).each(function () {
            $.event.remove(this);
            $.removeData(this);
        });
        if (e.parentNode)
            e.parentNode.removeChild(e);
    });
};
