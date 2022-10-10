/*
* @author 友人a丶
* @date 2022-08-12
* 弹出层
* */



/*
* 配置antd
* */
let message = antd.message;
let Modal = antd.Modal;

message.config({
    top: `50px`,
    duration: 3,
    maxCount: 3,
});

let hide = null;

let load = {

    loading(text = '加载中...') {
        hide = message.loading(text, 0);
    },

    loaded() {
        if (hide) {
            hide();
        }
    },
    success(text = '加载成功！') {
        message.success(text);
    },
    error(text = '加载异常') {
        message.error(text);
    },
    confirm(text, callback = null, cancel = null) {
        Modal.confirm({
            title: '提示',
            centered: true,
            content: text,
            maskClosable: false,
            onOk: (close) => {
                close(); //关闭
                if (callback) {
                    callback()
                }
            }, onCancel: (close) => {
                close(); //关闭
                if (cancel) {
                    cancel()
                }
            }
        })
    }
}
