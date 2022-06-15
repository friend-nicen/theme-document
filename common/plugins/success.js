(function () {

    /*
    * 成功文字块样式
    * */
    tinymce.create('tinymce.plugins.success', {
        init: function (ed, url) {
            ed.addButton('success', {
                title: '成功文字提示',
                image: url + '/icon/success.svg',
                onclick: function () {
                    ed.selection.setContent('[success title="文字块标题"]' + ed.selection.getContent() + '[/success]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('success', tinymce.plugins.success);
})();