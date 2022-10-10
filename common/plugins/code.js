(function () {

    /*
    * 警告文字块
    * */
    tinymce.create('tinymce.plugins.code', {
        init: function (ed, url) {

            ed.addButton('code', {
                title: '代码高亮',
                image: url + '/icon/code.svg',
                onclick: function () {
                    ed.windowManager.open({
                        title: '代码高亮',
                        //icon:'',
                        minWidth: 700,
                        body: [
                            {
                                type: 'listbox',
                                name: 'lang',
                                label: '选择语言',
                                values: [
                                    {
                                        "text": "markup",
                                        "value": "markup"
                                    },
                                    {
                                        "text": "css",
                                        "value": "css"
                                    },
                                    {
                                        "text": "javascript",
                                        "value": "javascript"
                                    },
                                    {
                                        "text": "bash",
                                        "value": "bash"
                                    },
                                    {
                                        "text": "c",
                                        "value": "c"
                                    },
                                    {
                                        "text": "csharp",
                                        "value": "csharp"
                                    },
                                    {
                                        "text": "cpp",
                                        "value": "cpp"
                                    },
                                    {
                                        "text": "css-extras",
                                        "value": "css-extras"
                                    },
                                    {
                                        "text": "docker",
                                        "value": "docker"
                                    },
                                    {
                                        "text": "git",
                                        "value": "git"
                                    },
                                    {
                                        "text": "go",
                                        "value": "go"
                                    },
                                    {
                                        "text": "http",
                                        "value": "http"
                                    },
                                    {
                                        "text": "icon",
                                        "value": "icon"
                                    },
                                    {
                                        "text": "ini",
                                        "value": "ini"
                                    },
                                    {
                                        "text": "java",
                                        "value": "java"
                                    },
                                    {
                                        "text": "javadoclike",
                                        "value": "javadoclike"
                                    },
                                    {
                                        "text": "jq",
                                        "value": "jq"
                                    },
                                    {
                                        "text": "js-extras",
                                        "value": "js-extras"
                                    },
                                    {
                                        "text": "json",
                                        "value": "json"
                                    },
                                    {
                                        "text": "json5",
                                        "value": "json5"
                                    },
                                    {
                                        "text": "markdown",
                                        "value": "markdown"
                                    },
                                    {
                                        "text": "markup-templating",
                                        "value": "markup-templating"
                                    },
                                    {
                                        "text": "nginx",
                                        "value": "nginx"
                                    },
                                    {
                                        "text": "php",
                                        "value": "php"
                                    },
                                    {
                                        "text": "phpdoc",
                                        "value": "phpdoc"
                                    },
                                    {
                                        "text": "php-extras",
                                        "value": "php-extras"
                                    },
                                    {
                                        "text": "plsql",
                                        "value": "plsql"
                                    },
                                    {
                                        "text": "python",
                                        "value": "python"
                                    },
                                    {
                                        "text": "sql",
                                        "value": "sql"
                                    },
                                    {
                                        "text": "typescript",
                                        "value": "typescript"
                                    },
                                    {
                                        "text": "visual-basic",
                                        "value": "visual-basic"
                                    }
                                ]
                            },
                            {
                                type: 'textbox',
                                name: 'code',
                                label: '代码块',
                                multiline: true,
                                minHeight: 200
                            }
                        ],
                        onsubmit: function (e) {
                            var code = e.data.code.replace(/\r\n/gmi, '\n'), lang = e.data.lang;
                            code = tinymce.html.Entities.encodeAllRaw(code);
                            ed.insertContent(`<pre class="line-numbers language-${lang}"><code class="language-${lang}">${code}\n</code></pre>&nbsp;`);
                        }
                    });
                }
            });
        },
        createControl: function (n, cm) {
            return null;
        },
    });

    tinymce.PluginManager.add('code', tinymce.plugins.code);
})();