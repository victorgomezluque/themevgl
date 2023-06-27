(function (blocks, editor, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var MediaUpload = wp.blockEditor.MediaUpload;

    registerBlockType('text-image/block', {
        title: 'Texto y imagen',
        icon: '',
        category: 'victor_widgets',
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
                class: 'img',
            },
            text: {
                type: 'string',
                source: 'text',
                selector: 'p',
            },
            title_block: {
                type: 'string',
                source: 'text',
                selector: 'p',
            },
            image: {
                type: 'string',
                source: 'attribute',
                selector: 'img',
                attribute: 'src',
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

            function onChangetitle(title_blocks) {
                props.setAttributes({
                    title_blocks: title_blocks,
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
                    el('input', { value: attributes.title_blocks, onChange: function (e) { onChangetitle(e.target.value); } }),
                    el('textarea', { value: attributes.text, onChange: function (e) { onChangeText(e.target.value); } })
                )
            );
        },
        save: function (props) {
            var attributes = props.attributes;

            return el('div', { className: "text-image" },
                el('div', { className: "image-text-block" },
                    el('div', { className: "image-text-title" }, el('h2', { className: "image-text-text-p h2" }, attributes.title_blocks)),
                    el('div', { className: "image-text-text" }, el('p', { className: "image-text-text-p" }, attributes.text)),),
                el('div', { className: "image-text-img" }, el('img', { src: attributes.image })),
            );



        },
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.element
);
