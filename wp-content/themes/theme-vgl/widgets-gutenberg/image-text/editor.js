(function (blocks, editor, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var MediaUpload = wp.blockEditor.MediaUpload;

    registerBlockType('image-text/block', {
        title: 'Imagen y texto',
        icon: 'smiley',
        category: 'common',
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
                class: 'img',
            },
            image: {
                type: 'string',
                source: 'attribute',
                selector: 'img',
                attribute: 'src',
            },
            text: {
                type: 'string',
                source: 'text',
                selector: 'p',
            },
        },
        edit: function (props) {

            var content = props.attributes.content;
            var image = props.attributes.image;
            var text = props.attributes.text;
            var attributes = props.attributes;

            var onChangeContent = function (newContent) {
                props.setAttributes({ content: newContent });
            };

            function onSelectImage(media) {
                props.setAttributes({
                    image: media.sizes.full.url,
                });
            }

            function onChangeText(text) {
                props.setAttributes({
                    text: text,
                });
            }

            return el('div', { className: props.className },
                el(MediaUpload, {
                    onSelect: onSelectImage,
                    type: 'image',
                    value: attributes.image,
                    render: function (obj) {
                        return el('button', { onClick: obj.open },
                            !attributes.image ? 'Seleccionar una imagen' : el('img', { src: attributes.image })
                        );
                    },
                }),
                el('p', null,
                    el('textarea', { value: attributes.text, onChange: function (e) { onChangeText(e.target.value); } })
                )
            );
        },
        save: function (props) {
            var attributes = props.attributes;

            return el('div', { className: props.className },
                el('img', { src: attributes.image }),
                el('p', null, attributes.text)
            );
        },
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.element
);
