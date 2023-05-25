(function (blocks, editor, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var MediaUpload = wp.blockEditor.MediaUpload;
    const { SVG } = wp.components;

    registerBlockType('banner/block', {
        title: 'Banner',
        icon: 'smiley',
        category: 'Victor Widgets',
        attributes: {
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

        
            function onSelectImage(media) {
                props.setAttributes({
                    image: media.sizes.full.url,
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
