import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import icons from '../../../icons.js'
import './main.css'

registerBlockType('rtslearning/auth-modal', {
  icon: {
    src: icons.primary
  },
  edit({ attributes, setAttributes }) {
    const { showRegister } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={ __('General', 'rtslearning') }>
            <ToggleControl
                label={__('Show Register', 'rtslearning')}
                help={
                    showRegister ?
                    __('Showing registration form', 'rtslearning') :
                    __('Hiding registration form', 'rtslearning')
                }
                checked={showRegister}
                onChange={showRegister => setAttributes({showRegister})}
            />
          </PanelBody>
        </InspectorControls>
        <div { ...blockProps }>
          {__('This block is not previewable from the editor. View your site for a live demo.', 'rtslearning')}
        </div>
      </>
    );
  }
});