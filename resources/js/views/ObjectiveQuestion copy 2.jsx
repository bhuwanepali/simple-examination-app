import React, { Component } from "react";
import axios from "axios";

export default class ObjectiveQuestion extends Component {
    constructor(props) {
        super(props);
        this.state = {
            template: null,
        };
    }

    componentDidMount() {
        // this.fetchData();
        console.log(this.props);
    }

    fetchData() {


        // const searchParams = new URLSearchParams(location.search);
        // // const { id } = this.props.match.params;
        // alert(searchParams);
        // var qrystring = this.props.location.search;
        // var params = qrystring.substr(1).split("&");
        // var queryParams = {};

        // params.forEach((param) => {
        //     var parts = param.split("=");
        //     queryParams[parts[0]] = parts[1];
        // });

        // // Now, queryParams object will contain the query parameters and their values
        // alert(queryParams);

        axios
            .post(`api/objective_question`, { token })
            .then((response) => {
                if (response.data.status === "success") {
                    this.setState({ template: response.data.template });
                }
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    }

    render() {
        const { template } = this.state;

        return (
            <div>
                {template ? (
                    <div dangerouslySetInnerHTML={{ __html: template }} />
                ) : (
                    <p>Loading...</p>
                )}
            </div>
        );
    }
}
