/*
  * 动态加载下一页
  * */
$(function () {

    /*
        节流
     */
    function throttle(cb, wait = 3000) {
        let previous = 0;
        return (...args) => {
            const now = +new Date();
            if (now - previous > wait) {
                previous = now;
                cb.apply(this, args);
            }
        }
    }


    (function () {


        let is_loading = false; //是否正在加载
        let html = $("html"); //dom


        /*
        * 改变加载效果
        * */
        function change(load, flag = true) {

            let icon = load.find(".iconfont");

            if (flag) {
                icon.css('display', 'inline-block'); //显示加载效果
                icon.addClass("animate-rotate"); //显示加载动画
                load.find('span').text("加载中..."); //加载文字
            } else {
                icon.hide(); //显示加载效果
                icon.removeClass("animate-rotate"); //显示加载动画

                /*判断是否还有下一页*/
                if (load.data('next')) {
                    load.find('span').text("点击查看更多"); //加载文字
                } else {
                    load.find('span').text("没有更多了"); //加载文字
                }

            }

        }

        /*
        * 动态绑定点击加载时间
        * */


        $(".main-content").on('click', '.loadnext', function () {

            /* 正在加载，终止请求 */
            if (is_loading) {
                return;
            }

            is_loading = true;//标记正在加载

            const load = $(this);

            /*
            * 没有下一页了
            * */
            if (load.data('next') == "") {
                return;
            }

            change(load); //显示加载效果

            /* 请求下一页的文章 */
            $.post(load.data('next'), 'pagination=yes', function (res) {

                let list = $(res).find('.i-article');
                load.parent().before(list); //插入加载的文章


                /*
                * 修改下一页的链接
                * */
                load.data("next", $(res).find('.loadnext').data('next'));

                computed(); //重新定位位置
                toFixed(); //重定位
                change(load, false); //显示加载效果

                if (!$("#space").is(":visible")) return;

                const catelog = $("#navigator .scroll ul");
                let number = catelog.find('li').length;

                /* 遍历刷新目录 */
                list.each(function (index, item) {

                    let linkId = $(item).find("h2").attr("id");
                    let title = $(item).find("h2 a").text();

                    catelog.append(`<li>
                                       <div class="first-index">
                                           <div>
                                               <a href="#${linkId}" title="${title}">
                                               ${(index + number + 1)}. ${title}
                                               </a>
                                            </div>
                                       </div>
                                  </li>`);
                });


            }).always(function() {
                is_loading = false;//标记加载结束
            });

        })


        /* 判断是否在主页 */
        if (IN_HOME) {
            if (!Auto_load_index) {
                return
            }
        } else {
            if (!Auto_load_else) {
                return
            }
        }

        /*
        * 触底自动加载
        * */
        const load = throttle(() => {
            $(".main-content .loadnext").click();
        }, 500);

        $(window).on("scroll", () => {
            if ((html.scrollTop() + window.innerHeight + 1) >= html.innerHeight()) {
                load();
            }
        });
    })();


    /*
    * 同步动态栏目
    * */
    window.onload = () => {

        /* 判断是否为站内跳转 */
        const referer = document.referrer;

        if (DYNAMIC && (referer.indexOf(location.host) > -1)) {
            /* 保存被选的tab */
            let ActiveTab = localStorage.getItem("ActiveTab");
            let tabPane = $('.tab[data-key=' + ActiveTab + ']');
            tabPane.click(); //触发点击事件
        } else {
            localStorage.removeItem("ActiveTab");
        }
    }

    /*
    * 是否需要动态栏目
    * */
    (function () {

        /*
        * 如果开启了动态栏目
        * */
        if (DYNAMIC) {

            let activeTabs = 0;

            /* 为定义活动tab */
            if (!window.activeTab) {
                Object.defineProperty(window, 'activeTab', {
                    set(value) {

                        /*
                        * 加载目录树
                        * */
                        if (!$("#space").is(":visible")) return;

                        if (activeTabs != value) {

                            let list = $("#navigator .scroll ul");

                            list.removeWithLeakage(); //移除所有子元素

                            let catelist = $("#navigator .scroll");

                            let insert = `<ul>`;

                            /*
                            * 获取被激活的目录
                            * */
                            let catelog = $(".main-main .article-list:visible .i-article");

                            /*
                            * 插入文章目录
                            * */
                            catelog.each(function (index, item) {

                                let linkId = $(item).find("h2").attr("id");
                                let title = $(item).find("h2 a").text();

                                insert += `<li>
                                       <div class="first-index">
                                           <div>
                                               <a href="#${linkId}" title="${title}">
                                               ${(index + 1)}. ${title}
                                               </a>
                                            </div>
                                       </div>
                                  </li>`;
                            })

                            catelist.append(insert + `</ul>`); //插入目录
                            activeTabs = value; //同步值
                        }


                    }, get() {
                        return activeTabs;
                    }
                })
            }

            /*
            * 如果动态栏目被点击
            * 需要改变侧边导航
            * */
            $(".dynamic .tab").on('click', function () {

                let that = $(this);
                let tabs = $('.dynamic .tab'); //所有tab

                let index = tabs.index(that);

                /*
                * 已经显示就不加载
                * */
                if (that.hasClass('active-tab')) {
                    activeTab = index;//同步key
                    return;
                }

                /*
                  * 改变激活的css状态
                  * */
                tabs.removeClass('active-tab');
                that.addClass('active-tab');


                /*
                * 判断是否已经有加载的，已加载直接显示
                * */
                let tabPane = $('#' + that.data('key'));

                /* 保存被选的tab */
                localStorage.setItem("ActiveTab", that.data('key'));

                $('div.article-list').hide();

                /*
                * 已加载不重新加载
                * */
                if (tabPane.length > 0) {
                    tabPane.show();
                    computed(); //重新定位位置
                    toFixed(); //重定位
                    activeTab = index;//同步key
                    return;
                }

                /*
                * 显示加载动画
                * */
                $('#dynamic').css('display', 'flex');

                /*
                * 如果没有就需要加载数据
                * 制定容器，加载数据，插入容器
                * */
                let dom = $(`<div id="${that.data('key')}" class="article-list"></div>`);
                let main = $('.hasDynamic');

                /*
                * 加载数据
                * */
                $.post(that.data('url'), 'pagination=yes', function (res) {

                    let list = $(res).find('.i-article');

                    dom.append(list); //插入加载的文章
                    dom.append($(res).find('.pagination')); //插入加载的文章
                    main.append(dom);
                    $('#dynamic').hide(); //关闭加载动画
                    dom.show();
                    computed(); //重新定位位置
                    toFixed(); //重定位


                    /*
                    * 如果是加载下一页
                    * */
                    activeTab = index;//同步key
                })


            })


        }

    })();
});


