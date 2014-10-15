(function() {
    tinymce.create('tinymce.plugins.arabicfont', {
        init : function(ed, url) {
            ed.addButton('arabicfont', {
                title : 'Arabic font style',
                image : url+'/arabicfont.png',
                onclick : function() {
                     ed.selection.setContent('[arabic-font]' + ed.selection.getContent() + '[/arabic-font]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('arabicfont', tinymce.plugins.arabicfont);
})();