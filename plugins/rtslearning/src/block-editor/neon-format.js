import "./neon.css";
import { registerFormatType, toggleFormat } from "@wordpress/rich-text";
import { RichTextToolbarButton } from "@wordpress/block-editor";
import { __ } from "@wordpress/i18n";
import { useSelect } from "@wordpress/data";

registerFormatType("rtslearning/neon", {
    title: __("Neon", "rtslearning"),
    tagName: "span",
    className: "neon",
    edit({ isActive, onChange, value }) {
        const selectedBlock = useSelect(select => select('core/block-editor').getSelectedBlock());

        return (
        <>
            {selectedBlock?.name === "core/paragraph"  && (
                <RichTextToolbarButton 
                title={__("neon", "rtslearning")}
                icon="superhero"
                isActive={isActive}
                onClick={() => {
                    onChange(toggleFormat(value, {
                        type: "rtslearning/neon",
                    })
                    );
                }}
            />
            )}
        </>
      );
    },
});