import "./index.scss"
import { TextControl, Flex, FlexBlock, FlexItem, Button, Icon, PanelBody, PanelRow, ColorPicker} from "@wordpress/components"
import {InspectorControls, BlockControls, AlignmentToolbar, useBlockProps} from "@wordpress/block-editor"
import {ChromePicker} from "react-color"

(function () {
    let locked = false;

    wp.data.subscribe(() => {
        const results = wp.data.select("core/block-editor").getBlocks().filter((block) => {
            return block.name == "ourplugin/are-you-paying-attention" && block.attributes.correctAnswer == undefined
        })

        if (results.length && !locked) {
            locked = true;
            wp.data.dispatch("core/editor").lockPostSaving("noanswer")
        }

        if (!results.length && locked) {
            locked = false;
            wp.data.dispatch("core/editor").unlockPostSaving("noanswer")
        }
    })
})()


wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
    title: "Are You Paying Attention?",
    icon: "smiley",
    category: "common",
    attributes: {
        question: {type:"string"},
        answers: {type: "array", default: [""]},
        correctAnswer: {type: "number", default: undefined},
        bgColor: {type: "string", default: "#EBEBEB"},
        theAlignment: {type: "string", default: "left"}
    },
    description: "Give your audience a chance to prove their comprehension.",
    example: {
        attributes: {
            question: "What is my name?",
            correctAnswer: 3,
            answers: ['Meowsalot', 'Brksalot', 'Purrsloud', 'Choi'],
            theAlignment: "center",
            bgColor: "#CFE8F1"
        }
    },
    edit: EditComponent,
    save:  () => {
        return null
    },
})

function EditComponent (props) {
    const blockProps  = useBlockProps({
        className: "paying-attention-edit-block",
        style: {backgroundColor:props.attributes.bgColor}
    })

    function updateQuestion(value) {
        props.setAttributes({question: value})
    }

    function deleteAnswer(indexToDelete) {
        // 삭제할 answer를 제외하고 나머지 answers를 다시 넣어주는 작업
        const newAnswers = props.attributes.answers.filter((x, index) => {
            return index != indexToDelete
        })
        props.setAttributes({answers: newAnswers})

        if (indexToDelete == props.attributes.correctAnswer) {
            props.setAttributes({correctAnswer: undefined})
        }
    }

    function markAsCorrect(index) {
        props.setAttributes({correctAnswer: index})
    }

    return (
        <div {...blockProps}>
            <BlockControls>
                <AlignmentToolbar value={props.attributes.theAlignment} onChange={x => props.setAttributes({theAlignment: x})}/>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="Background Color" initialOpen={true}>
                    <PanelRow>
                        <ChromePicker color={props.attributes.bgColor} onChangeComplete={x => props.setAttributes({bgColor: x.hex})} disableAlpha={true} />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <TextControl label="Question:" value={props.attributes.question} onChange={updateQuestion} style={{fontSize:"20px"}}/>
            <p style={{fontSize:"13px", margin:"20px 0 8px 0"}}>Answer:</p>
            {props.attributes.answers.map((answer, index) => {
                return (
                    <Flex>
                        <FlexBlock>
                            <TextControl value={answer} onChange={newValue => {
                                const newAnswers = props.attributes.answers.concat([])
                                newAnswers[index] = newValue
                                props.setAttributes({answers: newAnswers})
                            }} />
                        </FlexBlock>
                        <FlexItem>
                            <Button onClick={() => markAsCorrect(index)}>
                                <Icon className="mark-as-correct" icon={props.attributes.correctAnswer == index ? "star-filled" : "star-empty"} />
                            </Button>
                        </FlexItem>
                        <FlexItem>
                            <Button isLink className="attention-delete" onClick={() => deleteAnswer(index)}>Delete</Button>
                        </FlexItem>
                    </Flex>
                )
            })}
            <Button isPrimary onClick={() => {
                props.setAttributes({answers: props.attributes.answers.concat([""])})
            }}>Add another answer</Button>
        </div>
    )
}