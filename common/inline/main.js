/*
* 切换主题皮肤
* */
function toggleTheme(flag=true){
    if(flag){
        //暗黑主题
        $('html').addClass('dark');
        //白天主题
        $('html').removeClass('personal');
        //标记暗黑模式
        localStorage.setItem('night', 1);
        //同步谷歌状态栏颜色
        $('meta[name=theme-color]').attr('content', '#141414');
        //改变图标
        $(function () {
            $('.read-mode i').removeClass("icon-baitian-qing");
            $('.read-mode i').addClass("icon-yueliang");
        });
    }else{
        //暗黑主题
        $('html').removeClass('dark');
        //白天主题
        $('html').addClass('personal');
        //移除暗黑模式标记
        localStorage.removeItem('night');
        //同步谷歌状态栏颜色
        $('meta[name=theme-color]').attr('content', $('html').css("--theme-color"));
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
window.onresize = l;l();


/*同步谷歌状态栏*/
$('meta[name=theme-color]').attr('content', $('html').css("--theme-color"));
/*同步阅读模式 */
let night = localStorage.getItem('night');

/*
* 是否需要切换模式
* */
if (!!night) {
    toggleTheme(true); //切换暗黑
    /*同步谷歌状态栏*/
    $('meta[name=theme-color]').attr('content', '#141414');
}