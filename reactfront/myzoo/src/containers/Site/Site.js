import React, { Component } from 'react';
import NavBar from  "../../components/UI/NavBar/NavBar";
import {Switch, Route} from 'react-router-dom';
import Acceuil from "./Acceuil/Acceuil";
import Error from "../../components/Error/Error";
import Footer from  "../../components/Footer/Footer";
import Parc from "../../containers/Site/Parc/Parc";
import Contact from "../Site/Contact/Contact";


class Site extends Component {
    
    render() {
        return (
            <>
                <div className="site">           
                    <NavBar/>
                    <Switch>
                        <Route path="/contact" exact render={() => <Contact/> } />
                        <Route path="/animaux" exact render={() => <Parc/> } />
                        <Route path="/" exact render={() => <Acceuil/>} />
                        <Route   render={() => <Error type="404"> Oups cette page n'existe pas !</Error>} />
                    </Switch>
                    <div className="minSite"></div>
                </div>
                
                <Footer/>
            </>
        );
    }
}


export default Site;