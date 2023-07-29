import React from "react";

export default function ObjectiveQuestion() {
    return (
        <div className="container mt-4">
            <div className="card">
                <div className="card-header">
                    Question:
                </div>
                <form className="form-horizontal" id="QuestionnaireEntryForm" action="/api/store_question" method="POST">
                    <div className="card-body">
                        <div className="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox1" value="1" className="checkbox" />
                            <label htmlFor="option_1" className="form-label">&nbsp;1. </label>
                        </div>
                        <div className="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox2" value="2" className="checkbox" />
                            <label htmlFor="option_2" className="form-label">&nbsp;2. </label>
                        </div>
                        <div className="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox3" value="3" className="checkbox" />
                            <label htmlFor="option_3" className="form-label">&nbsp;3. </label>
                        </div>
                        <div className="col-md-6 mb-3">
                            <input type="checkbox" name="right_option" id="checkbox4" value="4" className="checkbox" />
                            <label htmlFor="option_4" className="form-label">&nbsp;4. </label>
                        </div>
                        <div className="col-md-12 mb-4">
                            <button type="submit" className="btn btn-sm btn-success float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    );
}