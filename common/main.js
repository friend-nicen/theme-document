/*初始化*/
$(function () {

    /*
    * 回复评论时自动滚动到指定位置
    * */
    if (location.search.indexOf('replytocom') != -1) {
        let top = ($('.comment-form').getTop() - 100);
        $('html').get(0).scrollTop = top;
    }


    /*
    * 回到顶部、阅读进度监控
    * */
    (function () {

        let main = $('html');
        let toTop = $('.toTop');
        let progress = $('#progress');

        /*
        * html的scrollTop在微信端无法正常获取值
        * */

        /*初始化加载后的首次进度*/
        progress.text((((window.scrollY + main.get(0).clientHeight) / main.get(0).scrollHeight) * 100).toFixed(0) + "%")

        /*
        * 返回顶部按钮被点击
        * */
        $('.toTop').click(function () {
            main.animate({scrollTop: 0}, 200, "linear", function () {
                window.scrollTo(0, 0);
            });
        });


        /*
        * 监控阅读进度
        * */
        $(window).on('scroll', function () {

            let that = main.get(0);


            /*
            * 判断是否需要显示
            * */
            if (window.scrollY > 0) {
                toTop.css('visibility', 'visible');//显示回到顶部
            } else {
                toTop.css('visibility', 'hidden');
            }

            /*
            * 同步阅读进度
            * */
            progress.text((((window.scrollY + that.clientHeight) / that.scrollHeight) * 100).toFixed(0) + "%")
        })


        /*
        * 阅读模式切换（白天、黑暗）
        * */
        $('.read-mode').click(function () {
            if ($(this).find('i').hasClass("icon-yueliang")) {
                toggleTheme(false); //切换白天模式
            } else {
                toggleTheme(true); //切换暗黑模式
            }
        });

    })();


    /*
    *
    * 灯箱
    * */
    (function () {
        /*屏蔽其他页面加载*/
        if (typeof GLightbox == "undefined") {
            return;
        }
        /*初始化灯箱*/
        GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
            draggable: true,
            autoplayVideos: true
        });
    })();


    /*
    * 文章搜索
    * */
    (function () {
        /*
        * 点击搜索按钮弹出搜索框
        * */
        $('.icon-sousuo').on("click", function (event) {
            let that = $('#search');
            if (that.val() == "") {
                return
            } else {
                location.href = location.origin + "?s=" + that.val();
            }
        });


        /*
        * 回车时开始搜索
        * */
        $('#search').on("keypress", function (event) {
            let that = $(this);
            if (that.val() == "") {
                return
            } else {
                if (event.keyCode == "13") {
                    location.href = location.origin + "?s=" + that.val();
                }
            }
        });


    })();


    /*
    * 动态移动端菜单宽度
    * */
    (function () {

        let navWidth = '60%';


        /*
        * 展开导航
        * */
        function expandNav() {

            let right = $(".right");
            let daohang = $('.daohang');

            if (daohang.hasClass('icon-cha')) {
                right.css('left', '-' + navWidth)
                daohang.removeClass('icon-cha');
                daohang.addClass('icon-daohangmoren');
            } else {
                right.css('left', 0);
                daohang.addClass('icon-cha');
                daohang.removeClass('icon-daohangmoren');
            }

        }

        enquire.register("screen and (max-width: 1024px)", {
            match() {
                $(".daohang").on('click', expandNav);
            },
            /*屏幕大于1024时取消监听屏幕大小*/
            unmatch() {
                $(".daohang").off('click', expandNav);
            }
        });

    })();


    /*
    * 固定右边栏
    * */
    (function () {
        /*
         * 右边内容栏的sticky效果
         * */
        window.computed = () => {
        };//暴露到全局
        window.toFixed = () => {
        };//暴露到全局

        let isFixed = false;
        let html = $('html');
        let fixed = $('#fixed'); //右侧固定容器
        let right = $('#right'); //右边栏
        let main = $(".main-main"); //中间内容

        //获取底部DOM高度
        let footerHeight = $('.main-bottom').outerHeight();

        /*
        * 左侧固定
        * 判断是否有左边栏
        * */
        let space = $('#space');

        if (space.length > 0) {
            var navigator = $('#navigator'); //右侧边栏容器
            var topHeight = navigator.outerHeight(); //有侧边栏高度
            var topTop = $('#space').getTop();
            var topOffset = innerHeight - topHeight - topTop;
        }

        if (right.length != 0) {


            let muchBottom = 0;//右边栏底部距离

            let _static, _absolute; //存放中间内容和右边容器的高度

            /*
            * 右侧是不变的
            * */

            let react_fixed = fixed.get(0).getBoundingClientRect();
            let fixed_top = fixed.getTop(); //右边栏距离网页顶部的距离

            /*
            * 计算右边栏底部和屏幕底部重合时，网页的滚动大小
            * */
            _static = fixed_top + react_fixed.height - innerHeight;


            /*
            * 动态计算位置
            * */
            function computed() {

                if (space.length > 0) {
                    topTop = $('#space').getTop();
                    topHeight = navigator.outerHeight(); //有侧边栏高度
                    topOffset = innerHeight - topHeight - topTop;
                }

                let react_main = main.get(0).getBoundingClientRect();

                /*
                * 保持static，变成fixed的临界值
                * 因为底部出现时，看的是上方的滚动距离 -innerHeight 的位置滚出屏幕了，代表main的底部出现了
                * */
                _absolute = main.getTop() + react_main.height + rem - innerHeight;

                /*
                * 中间小于右边时取右边
                * */
                if (_absolute < _static) {
                    _absolute = _static;
                }

            }

            computed(); //初始计算
            window.computed = computed;//暴露到全局


            /*
            * 固定左侧偏移
            * */
            let isfixedLeft = false;

            /*
            * 左侧边栏位置检测
            * */
            function fixedLeft() {

                let html_scrollTop = html.scrollTop();


                if (html_scrollTop >= _absolute) {

                    isfixedLeft = true;
                    topHeight = navigator.outerHeight();
                    topOffset = innerHeight - topHeight - topTop;

                    
                    /*左侧文章开始偏移*/
                    /*左侧top+高度+偏移量*/
                    /*
                    * @param topHeight 左侧边栏高度
                    * @param topTop, Top偏移值
                    * */


                    if ((topTop + topHeight + html_scrollTop) >= (_absolute + innerHeight)) {

                        /*
                        * 最小不会小于#space的Top
                        * */
                        let top = topTop + topOffset - (html_scrollTop - _absolute) - rem;

                        /*最小top*/
                        let min = space.getTop();

                        /*
                        * 如果需要的top小于最小top
                        * 文并且章导航大于文章列表高度
                        * 重置为60
                        * */
                        if (min > top && navigator.height() > main.height()) {
                            top = min;
                        }

                        /*
                        * 如果导航栏+文章目录+底部 小于屏幕高度
                        * */

                        let max = footerHeight + 60 + navigator.height() + (2 * rem);

                        if (max < innerHeight) {
                            top = min;
                        }



                        navigator.css('top', top);
                    }

                } else {

                    if (isfixedLeft) {
                        /*左侧文章开始复位*/
                        navigator.animate({
                            top: topTop
                        }, 'fast')

                        isfixedLeft = false;
                    }
                }
            }


            /*
            * 计算
            *
            * 已经滚动的距离+屏幕的高度>=main-main的top+height，代表要absolute固定到底部
            * 已经滚动的距离+屏幕的高度>= #fixed的top+height，代表要fixed
            *     如果块小于屏幕高度，应该直接top到顶部
            *     如果块大于屏幕高度，应该直接bottom到底部
            *
            * 已经滚动的距离+屏幕的高度 < #fixed的top+height，static
            *
            *
            * 如果块大于main-main,应该直接保持static
            *
            * rect 获取的top=dom绝对于容器的top-滚动的距离；
            *
            * 所以当前top+初始top=滚动距离
            * 初始top=滚动距离+当前top
            *
            * right不存在、isFixed防抖时，不需要触发
            *
            * 还应该减去屏幕高度，代表临界值在屏幕底部出现时的位置
            *
            * 进行高度比较时，应该+上屏幕高度
            *
            *
            *
            * 如果左边大于右边，右边没有占满屏幕？应该保持fixed
            * */


            /*
            * 滚动、屏幕大小变化时，动态更新右侧侧边栏的位置
            * */
            function toFixed() {

                /*
                * 如果有左侧边栏
                * */
                if (space.length > 0) {
                    fixedLeft();//左侧位置检测
                }

                /*
                * 如果没有右边栏
                * */
                if (right.length == 0 || isFixed) return;

                /*
                * 右侧大于左侧，保持static
                * */
                if (_static > _absolute) {
                    return;
                }

                isFixed = true;//标记正在滚动

                // 已经滚动的距离
                let html_scrollTop = html.scrollTop();

                /*
                * 大于保持静态，小于保持绝对
                * */
                if (html_scrollTop >= _static && html_scrollTop <= _absolute) {

                    right.css('left', fixed.position().left + rem);

                    /*
                    * 如果块的高度小于屏幕高度
                    * 应该从top定位
                    * */

                    if ((_static + innerHeight) > innerHeight) {
                        right.css('top', '');
                        right.css('bottom', '0');
                    } else {
                        right.css('bottom', '');
                        right.css('top', fixed_top);
                    }

                    /*右侧固定定位*/
                    right.css('position', 'fixed');

                } else {

                    /*
                      * 底部固定
                      * */

                    if ((footerHeight + right.height() + 70) <= innerHeight) {

                        /*右侧固定定位*/
                        right.css('bottom', '');
                        right.css('top', fixed_top);
                        right.css('position', 'fixed');

                    } else if (html_scrollTop >= _absolute) {


                        /*
                        * 如果右边最长，就不需要触发绝对定位
                        * */
                        if (_absolute != _static) {
                            /*右侧绝对定位*/
                            right.css('position', 'absolute');
                            right.css('top', '');
                            right.css('bottom', muchBottom);
                        }


                    } else {
                        /*右侧静态定位*/
                        right.css('position', 'static');
                    }
                }

                isFixed = false;
            }


            window.toFixed = toFixed;//暴露到全局


            /*
            * 判断是否需要监听右侧侧边栏位置更新
            * */
            enquire.register("screen and (min-width:1024px)", {
                /*屏幕大于1024时监听屏幕大小，更新目录导航位置*/
                match() {
                    $(window).on('scroll', toFixed); //页面滚动时更新
                    $(window).on('resize', toFixed); //页面大小变化时更新
                },
                /*屏幕小于1024时取消监听屏幕大小*/
                unmatch() {
                    $(window).off('scroll', toFixed); //页面滚动时更新
                    $(window).off('resize', toFixed); //页面大小变化时更新
                },
                /*页面加载时判断是否需要监听更新位置*/
                setup() {
                    if (window.innerWidth > 1024) {
                        toFixed(); //页面初始化时更新一次
                    }
                }
            });
        }

    })();


    /*
    * 移动端向下阅读时隐藏导航栏，上滑显示导航栏
    * mode boolean true 下滑显示 false 上移隐藏
    *
    * */
    (function () {
        let timer = null; //计时器
        let header = $('.main-header'); //导航栏对象

        let toggleHeader = function () {


            /*
            * 导航栏本身高度64
            * */
            if (window.scrollY < 64) {
                header.css('opacity', "1");
                clearTimeout(timer);
                timer = null;
                return;
            }


            /*
            * 防抖
            * */
            if (timer) {
                return;
            }

            let old_top = window.scrollY;//记录初值

            /*
            * 交流+延时判断
            * */
            timer = setTimeout(() => {

                let new_top = window.scrollY;//记录初值
                if (new_top < old_top) {
                    header.css('opacity', "1");
                } else {
                    header.css('opacity', "0");
                }
                clearTimeout(timer);
                timer = null;
            }, 200)
        }


        /*
        * 屏幕大小监听
        * */
        enquire.register("screen and (max-width: 480px)", {
            match() {
                $(window).on('scroll', toggleHeader)
            },
            /*屏幕大于1024时取消监听屏幕大小*/
            unmatch() {
                $(window).off('scroll', toggleHeader)
            }
        });

    })();


    /*
    * 主题色改变
    * */
    (function () {

        let html = $('html');
        /*改变主题色*/
        $('.theme-color div').click(function () {
            let theme = $(this).css('background-color');

            let size = html.css('font-size'); //字体大小

            html.attr("style", `font-size:${size};--theme-color:${theme}!important; `);
            localStorage.setItem('theme-color', $(this).attr('class'));

        })

    })();

});

