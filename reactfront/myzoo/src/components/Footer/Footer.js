import React from 'react';
import fb from '../../assets/images/footer/fb.png';
import twitter from '../../assets/images/footer/twitter.png';
import youtube from '../../assets/images/footer/youtube.png';
import {NavLink} from 'react-router-dom';


const  Footer = () => {

    return (

        <>
           <footer className="bg-primary">
              <div className="text-center text-white"> myzoo - Tout droits réservés</div>
              <div className="row no-gutters align-items-center pt-2 text-center">
                  <div className="col-3">
                      <a href="https://www.facebook.com/" className="d-block" target="_blank" rel="noopener noreferrer">
                            <img src={fb} alt="fb" className="img-fluid imgFB" />
                      </a>
                  </div>
                  <div className="col-3">
                      <a href="https://twitter.com" className="d-block" target="_blank" rel="noopener noreferrer" >
                          <img src={twitter} alt="twitter" className="img-fluid imgTwitter"/>
                      </a>
                  </div>
                  <div className="col-3">
                      <a href="https://www.youtube.com/?hl=fr&gl=FR" className="d-block" target="_blank" rel="noopener noreferrer">
                          <img src={youtube} alt="youtube" className="img-fluid imgYoutube" />
                      </a>
                  </div>
                  <div className="col-3">
                    <NavLink to="/mentionsLegales" className="nav-link p-0 m-0 text-white">Mentions-légales</NavLink>
                    <a href="mailto:hamshakour93@gmail.com" className="nav-link p-0 m-0 text-white" rel="noopener noreferrer">contact@myzoo.com</a>
                  </div>
              </div>
           </footer>
       </>
    )
}

export default Footer;
