/*初始化*/
$(function () {

    /*
    * 控制台输出作者信息
    * */
    console.log('%cTheme of Document Ver1.0 By 友人a丶', 'background-color:#000000;color:white;padding:3px 6px;border-radius:8px;')
    console.log('%cBlog：nicen.cn', 'background-color:#000000;color:white;padding:3px 6px;border-radius:8px;');


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


    /*导航栏初始化*/
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


        /*
        * 目录的显示、隐藏事件
        *
        $('.first-index i').click(function () {
			return;
            let that = $(this);
            let dom = that.parent().parent().next().children('div');

            while(dom.is('.secondary-index')){
                dom.toggle(100);
                dom = dom.parent().next().children('div');
            }

            that.toggleClass('rotate');

        })
        */

        /*
        * 全部展开、关闭
        *
        $('.main-top .iconfont').click(function () {
            $('.first-index').next("ul").toggle(100);
        })
        */

        /*
        * 给目录绑定滚动到索引的事件
        * */
        $('.scroll a').click(function (e) {
            e.preventDefault(); //阻止默认事件

            let that = $(this);
            let index = $(that.attr('href'));

            if (index.length > 0) {
                $('html').animate({scrollTop: index.get(0).offsetTop}, 200);
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


    let isScroll = false; //防止重复触发目录滚动

    /*目录初始化*/
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

            if (!needScroll) {
                needScroll = true;
                return;
            }


            let anchor = main.find(Index.find('div a').attr("href"));

            watchScroll = false;//屏蔽滚动监听

            if (anchor.length != 0) {

                let top = anchor.get(0).offsetTop;

                /*
                * 滚动锚点标记
                * */
                main.animate({scrollTop: top}, 200, function () {
                    watchScroll = true;
                });

            }

        }

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
        let needScroll = true;
        let watchScroll = true;

        let line = $(".main-container .line");
        let main = $('html');
        //获取第一个一级索引标题的DOM
        let firstIndex = $('.main-container .main-left li div:first');
        needScroll = false;//屏蔽第一次滚动
        firstIndex.trigger('click');//默认第一个目录

        /*
        * 渲染完毕后显示，防抖动闪烁
        * */
        $('.main-left').css('opacity', 1);

        /*
        *
        * 内容滚动同步导航栏
        * */

        let timer = null;

        $(window).on('scroll', function () {

            /*
            * 屏蔽点击滚动时的事件监听
            * */
            if (!watchScroll) return;
            let thats = main;
            let top = thats.get(0).scrollTop;
            let collects = thats.find(".main-content").find("h1,h2,h3,h4");
            let position = null;

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
                * 判断高度
                * */
                if (that.get(0).offsetTop > top) {
                    position = i;
                    break;
                }

            }

            /*
            * 刷新导航栏
            * */

            /*
            * 屏蔽导航变化时的自动滚动
            * */

            needScroll = false;//标记不需要滚动
            $("a[href='#" + collects.eq(position).attr("id") + "']").parent().trigger('click');


        });

    })();

    /*
    * 回到顶部、阅读进度监控
    * */
    (function () {

        let main = $('html');
        let toTop = $('.toTop');
        let progress = $('#progress');
        let navigator = $('#navigator'); //文章导航
        let space = $('#space');


        console.log("滚动")

        /*
        * 判断是否存在文章导航
        * 记录数据
        * */
        if (navigator.length > 0) {
            let pos = space.position();
            navigator.css('left', pos.left);
            navigator.css('top', pos.top);
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
        * 右边内容栏的sticky效果
        * */

        let isFixed = false;
        let right = $("#right");

        if (right.length != 0) {

            let position = right.position();

            /*
            * 计算触发stiky的临界值（窗口顶部到容器底部的总高度）,减去的底部间距
            * */
            let bottom = right.get(0).offsetHeight + position.top + (1.5 * rem)
            let value = bottom - window.innerHeight;


            /*
            * 滚动、屏幕大小变化时，动态更新右侧侧边栏的位置
            * */
            function toFixed() {

                let main = $('html').get(0);
                let fixed = $('#fixed');
                if (right.length == 0 || isFixed) return;
                isFixed = true;


                /*
                * 当窗口高度+滚动高度=bottom，代表可以触发stiky 固定右边内容了；
                * */

                if (main.scrollTop > value) {

                    right.css('left', fixed.position().left + rem);
                    right.css('bottom', '0.5rem');
                    right.css('position', 'fixed');

                } else {
                    right.css('position', 'static');
                }

                isFixed = false;

            }


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


        /*
        * 阅读模式切换（白天、黑暗）
        * */
        $('.readMode').click(function () {
            $('html').toggleClass('dark');

            let img = $(this).find('img');

            if (img.attr('src').indexOf("baitian") == -1) {
                localStorage.removeItem('night');
                $('meta[name=theme-color]').attr('content','#ffffff');
                img.attr('src', ROOT + '/assets/images/baitian.svg').attr("title", '切换夜间模式');
            } else {
                localStorage.setItem('night', 1);
                $('meta[name=theme-color]').attr('content','#141414');
                img.attr('src', ROOT + '/assets/images/anhei.svg').attr("title", '切换白天模式');
            }
        })


    })();


    /*
    * 主题色改变
    * */
    (function () {

        let html = $('html');

        $('.theme-color div').click(function () {
            let theme = $(this).attr('class');
            if (html.hasClass('dark')) {
                html.removeClass();
                html.addClass(['dark', theme]);
            } else {
                html.removeClass();
                html.addClass(theme);
            }
            localStorage.setItem('theme-color', theme);
        })
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

        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
            draggable: true,
            autoplayVideos: true
        });
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

    /*
    * 文章搜索
    * */
    (function () {

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
    * 回复评论时自动滚动到指定位置
    * */
    if (location.search.indexOf('replytocom') != -1) {
        let top = ($('.comment-form').position().top - 100);
        $('html').get(0).scrollTop = top;
    }


    /*
    * 移动端监听导航栏菜单
    * */


    /*
    * 动态菜单宽度
    * */
    let navWidth = '60%';


    function expandNav() {

        let right = $(".right");
        let daohang = $('.daohang');

        /*
        * 判断宽度
        * */
        if (window.innerWidth > 475) {
            right.css('width', '45%');
            navWidth = '45%';
        } else {
            right.css('width', '60%');
            navWidth = '60%';
        }


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

    function toShow(){
        $(this).find('.sub-menu').toggle();
    }

    enquire.register("screen and (max-width: 1024px)", {
        match() {
            $(".daohang").on('click', expandNav);
            $('.menu-item').on('click',toShow);
        },
        /*屏幕大于1024时取消监听屏幕大小*/
        unmatch() {
            $(".daohang").off('click', expandNav);
            $('.menu-item').off('click',toShow);
        }
    });


});

