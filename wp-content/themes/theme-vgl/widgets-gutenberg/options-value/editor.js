(function (blocks, editor, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var MediaUpload = wp.blockEditor.MediaUpload;

    registerBlockType('option-value/block', {
        title: 'Option value',
        category: 'common',
        attributes: {
            selectOption: {
                type: 'string',
                default: 'option1',
            },
        },
        edit: function (props) {
            var options = [
                { value: 'option1', label: 'Option 1' },
                { value: 'option2', label: 'Option 2' },
                { value: 'option3', label: 'Option 3' },
            ];

            function onChangeSelect(value) {
                props.setAttributes({ selectOption: value });
            }

            return wp.element.createElement(
                'div',
                null,
                wp.element.createElement('select', {
                    value: props.attributes.selectOption,
                    onChange: function (event) {
                        onChangeSelect(event.target.value);
                    },
                },
                    options.map(function (option) {
                        return wp.element.createElement('option', { value: option.value }, option.label);
                    })
                )
            );
        },
        save: function (props) {
            return wp.element.createElement('select', { value: props.attributes.selectOption },
                options.map(function (option) {
                    return wp.element.createElement('option', { value: option.value }, option.label);
                })
            );
        },
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.element
);
