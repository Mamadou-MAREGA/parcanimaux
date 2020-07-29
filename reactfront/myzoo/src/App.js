import React from 'react';
import Site from './containers/Site/Site';
import './App.css';
import {BrowserRouter} from 'react-router-dom';

function App() {
  return (
    <>
      <BrowserRouter>
        <Site />
      </BrowserRouter>
    </>
  );
}

export default App;
