import ourColors from "../../inc/ourColors"
import { link } from "@wordpress/icons"
import { ToolbarGroup, ToolbarButton, Popover, Button, PanelBody, PanelRow, ColorPalette } from "@wordpress/components"
import { useBlockProps, RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl, getColorObjectByColorValue } from "@wordpress/block-editor"
import { useState } from "@wordpress/element"

export default function Edit(props) {
    const blockProps = useBlockProps()

    const [isLinkPickerVisible, setIsLinPickerkVisible] = useState(false);

    function handleTextChange(x) {
        props.setAttributes({ text: x })
    }

    function buttonHandler() {
        setIsLinPickerkVisible(prev => !prev)
    }

    function handleLinkChnage(newLink) {
        props.setAttributes({linkObject: newLink});
    }

    const currentColorValue = ourColors.filter(color => {
        return color.name == props.attributes.colorName
    })[0].color

    function handleColorChange(colorCode) {
        // From the hex value that the color palette gives us, we need to find its color name.
        const { name } = getColorObjectByColorValue(ourColors, colorCode);
        props.setAttributes({colorName: name})
    }

    return (
        <div {...blockProps}>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton onClick={buttonHandler} icon={link}/>
                </ToolbarGroup>
                <ToolbarGroup>
                    <ToolbarButton isPressed={props.attributes.size === "large"} onClick={() => props.setAttributes({size: "large"})}>Large</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "medium"} onClick={() => props.setAttributes({size: "medium"})}>Medium</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "small"} onClick={() => props.setAttributes({size: "small"})}>Small</ToolbarButton>
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette disableCustomColors={true} clearable={false} colors={ourColors} value={currentColorValue} onChange={handleColorChange}/>
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <RichText allowedFormats={[]} tagName="a" className={`btn btn--${props.attributes.size} btn--${props.attributes.colorName}`} value={props.attributes.text} onChange={handleTextChange} />
            {isLinkPickerVisible && (
                <Popover position="middle center" onFocusOutside={() => setIsLinPickerkVisible(false)}>
                    <LinkControl settings={[]} value={props.attributes.linkObject} onChange={handleLinkChnage} />
                    <Button variant="primary" onClick={() => setIsLinPickerkVisible(false)} style={{display: "block", width: "100%"}}>Confrm Link</Button>
                </Popover>
            )}
        </div>
    )
}
