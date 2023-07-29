// import axios from 'axios';

// const API_URL = 'http://127.0.0.1:8000/api'; // Replace with your Laravel backend URL

// const authService = {
//     login: (email, password) => {
//         return axios.post(`${API_URL}/login`, { email, password });
//     },
//     logout: () => {
//         return axios.post(`${API_URL}/logout`);
//     },
//     register: (name, email, password, password_confirmation) => {
//         return axios.post(`${API_URL}/register`, { name, email, password, password_confirmation });
//     },
//     getUser: () => {
//         return axios.post(`${API_URL}/user`);
//     },
// };

// export default authService;

import axios from 'axios';
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export const getToken = () => {
    const tokenString = sessionStorage.getItem('token');
    const userToken = JSON.parse(tokenString);
    return userToken;
};

export const getUser = () => {
    const userString = sessionStorage.getItem('user');
    const user_detail = JSON.parse(userString);
    return user_detail;
};

export const saveToken = (user, token) => {
    sessionStorage.setItem('token', JSON.stringify(token));
    sessionStorage.setItem('user', JSON.stringify(user));
};

export const logout = () => {
    sessionStorage.clear();
};

export const getHttpInstance = (token) => {
    return axios.create({
        baseURL: "http://127.0.0.1:8000/api",
        headers: {
            "Content-type": "application/json",
            "Authorization": `Bearer ${token}`
        }
    });
};