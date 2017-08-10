(function ($) {
    tinymce.PluginManager.add('overgang_plugin', function (editor, url) {
        editor.addButton('overgang_modules', {
            type: 'menubutton',
            text: 'Modules Overgang',
            menu: [
                {
                    text: '1 image',
                    onclick: function () {
                        editor.windowManager.open({
                            title: '1 image',
                            width: 600,
                            height: 100,
                            body: [
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image Source',
                                    id: 'img-src-selector',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field'
                                },
                                {type: 'textbox', hidden: true, name: 'img', id: 'img-src-field'}
                            ],
                            onsubmit: function (e) {
                                editor.focus();
                                var img = '<div class="row little-spacing"><div class="col-12">' + $(e.data.img).addClass('aligncenter').prop('outerHTML') + '</div></div>';
                                console.log(e.data);
                                editor.execCommand('mceInsertContent', false, img);
                            }
                        });
                    }
                },
                {
                    text: '2 images stretch gauche',
                    onclick: function () {
                        editor.windowManager.open({
                            title: '2 images stretch gauche',
                            body: [
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image gauche',
                                    id: 'img-src-selector-1',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field-1'
                                },
                                {
                                    type: 'textbox',
                                    hidden: true,
                                    name: 'img1',
                                    id: 'img-src-field-1',
                                    classes: 'img-selector-value'
                                },
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image droite',
                                    id: 'img-src-selector-2',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field-2'
                                },
                                {
                                    type: 'textbox',
                                    hidden: true,
                                    name: 'img2',
                                    id: 'img-src-field-2',
                                    classes: 'img-selector-value'
                                }
                            ],
                            onsubmit: function (e) {
                                editor.focus();
                                var imgs = '<div class="row align-items-center justify-content-between little-spacing"><div class="col-6"><div class="wrapper">'+$(e.data.img1).removeClass('size-full alignnone alignright aligncenter').addClass('alignleft').prop('outerHTML')+'</div></div><div class="col-6">'+$(e.data.img2).removeClass('size-full alignnone alignright aligncenter').addClass('img-fluid')+'</div></div>';
                                editor.execCommand('mceInsertContent', false, imgs);
                            }
                        });
                    }
                },
                {
                    text: '2 images stretch droite',
                    onclick: function () {
                        editor.windowManager.open({
                            title: '2 images stretch droite',
                            body: [
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image gauche',
                                    id: 'img-src-selector-1',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field-1'
                                },
                                {
                                    type: 'textbox',
                                    hidden: true,
                                    name: 'img1',
                                    id: 'img-src-field-1',
                                    classes: 'img-selector-value'
                                },
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image droite',
                                    id: 'img-src-selector-2',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field-2'
                                },
                                {
                                    type: 'textbox',
                                    hidden: true,
                                    name: 'img2',
                                    id: 'img-src-field-2',
                                    classes: 'img-selector-value'
                                }
                            ],
                            onsubmit: function (e) {
                                editor.focus();
                                var imgs = '<div class="row align-items-center justify-content-between little-spacing"><div class="col-6">'+$(e.data.img1).removeClass('size-full alignnone alignright aligncenter').addClass('img-fluid').prop('outerHTML')+'</div><div class="col-6"><div class="wrapper">'+$(e.data.img2).removeClass('size-full alignnone alignright aligncenter').addClass('alignright').prop('outerHTML')+'</div></div></div>';
                                editor.execCommand('mceInsertContent', false, imgs);
                            }
                        });
                    }
                },
                {
                    text: '1 image + 1 citation verticale',
                    onclick: function () {
                        editor.windowManager.open({
                            title: '1 image + 1 citation',
                            body: [
                                {
                                    type: 'button',
                                    icon: 'wp-media-library',
                                    text: 'Add image',
                                    name: 'selector',
                                    label: 'Image Source',
                                    id: 'img-src-selector',
                                    classes: 'img-selector-button',
                                    role: 'img-src-field'
                                },
                                {
                                    type: 'textbox',
                                    hidden: true,
                                    name: 'img',
                                    id: 'img-src-field',
                                    classes: 'img-selector-value'
                                },
                                {
                                    type: 'textbox',
                                    name: 'quote',
                                    label: 'Citation',
                                    id: 'quote'
                                }
                            ],
                            onsubmit: function(e) {
                                editor.focus();
                                var div = '<div class="row align-items-center justify-content-between little-spacing"><div class="col-5 offset-1">'+$(e.data.img).addClass('img-fluid').prop('outerHTML')+'</div><div class="col-5"><blockquote>'+e.data.quote+'</blockquote></div></div>';
                                editor.execCommand('mceInsertContent', false, div);
                            }
                        });
                    }
                },
                {
                    text: '1 citation + texte',
                    onclick: function () {
                        editor.windowManager.open({
                            title: '1 citation verticale + text',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'quote',
                                    label: 'Citation',
                                    id: 'quote'
                                },
                                {
                                    type: 'textbox',
                                    name: 'question',
                                    label: 'question',
                                    id: 'question'
                                },
                                {
                                    type: 'textbox',
                                    name: 'text',
                                    label: 'Texte',
                                    id: 'text'
                                }
                            ],
                            onsubmit: function(e) {
                                editor.focus();
                                var div = '<div class="row align-items-center little-spacing"><div class="col-5 offset-1"><blockquote>'+e.data.quote+'</blockquote></div><div class="col-5"><h2 class="bold text tiny-spacing">'+e.data.question+'</h2><p>'+e.data.text+'</p></div></div>';
                                editor.execCommand('mceInsertContent', false, div);
                            }
                        });
                    }
                },
                {
                    text: 'Texte en 2 colonnes',
                    onclick: function () {
                        editor.windowManager.open({
                                title: "Texte en 2 colonnes",
                                file:  url + '/views/editor-dialog.html',
                                width: 960,
                                height: 600,
                                inline: 1
                            },
                            {
                                editor: editor
                            });
                    }
                }
            ]

        });
    });

    $('body').on('click', '.mce-img-selector-button button', function() {
        var $this = $(this);
        if ( wp && wp.media && wp.media.editor ) {
            var input = $this.parents('.mce-img-selector-button').attr('role');
            console.log(input);
            workflow = wp.media.editor.open( input );
            workflow.on( 'insert', function( selection ) {
                selection.map( function( attachment ) {
                    var details = attachment.toJSON();
                    $($this.find('.mce-txt')[0]).text(details.name);
                });
            });
        }
    });
})(jQuery);