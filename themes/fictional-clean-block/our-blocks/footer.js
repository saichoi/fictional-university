wp.blocks.registerBlockType("ourblocktheme/footer", {
    title: "Our Footer",
    edit: () => {
        return wp.element.createElement("div", {className: "our-placeholder-block"}, "Footer Placeholder")
    },
    save: () => {
        return null
    }
});
