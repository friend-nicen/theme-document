(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.image', {
        init: function (ed, url) {

            ed.addButton('image', {
                title: '图片灯箱',
                image: url + '/icon/h-1.svg',
                onclick: function () {
                    ed.selection.setContent('[image title="图片说明文字"]' + ed.selection.getContent() + '[/image]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('image', tinymce.plugins.image);
})();