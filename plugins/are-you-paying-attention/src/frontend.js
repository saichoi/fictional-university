import React from 'react';
import { createRoot } from 'react-dom/client';
import "./frontend.scss";

const divsToUpdate = document.querySelectorAll(".paying-attention-update-me");

divsToUpdate.forEach((div) => {
    const data = JSON.parse(div.querySelector('pre').innerHTML)
    createRoot(div).render(<Quiz {...data} />)
    div.classList.remove("paying-attention-update-me");
});

function Quiz(props) {
    return (
        <div className="paying-attention-frontend">
            <p>{props.question}</p>
            <ul>
                {props.answers.map((answer)=>{
                    return <li>{answer}</li>
                })}
            </ul>
        </div>
    );
}