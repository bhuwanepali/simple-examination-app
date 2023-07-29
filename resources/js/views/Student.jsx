import React from "react";
import axios from "axios";

class Student extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading: true,
            // data: {},
            student: []
        };
    }

    componentDidMount() {
        // this.fetchData();
        // this.fetchStudent();
        this.setState({ loading: true });
        axios
            .get(`/api/get_student`)
            .then((res) => {
                this.setState({
                    loading: false,
                    student: res.data.student,
                });
            })
            .catch((error) => {
                this.setState({ loading: false });
                console.error("Error fetching data:", error);
            });
        setTimeout(function () {
            load_student_table_data();
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

    // fetchStudent() {
    //     this.setState({ loading: true });
    //     axios
    //         .get(`/api/get_student`)
    //         .then((res) => {
    //             this.setState({
    //                 loading: false,
    //                 student: res.data.student,
    //             });
    //         })
    //         .catch((error) => {
    //             this.setState({ loading: false });
    //             console.error("Error fetching data:", error);
    //         });
    // }


    render() {
        const { loading, student } = this.state;

        return (
            <div className="container">
                {loading && <div className="flex justify-center">Loading...</div>}
                {!loading && (
                    <div className="card mt-4">
                        <div className="card-header">
                            <div className="card-title">
                                List of Students
                                <a href="javascript:void(0)" className="btn btn-sm btn-primary float-end view" data-url="/api/get_student_form"><i className="fa-solid fa-plus"></i>&nbsp;Add Student</a>
                            </div>
                        </div>
                        <div className="card-body">
                            <div className="table-responsive">
                                <table className="table table-bordered" id="student">
                                    <thead>
                                        <tr>
                                            <th width="5%" scope="col">#</th>
                                            <th width="35%" scope="col">Name</th>
                                            <th width="45%" scope="col">Email</th>
                                            <th width="15%" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {student.length > 0 ?
                                            student.map((item, index) => (
                                                <tr key={index}>
                                                    <th scope="row">{index + 1}</th>
                                                    <td>{item.name}</td>
                                                    <td>{item.email}</td>
                                                    <td>
                                                        <a href="javascript:void(0)" className="btn btn-sm btn-primary view ms-2" data-url="/api/edit_student_info" data-id={item.id}>
                                                            <i className="fa-solid fa-pen-to-square"></i>
                                                        </a>&nbsp;
                                                        <a href="javascript:void(0)" className="btn btn-sm btn-danger btnDelete ms-2" data-url="/api/delete" data-tableid="student" data-id={item.id} data-is_refresh='Y'>
                                                            <i className="fa-solid fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            )) : ''}
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

export default Student;

function load_student_table_data() {
    $(document).ready(function () {
        $('#student').dataTable({
            columnDefs: [
                {
                    orderable: false,
                    targets: [3]
                }
            ]
        });
    });
}