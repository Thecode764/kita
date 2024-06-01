import './App.css';
import Screenshot from './Screenshot.jsx'
import Feature from './Feature.jsx';
import Button from './Button.jsx'

function Features() {
    return (
        <>
            <div className='flex-col'>
                <Feature name="Security" description="Kita don't share you personal data 100%. kita can't access you personal data." />
                <br />
                <Feature name="SEO Friendly" description="Kita have best SEO for you" />
                <br />
                <Feature name="Responsive" description="When you make you blog with kita you have best responsive design for laptop and mobile and ..." />
                <br />
                <Feature name="Easy and modify" description="Kita is easy and modify to use" />
                <br />
                <Feature name="Social icons" description="Kita supports social icons. the repo link for social icons https://cdn.jsdelivr.net/npm/simple-icons/icons/" />
                <br />
                <Feature name="Comments" description="Kita supports comment system for you blog posts. Setup giscus on you repo for use comment system" />
                <br /><br />
                <Screenshot />
                <br /><br />
                <Button />
            </div>
        </>
    );
}

export default Features;
