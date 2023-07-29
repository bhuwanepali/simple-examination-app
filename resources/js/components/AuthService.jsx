import axios from 'axios';
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export const getToken = () => {
    const tokenString = localStorage.getItem('token');
    const userToken = JSON.parse(tokenString);
    return userToken;
};

export const getUser = () => {
    const userString = localStorage.getItem('user');
    const user_detail = JSON.parse(userString);
    return user_detail;
};

export const saveToken = (user, token) => {
    localStorage.setItem('token', JSON.stringify(token));
    localStorage.setItem('user', JSON.stringify(user));
};

export const logout = () => {
    localStorage.clear();
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