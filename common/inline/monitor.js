/*
* @author 友人a丶
* @date 2022-08-12
* 
* */


/*
* 防止子容器触发父容器的滚动
* */
$.fn.scrollUnique = function () {
    return $(this).each(function () {
        var eventType = 'mousewheel';
        // 火狐是DOMMouseScroll事件
        if (document.mozHidden !== undefined) {
            eventType = 'DOMMouseScroll';
        }
        $(this).on(eventType, function (event) {

            // 一些数据
            var scrollTop = this.scrollTop,
                scrollHeight = this.scrollHeight,
                height = this.clientHeight;

            var delta = (event.originalEvent.wheelDelta) ? event.originalEvent.wheelDelta : -(event.originalEvent.detail || 0);

            if ((delta > 0 && scrollTop <= delta) || (delta < 0 && scrollHeight - height - scrollTop <= -1 * delta)) {
                // IE浏览器下滚动会跨越边界直接影响父级滚动，因此，临界时候手动边界滚动定位
                this.scrollTop = delta > 0 ? 0 : scrollHeight;
                // 向上滚 || 向下滚
                event.preventDefault();
            }
        });
    });
};


$(function () {

    /*阅读导航栏初始化*/
    (function () {
        /*
        * 给目录添加展开伸缩图标
        * */
        $('.first-index').each(function () {
            let that = $(this);
            if (that.parent().next().children('div').is('.secondary-index')) {
                that.prepend('<i class="iconfont icon-xiangxiazhankai1"></i>');
            }
        })

        $('.secondary-index').each(function () {
            let that = $(this);
            if (that.parent().next().children('div').is('.thrid-index')) {
                that.prepend('<i class="iconfont icon-xiangxiazhankai1"></i>');
            }
        })


    })();


    /*
    * 屏蔽文章导航滚动事件向上传递
    * */
    (function () {
        $('.scroll').scrollUnique();
        $('.scroll').on('scroll', function (e) {
            e.stopPropagation(); //停止向上传递事件
        })
    })();

    //防止重复触发目录滚动
    //正在滚动是 左侧文章目录不重复滚动
    let isScroll = false;


    /*阅读目录初始化*/
    (function () {


        /*导航跳转*/
        function goto(Index) {


            let tops = Index[0].offsetTop;

            line.height(Index.height());//初始化滚动条高度
            line.css("top", `${tops}px`);//索引条开始滑动

            /*
            * 判断外层容器是否需要滚动
            * */

            /*向下*/
            let scroll = $('.scroll').get(0); //可滚动的导航

            /*
            * 文章滚动时，目录自动翻页向下、向上
            * */
            if (tops >= (scroll.scrollTop + scroll.offsetHeight)) {

                /*防止重复触发滚动*/
                if (isScroll) {
                    return;
                }

                /*标记正在滚动的状态*/
                isScroll = true;


                $(scroll).animate({scrollTop: tops - 100}, 200, function () {
                    isScroll = false;
                })
            }


            /*向上*/
            if (tops < scroll.scrollTop) {

                /*防止重复触发滚动*/
                if (isScroll) {
                    return;
                }
                isScroll = true;

                $(scroll).animate({scrollTop: ((tops - scroll.offsetHeight) < 0 ? 0 : tops - scroll.offsetHeight + 100)}, 200, function () {
                    isScroll = false;
                })
            }


            /*
            * 同步滚动文章页面
            * */


            /*
            * 判断文章是否需要滚动
            * */
            if (!needScroll) {

                /*
                * 目录跟随文章
                * 跟随完毕，恢复文章跟随目录点击
                * */
                needScroll = true;
                return;
            }


            let anchor = main.find(Index.find('div a').attr("href"));

            if (anchor.length != 0) {


                /*
                * 标记文章正在滚动
                * 屏蔽scroll监听事件
                * */
                watchScroll = false;//屏蔽滚动监听

                let top = anchor.getTop() - 75;

                /*
                * 滚动锚点标记
                * */
                main.animate({scrollTop: top}, 200, function () {
                    watchScroll = true;
                });

            }

        }

        /*重置状态*/
        function clear() {
            $('.main-container .main-left .first-index').css('color', '');//移除所有一级索引的颜色
            $('.main-container .main-left .secondary-index').css('color', '');//移除所有二级索引的颜色
            $('.main-container .main-left .third-index').css('color', '');//移除所有三级索引的颜色
        }


        /*绑定一级索引标签的事件*/
        $("body").on("click", '.first-index', function () {
            clear();
            goto($(this));
            $(this).css('color', 'var(--theme-color)');//被选中的一级索引变为主题色
        })

        /*绑定二级索引标签的事件*/
        $("body").on("click", '.secondary-index', function () {
            clear();
            goto($(this));
            $(this).css('color', 'var(--theme-color)');//被选中的二级索引变为主题色
            $(this).parent().parent().prev('.first-index').css('color', 'var(--theme-color)');//被选中的一级索引变为主题色
        })

        /*绑定三级索引标签的事件*/
        $("body").on("click", '.third-index', function () {
            clear();
            goto($(this));
            $(this).css('color', 'var(--theme-color)');//被选中的三级索引变为主题色
            $(this).parent().parent().prev('.secondary-index').css('color', 'var(--theme-color)');//被选中的二级索引变为主题色
            $(this).parent().parent().parent().parent().prev('.first-index').css('color', 'var(--theme-color)');//被选中的二级索引变为主题色
        })


        /*
         * 初始化导航栏滚动条
         * */

        //文章跟随目录点击
        let needScroll = true;  //目录被点击，文章是否滚动

        //目录跟随文章滚动
        let watchScroll = true; //是否需要监听文章滚动

        let line = $(".main-container .line");

        let main = $('html');
        //获取第一个一级索引标题的DOM
        let firstIndex = $('.main-container .main-left li div:first');


        //文章跟随目录点击
        needScroll = false;//屏蔽第一次滚动，标记文章不需要进行滚动
        firstIndex.trigger('click');//触发默认的第一个目录的点击事件

        /*
        * 渲染完毕后显示，防抖动闪烁
        * */
        $('.main-left').css('opacity', 1);

        /*
        * 内容滚动同步导航栏
        * */
        let timer = null;

        $(window).on('scroll', function () {

            /*
            * 屏蔽点击滚动时的事件监听
            * 如果文章目录被点击后，文章正在滚动
            * */
            if (!watchScroll) return;


            let thats = main;
            let top = thats.get(0).scrollTop;
            let collects = thats.find(".main-content").find("h1,h2,h3,h4");
            let position = null;

            /*
            * 循环判断
            * */
            for (let i = 0; i < collects.length; i++) {

                /*
                * 获取循环的jq对象
                * */
                let that = collects.eq(i);

                /*
                * 无锚点，挑出本次循环
                * */
                if (!that.attr('id')) {
                    continue;
                }

                /*
                * 获取屏幕已经滚动的高度
                * */
                let domTop = that.getTop() - 75;

                /*
                * 当前阅读的是最靠近顶部的前一个标题
                * */
                if (domTop > top) {
                    /*
                    * 特殊处理开始、结尾的目录
                    * */
                    if (i != 0) {
                        position = i - 1;
                    } else {
                        position = i;
                    }

                    break;
                }

            }


            /*
            * 如果不判断，会导致needScroll不会重置
            * 因为页面底部已经没有标签了。
            * */
            if (position === null) position = collects.length - 1;

            let parent = $("a[href='#" + collects.eq(position).attr("id") + "']").parent();
            needScroll = false;//标记文章不需要跟随目录的点击而滚动
            parent.trigger('click');


        });

    })();

    /*
    * 监控阅读位置
    * */
    (function () {


        let navigator = $('#navigator'); //文章导航
        let space = $('#space');//目录容器

        /*
        * 判断是否存在文章导航
        * 记录数据
        * */
        if (navigator.length > 0) {

            let pos = space.position();

            navigator.css('left', pos.left);
            navigator.css('top', space.getTop());
            navigator.show();

            /*
            * 跟随屏幕大小变化，调整目录的位置
            * */
            enquire.register("screen and (min-width:1024px)", {
                /*屏幕大于1024时监听屏幕大小，更新目录导航位置*/
                match() {
                    $(window).on("resize", function () {
                        navigator.css("left", space.position().left)
                    })
                },
                /*屏幕小于1024时取消监听屏幕大小*/
                unmatch() {
                    $(window).off("resize", function () {
                        navigator.css("left", space.position().left)
                    });
                }
            });
        }
    })();


    /*
    * 文章踩、文章点赞
    * */
    (function () {

        $('.icp-beian div').click(function () {

            /*
            * 判断点赞的是哪一个
            * */
            if ($('.icp-beian div').index(this) == 0) {
                /*
                * 点赞
                * */
                let that = $(this);
                $.post(location.pathname + "?nice=" + Current, function (res) {
                    that.find('span').text(parseInt(that.find('span').text()) + 1);
                });
            } else {
                /*
                  * 踩
                  * */
                let that = $(this);
                $.post(location.pathname + "?bad=" + Current, function (res) {
                    that.find('span').text(parseInt(that.find('span').text()) + 1);
                });
            }

        });
    })();
});