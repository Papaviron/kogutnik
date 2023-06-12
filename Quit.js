import React from 'react';

import "./Quit.css";

export const Quit = ({ resetBoard }) => {
    return (
        //Do modyfikacji!!!
        <button className="reset" onClick={resetBoard}>Wyjdź!</button>
    )
}