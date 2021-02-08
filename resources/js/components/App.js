import React from 'react';
import ReactDOM from 'react-dom';
import Header  from "../components/header";
function App() {
    return (
        <div className="container">
            <Header/>
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
