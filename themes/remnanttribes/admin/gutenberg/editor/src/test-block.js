import { registerBlockType, registerBlockStyle } from '@wordpress/blocks';
import { RichText, InspectorControls } from '@wordpress/block-editor';
import { Panel, PanelBody, PanelRow, TextControl, SelectControl } from '@wordpress/components';
// import { more } from '@wordpress/icons';

const blockStyle = {
    backgroundColor: '#f5f5f5',
    color: '#555555',
    padding: '12px 20px',
};

registerBlockType( 'rem-blocks/test-block', {
    title: 'Custom Block Test',
    description: 'A simple block to use as reference for development.',
    icon: 'smiley',
    category: 'layout',
    // attributes: {
    //     attr_test: {
    //         type: 'string',
    //         source: 'text',
    //         default: 'This is the default text',
    //         selector: '.test-source',
    //         // selector: 'p',
    //     }
    // },
    // example: {
    //     attributes: {
    //         content: 'Hello World',
    //     }
    // },
    keywords: ['Test', 'Example'],
    supports: {
        html: false,
        customClassName: false,
    },
    edit: ( props ) => {
        console.log(props.attributes);
        return [
            <InspectorControls>
                <PanelBody title="My Block Settings">
                    <PanelRow><p>My Panel Inputs and Labels</p></PanelRow>

                    <TextControl 
                        label="This is the label" 
                        help="These are some instructions" 
                        value={props.attributes.attr_test}
                        onChange={(newValue) => props.setAttributes({ attr_test: newValue })}
                    />
                    <SelectControl 
                        label="This is a selector"
                        help="These are instructions for the selector"
                        value="option-1"
                        options={[
                            { value: 'option-1', label: 'Option 1' },
                            { value: 'option-2', label: 'Option 2' },
                        ]}
                    />
                </PanelBody>
            </InspectorControls>,
            <div className={props.className}>
                <p>Using an attribute: <span className="test-source">{props.attributes.attr_test}</span></p>
                
            </div>
        ]
    },
    save: () => null
    // save: ( props ) => <div className={props.className}>Hello, World!</div>,
});

registerBlockStyle( 'rem-blocks/test-block', {
    name: 'style-1',
    label: 'Style 1'
});
