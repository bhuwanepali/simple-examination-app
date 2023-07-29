import React from 'react';
import { Routes, Route, Link, useNavigate, Outlet } from 'react-router-dom';
import Dashboard from '../views/Dashboard';
import Student from '../views/Student';
import { getToken, logout } from './AuthService';

function DefaultLayout() {
    const token = getToken();
    const navigate = useNavigate();

    const logoutUser = () => {
        if (token !== undefined) {
            logout();
            navigate('/login');
            // You may add any additional logic after logging out the user, e.g., redirecting to the login page.
        }
    };

    return (
        <>
            {/* Common header for authenticated layout */}
            <header>
                <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div className="container-fluid">
                        <div className="collapse navbar-collapse">
                            <ul className="navbar-nav me-auto mb-2 mb-lg-0 float-end">
                                <li className="nav-item ms-2">
                                    <Link to="/dashboard" className='btn btn-sm btn-primary'>Dashboard</Link>
                                </li>
                                <li className="nav-item ms-2">
                                    <Link to="/student" className='btn btn-sm btn-primary'>Student</Link>
                                </li>
                                <li className="nav-item ms-2">
                                    <button className='btn btn-sm btn-warning text-white float-end' onClick={logoutUser}>Logout</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <Outlet />

            {/* Render the authenticated user-specific routes */}
            {/* <Routes>
                <Route path="/dashboard" element={<Dashboard />} />
                <Route path="/student" element={<Student />} />
                {/* Add more authenticated user-specific routes here if needed */}
            {/*</Routes> */}

            {/* Common footer for authenticated layout */}
            <footer>
                {/* Footer content */}
            </footer>
        </>
    );
}

export default DefaultLayout;
