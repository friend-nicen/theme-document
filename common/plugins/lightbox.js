(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.lightbox', {
        init: function (ed, url) {

            ed.addButton('lightbox', {
                title: '图片灯箱',
                image: url + '/icon/image.svg',
                onclick: function () {
                    ed.selection.setContent('[lightbox title="图片说明文字"]' + ed.selection.getContent() + '[/lightbox]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('lightbox', tinymce.plugins.lightbox);
})();