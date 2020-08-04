import React, { Component } from 'react';
import TitreH1 from '../../../components/UI/Titres/TitreH1';
import banderole from '../../../assets/images/banderole.png';
import logo from '../../../assets/images/logo.png';


class Acceuil extends Component {

    componentDidMount =  () => {
        document.title = "myzoo";
    }

    render() {
        return (
            <div>
                <img className="img-fluid" src={banderole} alt="logo" />
                <TitreH1 bgColor="bg-success">Venez visiter le parc myzoo</TitreH1>

                <div className="container">
                    <p>
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic error maiores 
                         porro excepturi corrupti tempora eos delectus omnis 
                         asperiores ut tenetur eligendi recusandae voluptatibus qui obcaecati deserunt, odio fugiat labore!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic error maiores 
                        porro excepturi corrupti tempora eos delectus omnis 
                        asperiores ut tenetur eligendi recusandae voluptatibus qui obcaecati deserunt, odio fugiat labore!
                    </p>
                    <div className="row no-gutters align-items-center">
                        <div className="col-12 col-md-6">
                            <img src={logo} alt="logo" className="img-fluid" />
                        </div>
                        <div className="col-12 col-md-6">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic error maiores 
                            porro excepturi corrupti tempora eos delectus omnis 
                            asperiores ut tenetur eligendi recusandae voluptatibus qui obcaecati deserunt, odio fugiat labore!
                        </div>
                        <div className="col-12 col-md-6">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic error maiores 
                            porro excepturi corrupti tempora eos delectus omnis 
                            asperiores ut tenetur eligendi recusandae voluptatibus qui obcaecati deserunt, odio fugiat labore!
                        </div>
                        <div className="col-12 col-md-6">
                            <img src={logo} alt="logo" className="img-fluid" />
                        </div>
                    </div>
                </div>
              
            </div>
            
        )
    }
}

export default Acceuil;
