wp.blocks.registerBlockType("ourblocktheme/page", {
    title: "Our Page",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Single Page Placeholder")
    },
    save: () => {
        return null
    }
});
