wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
    title: "Are You Paying Attention?",
    icon: "smiley",
    category: "common",
    edit: () => {
        return wp.element.createElement("h3", null, "Hello, this is from the admin editor screen.")
    },
    save:  () => {
        return wp.element.createElement("h1", null, "This is the frontend.")
    }
})