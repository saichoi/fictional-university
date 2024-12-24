wp.blocks.registerBlockType("ourblocktheme/header", {
    title: "Our Header",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Header Placeholder")
    },
    save: () => {
        return null
    }
});
