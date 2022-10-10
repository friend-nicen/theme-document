(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.alert', {
        init: function (ed, url) {

            ed.addButton('alert', {
                title: '警告文字提示',
                image: url + '/icon/alert.svg',
                onclick: function () {
                    ed.selection.setContent('[alert title="文字块标题"]' + ed.selection.getContent() + '[/alert]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('alert', tinymce.plugins.alert);
})();