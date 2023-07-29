import React from 'react';
import { Routes, Route, Link, Outlet } from 'react-router-dom';
import Login from '../views/Login';
import Signup from '../views/Signup';
import ObjectiveQuestion from '../views/ObjectiveQuestion';

function GuestLayout() {
    return (
        <>
            {/* Common header for guest layout */}
            <header>
                <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div className="container-fluid">
                        <div className="collapse navbar-collapse">
                            <ul className="navbar-nav me-auto mb-2 mb-lg-0 float-end">
                                <li className="nav-item ms-2">
                                    <Link to="/login" className='btn btn-sm btn-primary'>Login</Link>

                                </li>
                                <li className="nav-item ms-2">
                                    <Link to="/signup" className='btn btn-sm btn-success'>Signup</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <Outlet />
            {/* Render the guest-specific routes */}
            {/* <Routes>
                <Route path="/login" element={<Login />} />
                <Route path="/signup" element={<Signup />} />
            </Routes> */}
            {/* You can add more guest-specific routes here if needed */}

            {/* Common footer for guest layout */}
            <footer>
                {/* Footer content */}
            </footer>
        </>
    );
}

export default GuestLayout;
