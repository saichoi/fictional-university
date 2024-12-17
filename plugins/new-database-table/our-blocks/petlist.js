wp.blocks.registerBlockType("ourdatabaseplugin/petslist", {
    title: "Fictional University Pets List", // 블록 제목
    edit: function () {
      return wp.element.createElement("div", { className: "our-placeholder-block" }, "Pets List Placeholder");
    },
    save: function () {
      return null; // 서버에서 렌더링하는 방식으로 설정
    }
  });
  