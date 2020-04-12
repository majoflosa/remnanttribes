import { registerBlockType, registerBlockStyle } from '@wordpress/blocks';


const blockStyle = {
    backgroundColor: '#f5f5f5',
    color: '#555555',
    padding: '12px 20px',
};

registerBlockType( 'rem-blocks/test-block', {
    title: 'Custom Block Test',
    icon: 'smiley',
    category: 'layout',
    example: {},
    edit: ( props ) => {
        console.log(props);
        return <div className={props.className}>Hello, World!</div>
    },
    // save: ( props ) => <div className={props.className}>Hello, World!</div>,
});

// registerBlockStyle( 'rem-blocks/test-block', {
//     name: 'style-1',
//     label: 'Style 1'
// });
