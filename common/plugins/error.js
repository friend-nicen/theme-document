(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.error', {
        init: function (ed, url) {

            ed.addButton('error', {
                title: '错误文字提示',
                image: url + '/icon/error.svg',
                onclick: function () {
                    ed.selection.setContent('[error title="文字块标题"]' + ed.selection.getContent() + '[/error]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('error', tinymce.plugins.error);
})();