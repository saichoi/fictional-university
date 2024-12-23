wp.blocks.registerBlockType("ourblocktheme/mynotes", {
    title: "My notes",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "My Notes Placeholder")
    },
    save: () => {
        return null
    }
});
