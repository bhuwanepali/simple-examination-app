import React, { useState, useEffect } from 'react';
import { getToken, getUser, saveToken, getHttpInstance } from '../components/AuthService';
import { useNavigate, Link } from 'react-router-dom';

const Login = () => {
    const navigate = useNavigate();
    const token = getToken();
    const [user, setUser] = useState(getUser());
    const http = getHttpInstance(token);

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');

    const handleLogin = (event) => {
        event.preventDefault();
        http
            .post("/login", { email, password })
            .then((response) => {
                console.log(response);
                saveToken(response.data.user, response.data.access_token);
                setUser(response.data.user);
                navigate('/dashboard');
                // Login successful, handle the response (e.g., store token, redirect)
            })
            .catch((error) => {
                console.log(error);
                // Login failed, handle the error (e.g., display error message)
                setError('Invalid email or password.');
            });
    };

    useEffect(() => {
        // Check if the user is already authenticated
        if (token) {
            // Redirect to the dashboard or any other page
            navigate("/dashboard");
        }
    }, [token, navigate]);


    return (
        <div className="container mt-4">
            <div className="row w-25">
                <div className="card d-flex justify-content-center text-center" style={{ marginLeft: '450px' }}>
                    <div className="card-body d-flex flex-column">
                        <h5 className="fw-normal my-4 pb-3 text-center" style={{ letterSpacing: '1px' }}>
                            Sign into below
                        </h5>
                        <p className="mt-2 text-center text-sm text-gray-600">
                            Or{" "}
                            <Link
                                to="/signup"
                                className="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                signup for free
                            </Link>
                        </p>
                        <form onSubmit={handleLogin}>
                            <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} className='form-control mb-4' placeholder='Email' />
                            <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} className='form-control mb-4' placeholder='Password' />
                            <button type="submit" className='btn btn-dark mb-4 px-5 text-center'>Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Login;
