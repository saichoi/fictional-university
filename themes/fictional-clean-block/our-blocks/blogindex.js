wp.blocks.registerBlockType("ourblocktheme/blogindex", {
    title: "Blog Index",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Blog Index Placeholder")
    },
    save: () => {
        return null
    }
});
