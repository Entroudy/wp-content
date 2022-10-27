import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, InspectorControls, InnerBlocks
} from '@wordpress/block-editor';
import {
  PanelBody, RangeControl, SelectControl
} from '@wordpress/components'
import { __ } from '@wordpress/i18n';
import icons from '../../../icons.js';
import './main.css';

registerBlockType('rtslearning/team-members-group', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { columns, imageShape } = attributes;
    const blockProps = useBlockProps({
      className: `cols-${columns}`
    });
   
    return (
      <>
        <InspectorControls>
          <PanelBody title={__('Settings', 'rtslearning')}>
            <RangeControl 
              label={__('Columns', 'rtslearning')}
              onChange={columns => setAttributes({columns})}
              value={columns}
              min={2}
              max={4}
            />
            <SelectControl 
              label={__('Image Shape', 'rtslearning')}
              value={ imageShape }
              options={[
                  { label: __('Hexagon', 'rtslearning'), value: 'hexagon' },
                  { label: __('Rabbet', 'rtslearning'), value: 'rabbet' },
                  { label: __('Pentagon', 'rtslearning'), value: 'pentagon' },
              ]}
              onChange={imageShape => setAttributes({ imageShape })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <InnerBlocks
            orientation="horizontal"
            allowedBlocks={[
              'rtslearning/team-member'
            ]}
            template={[
              [
                'rtslearning/team-member',
                { 
                  name: 'John Doe',
                  title: 'CEO of RTSlearning',
                  bio: 'Example of bio.'
                }
              ],
              ['rtslearning/team-member'],
              ['rtslearning/team-member']
            ]}
            templateLock="insert"
          />
        </div>
      </>
    );
  },
  save({ attributes }) {
    const { columns } = attributes
    const blockProps = useBlockProps.save({
      className: `cols-${columns}`
    });

    return (
      <div {...blockProps}>
        <InnerBlocks.Content />
      </div>
    )
  }
});