import React from 'react';
import logo from './img/logo.svg';
import './App.css';
import Header from './Header.js';
import Content from './Content.js';

class App extends React.Component {
  render() {
      return (
        <div>
            <Header />
            <Content />
        </div>
    );
  }

}

export default App;
