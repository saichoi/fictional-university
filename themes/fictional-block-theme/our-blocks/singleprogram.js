wp.blocks.registerBlockType("ourblocktheme/singleprogram", {
    title: "Single Program",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Single Program Placeholder")
    },
    save: () => {
        return null
    }
});
