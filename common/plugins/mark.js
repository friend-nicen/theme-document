(function () {
    
    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.mark', {
        init: function (ed, url) {

            ed.addButton('mark', {
                title: '文字标记',
                image: url + '/icon/mark.png',
                onclick: function () {
                    ed.selection.setContent('[mark]' + ed.selection.getContent() + '[/mark]');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('mark', tinymce.plugins.mark);
})();