import React, { Component } from 'react';
import './App.css';
import Header from './components/Header';
import Teclado from "./components/Teclado";

class App extends Component {

    constructor() {
        super();

        this.state = {
            title: 'Calculadora'
        };
    }

    render() {
        return (
            <div>
                <Header title={this.state.title} />
                <div className="mt-5">
                    <Teclado count={'0'}/>
                </div>
            </div>
        );
    }
}

export default App;