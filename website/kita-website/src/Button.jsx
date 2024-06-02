import React, { useEffect } from 'react';
import './App.css';

function Button() {
    useEffect(() => {
        const script = document.createElement('script');
        script.src = "https://giscus.app/client.js";
        script.async = true;
        script.dataset.repo = "Thecode764/Kita-website";
        script.dataset.repoId = "R_kgDOMDbPgQ";
        script.dataset.category = "General";
        script.dataset.categoryId = "DIC_kwDOMDbPgc4CfzNI";
        script.dataset.mapping = "pathname";
        script.dataset.strict = "0";
        script.dataset.reactionsEnabled = "1";
        script.dataset.emitMetadata = "0";
        script.dataset.inputPosition = "bottom";
        script.dataset.theme = "preferred_color_scheme";
        script.dataset.lang = "en";
        script.crossOrigin = "anonymous";

        document.body.appendChild(script);

        return () => {
            document.body.removeChild(script);
        };
    }, []);

    return (
        <>
        <div className='logo'>
            <a href="https://github.com/Thecode764/kita">
            <button>Other features</button>
            </a>
            <a href="https://thecode764.github.io/kita">
            <button>Demo (Persian Kita official blog)</button>
            </a>
        </div>
        <h1 className='text-center'>Check your website blog</h1>        <p className='text-center'>Built with 💝 With Persian kita developers</p>

        <p className='text-center'>I check you blog comment here you website blog link</p>
        <div className='logo'></div>
        </>
    );
}

export default Button;
