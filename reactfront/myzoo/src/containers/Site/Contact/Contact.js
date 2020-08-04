import React, { Component } from 'react';
import TitreH1 from '../../../components/UI/Titres/TitreH1';
import Formulaire from './Formulaire/Formulaire';


class Contact extends Component {
    componentDidMount = () => {
        document.title = 'Formulaire de contact';
    }
    render() {
        return (
            <>
                <TitreH1 bgColor="bg-success">Contactez-nous</TitreH1>
                <div className="container">
                    <h2>Addresse : </h2>
                    xxxxxxxxxxxxxxxxxxxxxx
                    <h2>Téléphone : </h2>
                     00.00.00.00.00
                    <h2>Vous préférez nous écrire ?</h2>
                    <Formulaire/>
                </div>
            </>
        )
    }
}

export default Contact;