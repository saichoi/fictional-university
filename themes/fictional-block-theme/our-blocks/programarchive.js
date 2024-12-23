wp.blocks.registerBlockType("ourblocktheme/programarchive", {
    title: "Program Archive",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Program Archive Placeholder")
    },
    save: () => {
        return null
    }
});
