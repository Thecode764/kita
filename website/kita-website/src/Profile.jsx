import './App.css'
import Features from './Features.jsx'

function Profile() {
    return (
        <>
        <p className='text-center'>Welcome to kita project. This project was forked from original project. i translate this project to persian. and with some new features</p>
        <div className="logo">
            <img src="./../github-mark-white.svg" alt="Github logo" />
        </div>
        <Features />
       </>
    )
}

export default Profile