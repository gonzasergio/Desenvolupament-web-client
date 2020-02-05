import React, { Component } from 'react';

import './Teclado.css';

class Teclado extends Component {

    constructor(props) {
        super();

        this.state = {
            count: props.count
        };

        this.incrementValue = this.incrementValue.bind(this);
        this.imprimeValor1 = this.imprimeValor1.bind(this);
        this.resetCount = this.resetCount.bind(this);
    }

    incrementValue() {
        this.setState((prevState) => ({ count: prevState.count + 1 }));
    }
    imprimeValor1() {
        this.setState((prevState) => ({ count: prevState.count + '1'}));
    }

    resetCount() {
        this.setState(() => ({ count: 0 }));
    }

    render() {
        return (
            <div className="container">
                <div className="calculadora border border-secondary rounded">
                    <div className="result-display d-flex align-items-center bg-light text-secondary">
                        <div className="mx-auto display-1">{this.state.count}</div>
                    </div>
                    <div className="row w-100 m-0 botones">
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                7
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                8
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                9
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                /
                            </button>
                        </div>
                    </div>
                    <div className="row w-100 m-0 botones">
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                4
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                5
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                6
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                *
                            </button>
                        </div>
                    </div>
                    <div className="row w-100 m-0 botones">
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                1
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                2
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                3
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                -
                            </button>
                        </div>
                    </div>
                    <div className="row w-100 m-0 botones">
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                C
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                0
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                =
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-secondary w-100 h-100">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

Teclado.defaultProps = {
    count: 0
};

export default Teclado;