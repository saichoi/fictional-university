wp.blocks.registerBlockType("ourblocktheme/singlepost", {
    title: "Single Post",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Single Post Placeholder")
    },
    save: () => {
        return null
    }
});
