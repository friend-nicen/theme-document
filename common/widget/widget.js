/*
* @author 友人a丶
* @date 2022-08-12
* 
* */
let vm = false;//vue对象


/*
* Banner 脚本
* */
jQuery(function () {

    const $ = jQuery;
    let hook_dom, media; //输入框
    const selectMedia = () => {
        if (!hook_dom) return;
        const image = media.state().get('selection').toJSON()[0].url;
        hook_dom.val(image); //更新数据
        hook_dom.trigger("change"); //触发change
    }


    /* 加载媒体库 */
    media = wp.media({
        title: '选择或上传图片', // 窗口标题
        button: {
            text: '选择', // 选择按钮文字
        },
        editable: true,
        allowLocalEdits: true,
        displaySettings: true,
        displayUserSettings: true,
        multiple: false // 是否允许多选
    });

    /* 媒体选择 */
    media.on("select", selectMedia);


    $('body').on("click", function () {

        /*
        * 初始化时间选择
        * */
        $(".select-datetime").each(function () {
            let id = $(this).data("count");
            let dom = $("#select-datetime-" + id);

            if (dom) {
                dom.datepicker({
                    altFormat: "yy-mm-dd"
                });
            }
        })
        /*
        * 初始化媒体选择
        * */
        $(".select-media").on("click", function () {
            if (!media) return;
            hook_dom = $(this).parent().find("input");
            media.open();
        })


        if ($('.widget-liquid-right #jq-tabs').length == 0 || vm) {
            return;
        }

        vm = true;//标记已加载
        $(".widget-liquid-right #jq-tabs").tabs();//加载Tab
    });

    /*自定义xhr对象*/
    function ajaxEventTrigger(event) {
        var ajaxEvent = new CustomEvent(event, {detail: this});
        window.dispatchEvent(ajaxEvent);
    }

    var oldXHR = window.XMLHttpRequest;

    function newXHR() {
        var realXHR = new oldXHR();
        realXHR.addEventListener('abort', function () {
            ajaxEventTrigger.call(this, 'ajaxAbort');
        }, false);
        realXHR.addEventListener('error', function () {
            ajaxEventTrigger.call(this, 'ajaxError');
        }, false);
        realXHR.addEventListener('load', function () {
            ajaxEventTrigger.call(this, 'ajaxLoad');
        }, false);
        realXHR.addEventListener('loadstart', function () {
            ajaxEventTrigger.call(this, 'ajaxLoadStart');
        }, false);
        realXHR.addEventListener('progress', function () {
            ajaxEventTrigger.call(this, 'ajaxProgress');
        }, false);
        realXHR.addEventListener('timeout', function () {
            ajaxEventTrigger.call(this, 'ajaxTimeout');
        }, false);
        realXHR.addEventListener('loadend', function () {
            ajaxEventTrigger.call(this, 'ajaxLoadEnd');
            $(".widget-liquid-right #jq-tabs").tabs();
        }, false);
        realXHR.addEventListener('readystatechange', function () {
            ajaxEventTrigger.call(this, 'ajaxReadyStateChange');
        }, false);
        return realXHR;
    }

    window.XMLHttpRequest = newXHR;

})
