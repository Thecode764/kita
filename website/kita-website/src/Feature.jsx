import './App.css'

function Feature({ name, description }) {
    return (
        <>
            <div>
                <h1 className="text-center">{name}</h1>
                <p>{description}</p>
            </div>
        </>
    );
}

export default Feature;
