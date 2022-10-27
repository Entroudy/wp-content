import { registerBlockType } from '@wordpress/blocks';
import { 
  useBlockProps, RichText, InspectorControls
} from '@wordpress/block-editor';
import {PanelBody, ToggleControl} from '@wordpress/components'
import { __ } from '@wordpress/i18n'
import icons from '../../../icons.js'
import './main.css'

registerBlockType('rtslearning/page-header', {
  icon: icons.primary,
	edit({attributes, setAttributes }) {
    const { content, showCategory } = attributes
    const blockProps = useBlockProps();

    return (
      <>
      <InspectorControls>
        <PanelBody title={__('General', 'rtslearning')}>
          <ToggleControl
            label={__('Show Category', 'rtslearning')}
            checked={showCategory}
            onChange={showCategory => setAttributes({ showCategory })}
            help={
              showCategory ?
              __('Category Shown', 'rtslearning') :
              __('Custom Content Shown', 'rtslearning')
            }
          />
        </PanelBody>
      </InspectorControls>
        <div {...blockProps}>
        <div className="inner-page-header">
          {
            showCategory ?
            <h1>{__('Category: Some Category', 'rtslearning')}</h1> :
            <RichText
            tagName="h1"
            placeholder={__("Heading", "rtslearning")}
            value={content}
            onChange={content => setAttributes({ content })}
            />
          }
        </div>
    </div>
      </>
    );
  }
});