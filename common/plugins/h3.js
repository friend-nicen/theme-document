(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.h3', {
        init: function (ed, url) {

            ed.addButton('h3', {
                title: 'h3标题',
                image: url + '/icon/h-3.svg',
                onclick: function () {
                    ed.selection.setContent('[h3]' + ed.selection.getContent() + '[/h3]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('h3', tinymce.plugins.h3);
})();