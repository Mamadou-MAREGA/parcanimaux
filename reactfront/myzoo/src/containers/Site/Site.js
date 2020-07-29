import React, { Component } from 'react';
import NavBar from  "../../components/UI/NavBar/NavBar";
import {Switch, Route} from 'react-router-dom';
import Acceuil from "./Acceuil/Acceuil";

class Site extends Component {
    
    render() {
        return (
            <>
                <NavBar/>
                <Switch>
                    <Route path="/contact"  render={() => <h1>Page de contact</h1> } />
                    <Route path="/"  render={() => <Acceuil/>} />
                </Switch>
               
            </>
        );
    }
}


export default Site;