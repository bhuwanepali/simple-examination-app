import React from "react";
import axios from "axios";

class Dashboard extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading: true,
            // data: {},
            questions: [],
        };
    }

    componentDidMount() {
        // this.fetchData();
        this.fetchQuetionnaire();
        setTimeout(function () {
            load_table_data();
        }, 1000);
    }

    // fetchData() {
    //     this.setState({ loading: true });
    //     axios
    //         .get(`/dashboard`)
    //         .then((res) => {
    //             this.setState({
    //                 loading: false,
    //                 data: res.data,
    //             });
    //         })
    //         .catch((error) => {
    //             this.setState({ loading: false });
    //             console.error("Error fetching data:", error);
    //         });
    // }

    fetchQuetionnaire() {
        this.setState({ loading: true });
        axios
            .get(`/api/get_questionnaire`)
            .then((res) => {
                this.setState({
                    loading: false,
                    questions: res.data.questions,
                });
            })
            .catch((error) => {
                this.setState({ loading: false });
                console.error("Error fetching data:", error);
            });
    }

    render() {
        const { loading, questions } = this.state;
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
                                            <th width="8%" scope="col">Subject</th>
                                            <th width="45%" scope="col">Title</th>
                                            <th width="20%" scope="col">Options</th>
                                            <th width="10%" scope="col">Expires At</th>
                                            <th width="15%" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {questions.length > 0 ?
                                            questions.map((item, index) => {
                                                const right_option = `${item.right_option}`;
                                                return (
                                                    <tr key={index}>
                                                        <th scope="row">{index + 1}</th>
                                                        <td>{item.subject}</td>
                                                        <td>{item.title}</td>
                                                        <td>
                                                            <span style={right_option == 1 ? { color: 'green' } : { color: 'red' }}>
                                                                1. {item.option_1}
                                                            </span><br />
                                                            <span style={right_option == 2 ? { color: 'green' } : { color: 'red' }}>
                                                                2. {item.option_2}
                                                            </span><br />
                                                            <span style={right_option == 3 ? { color: 'green' } : { color: 'red' }}>
                                                                3. {item.option_3}
                                                            </span><br />
                                                            <span style={right_option == 4 ? { color: 'green' } : { color: 'red' }}>
                                                                4. {item.option_4}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            {item.expiry_date}
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" className="btn btn-sm btn-primary view ms-2" data-url="/api/edit_question" data-id={item.id}>
                                                                <i className="fa-solid fa-pen-to-square"></i>
                                                            </a>&nbsp;
                                                            <a href="javascript:void(0)" className="btn btn-sm btn-danger btnDelete ms-2" data-url="/api/destroy" data-tableid="questionnaire" data-id={item.id} data-is_refresh='Y'>
                                                                <i className="fa-solid fa-trash"></i>
                                                            </a>&nbsp;
                                                            <form action="" id="sendMail" method="POST">
                                                                <input type="hidden" name="id" id="id" value={item.id} />
                                                                <a href="javascript:void(0)" className="btn btn-sm btn-success ms-2 btn_send_mail" data-href="/api/send_mail" data-id={item.id}>
                                                                    <i className="fa-solid fa-envelope"></i>
                                                                </a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                )
                                            }) : ''}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        );
    }
}

export default Dashboard;

function load_table_data() {
    $(document).ready(function () {
        $('#questionnaire').dataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: [5]
                }
            ]
        });
    });
}