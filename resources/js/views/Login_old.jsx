import { useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../axios.js";
import { useStateContext } from "../contexts/ContextProvider.jsx";

export default function Login() {
    const { setCurrentUser, setUserToken } = useStateContext();
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [error, setError] = useState({ __html: "" });

    const onSubmit = (ev) => {
        ev.preventDefault();
        setError({ __html: "" });

        axiosClient
            .post("/login", {
                email,
                password,
            })
            .then(({ data }) => {
                setCurrentUser(data.user);
                setUserToken(data.token);
            })
            .catch((error) => {
                if (error.response) {
                    const finalErrors = Object.values(error.response.data.errors).reduce(
                        (accum, next) => [...accum, ...next],
                        []
                    );
                    setError({ __html: finalErrors.join("<br>") });
                }
                console.error(error);
            });
    };

    return (
        <div className="container">
            <div className="row w-25">
                <div className="card d-flex justify-content-center text-center" style={{ marginLeft: '450px' }}>
                    <div className="card-body d-flex flex-column">
                        <h2 className="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                            Sign in to your account
                        </h2>
                        <p className="mt-2 text-center text-sm text-gray-600">
                            Or{" "}
                            <Link
                                to="/signup"
                                className="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                signup for free
                            </Link>
                        </p>

                        {error.__html && (
                            <div
                                className="bg-red-500 rounded py-2 px-3 text-white"
                                dangerouslySetInnerHTML={error}
                            ></div>
                        )}

                        <form onSubmit={onSubmit} className="mt-8 space-y-6" action="#" method="POST">
                            <input type="hidden" name="remember" defaultValue="true" />
                            <div className="-space-y-px rounded-md shadow-sm">
                                <div>
                                    <input
                                        id="email-address"
                                        name="email"
                                        type="email"
                                        autoComplete="email"
                                        required
                                        value={email}
                                        onChange={(ev) => setEmail(ev.target.value)}
                                        className="form-control mb-4"
                                        placeholder="Email address"
                                    />
                                </div>
                                <div>
                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autoComplete="current-password"
                                        required
                                        value={password}
                                        onChange={(ev) => setPassword(ev.target.value)}
                                        className="form-control mb-4"
                                        placeholder="Password"
                                    />
                                </div>
                            </div>

                            <div className="flex items-center justify-between">
                                <div className="flex items-center">
                                    <input
                                        id="remember-me"
                                        name="remember-me"
                                        type="checkbox"
                                    />&nbsp;
                                    <label
                                        htmlFor="remember-me"
                                        className="ml-2 block text-sm text-gray-900"
                                    >
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    className="btn btn-sm btn-primary"
                                >
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}