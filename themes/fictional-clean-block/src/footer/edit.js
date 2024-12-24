import { useBlockProps } from "@wordpress/block-editor"

export default function Edit() {
    const blockProps = useBlockProps()

    return (
        // 블럭 선택했을 때 오른쪽 사이드바 메뉴에서 확인하기 위함
        <div {...blockProps}> 
            <div className="our-placeholder-block">University Footer Placeholder</div>
    </div>
)
}