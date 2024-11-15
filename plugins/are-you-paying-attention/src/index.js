wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
    title: "Are You Paying Attention?",
    icon: "smiley",
    category: "common",
    edit: () => {
        return (
            <div>
                <p>Hello, this is a paragraph.</p>
                <h4>Hi, there</h4>
            </div>
        )
    },
    save:  () => {
        return (
            <>
                <h3>H3 on the frontend.</h3>
                <h5>H5 on the forntend.</h5>
            </>
        )
    }
})