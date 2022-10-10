(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.h1', {
        init: function (ed, url) {

            ed.addButton('h1', {
                title: 'h1标题',
                image: url + '/icon/h-1.svg',
                onclick: function () {
                    ed.selection.setContent('[h1]' + ed.selection.getContent() + '[/h1]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('h1', tinymce.plugins.h1);
})();