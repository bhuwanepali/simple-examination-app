import React from "react";
import { Routes, Route, Navigate } from "react-router-dom";
import DefaultLayout from "../components/DefaultLayout";
import Dashboard from "../views/Dashboard";
import Student from "../views/Student";
import Login from "../views/Login";
import Signup from "../views/Signup";
import ObjectiveQuestion from "../views/ObjectiveQuestion";
import GuestLayout from "../components/GuestLayout";
import { getToken } from "../components/AuthService";

const App = () => {
    const token = getToken();

    // Render the login route only if the user is not authenticated (no token)
    const renderLoginRoute = () => {
        return token ? <Navigate to="/dashboard" /> : <Login />;
    };

    return (
        <Routes>
            {/* Use the GuestLayout for non-authenticated routes */}
            <Route
                element={<GuestLayout />}
            >
                {/* Use renderLoginRoute for the login route */}
                <Route path="/login" element={renderLoginRoute()} />
                <Route path="/signup" element={<Signup />} />
                <Route path="/objective_question/:token" element={<ObjectiveQuestion />} />
                {/* Redirect to /login when any unmatched route is accessed */}
                <Route index element={<Navigate to="/login" />} />
            </Route>
            {/* Use the DefaultLayout for authenticated routes */}
            <Route

                element={<DefaultLayout />}
            >
                {/* Dashboard route */}
                <Route path="/dashboard" element={<Dashboard />} />
                <Route path="/student" element={<Student />} />
                {/* Redirect to /dashboard when the root path is accessed */}
                <Route index element={<Navigate to="/dashboard" />} />
            </Route>


        </Routes>
    );
};

export default App;
