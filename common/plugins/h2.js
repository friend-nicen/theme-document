(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.h2', {
        init: function (ed, url) {

            ed.addButton('h2', {
                title: 'h2标题',
                image: url + '/icon/h-2.svg',
                onclick: function () {
                    ed.selection.setContent('[h2]' + ed.selection.getContent() + '[/h2]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('h2', tinymce.plugins.h2);
})();