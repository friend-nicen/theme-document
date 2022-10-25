(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.u', {
        init: function (ed, url) {

            ed.addButton('u', {
                title: '下划线',
                image: url + '/icon/u.svg',
                onclick: function () {
                    ed.selection.setContent('<u>' + ed.selection.getContent() + '</u>');
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('u', tinymce.plugins.u);
})();