import { useEffect, useState } from "react";
import axios from "axios";

export default function Dashboard() {
    const [loading, setLoading] = useState(true);
    const [data, setData] = useState({});

    useEffect(() => {
        setLoading(true);
        axios
            .get(`/dashboard`)
            .then((res) => {
                setLoading(false);
                setData(res.data);
                return res;
            })
            .catch((error) => {
                setLoading(false);
                return error;
            });
    }, []);

    return (
        <div className="container">
            {loading && <div className="flex justify-center">Loading...</div>}
            {!loading && (
                <div className="card mt-4">
                    <div className="card-header">
                        <div className="card-title">
                            List of Questionnaires
                            <a href="javascript:void(0)" className="btn btn-sm btn-primary float-end view" data-url="/api/get_form"><i className="fa-solid fa-plus"></i>&nbsp;Add Question</a>
                        </div>
                    </div>
                    <div className="card-body">
                        <div className="table-responsive">
                            <table className="table table-bordered" id="questionnaire">
                                <thead>
                                    <tr>
                                        <th width="2%" scope="col">#</th>
                                        <th width="5%" scope="col">Subject</th>
                                        <th width="50%" scope="col">Title</th>
                                        <th width="31%" scope="col">Options</th>
                                        <th width="7%" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>
                                            <i className="fa-solid fa-pen-to-square"></i>
                                            &nbsp;<i className="fa-solid fa-trash"></i>
                                            &nbsp;<i className="fa-solid fa-envelope"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        <td>
                                            <i className="fa-solid fa-pen-to-square"></i>
                                            &nbsp;<i className="fa-solid fa-trash"></i>
                                            &nbsp;<i className="fa-solid fa-envelope"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry the Bird</td>
                                        <td>Larry the Bird</td>
                                        <td>@twitter</td>
                                        <td>
                                            <i className="fa-solid fa-pen-to-square"></i>
                                            &nbsp;<i className="fa-solid fa-trash"></i>
                                            &nbsp;<i className="fa-solid fa-envelope"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            )}
        </div>
    );
}
