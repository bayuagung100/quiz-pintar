$(document).ready(function () {
    tinymce.PluginManager.add('placeholder', function (editor) {
        editor.on('init', function () {
            var label = new Label;
            onBlur();
            tinymce.DOM.bind(label.el, 'click', onFocus);
            editor.on('focus', onFocus);
            editor.on('blur', onBlur);
            editor.on('change', onBlur);
            editor.on('setContent', onBlur);
            function onFocus() { if (!editor.settings.readonly === true) { label.hide(); } editor.execCommand('mceFocus', false); }
            function onBlur() { if (editor.getContent() == '') { label.show(); } else { label.hide(); } }
        });
        var Label = function () {
            var placeholder_text = editor.getElement().getAttribute("placeholder") || editor.settings.placeholder;
            var placeholder_attrs = editor.settings.placeholder_attrs || { style: { position: 'absolute', top: '2px', left: 0, color: '#aaaaaa', padding: '.25%', margin: '5px', width: '80%', 'font-size': '17px !important;', overflow: 'hidden', 'white-space': 'pre-wrap' } };
            var contentAreaContainer = editor.getContentAreaContainer();
            tinymce.DOM.setStyle(contentAreaContainer, 'position', 'relative');
            this.el = tinymce.DOM.add(contentAreaContainer, "label", placeholder_attrs, placeholder_text);
        }
        Label.prototype.hide = function () { tinymce.DOM.setStyle(this.el, 'display', 'none'); }
        Label.prototype.show = function () { tinymce.DOM.setStyle(this.el, 'display', ''); }
    });
    
    tinymce.init({selector: ".EditorControl",plugins: ["placeholder"]});

    
    tinymce.init({
        selector: '.richtext',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic ',
        menubar: '',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }

    });

    

    tinymce.init({
        selector: 'textarea#soal1',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal1').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal2',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal2').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal3',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal3').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal4',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal4').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal5',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal5').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal6',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal6').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal7',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal7').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal8',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal8').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal9',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal9').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

    tinymce.init({
        selector: 'textarea#soal10',
        height: 200,
        plugins: [
            'preview placeholder',
        ],
        toolbar: 'preview | undo redo| bold italic | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        menubar: '',
        external_plugins: {
            'tiny_mce_wiris' : '../../../../node_modules/@wiris/mathtype-tinymce5/plugin.min.js'
        },
        setup: function (editor) {
            editor.on('change', function () {
                $('#preview-container-soal10').html(editor.getContent());
                tinymce.triggerSave();
            });
        }

    });

});