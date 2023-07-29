import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom'; // Use BrowserRouter instead of RouterProvider
import App from "../views/App"; // Import the App component from the correct location

ReactDOM.createRoot(document.getElementById('login-component')).render(
    // <React.StrictMode>
    <BrowserRouter>
        <App />
    </BrowserRouter>
    // </React.StrictMode>
);
