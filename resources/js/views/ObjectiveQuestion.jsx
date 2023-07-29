import axios from "axios";
import { useEffect, useState } from "react";
import { useLocation } from "react-router-dom";



const ObjectiveQuestion = () => {

    const location = useLocation();
    const [template, setTemplate] = useState("");
    const token = location.pathname.split("/")[2];
    useEffect(() => {
        axios
            .post(`/api/objective_question`, { token })
            .then((response) => {
                if (response.data.status === "success") {
                    setTemplate(response.data.template);
                }
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
    }, [token])



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

export default ObjectiveQuestion;
