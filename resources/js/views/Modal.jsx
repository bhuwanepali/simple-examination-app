// Modal.js

import React from "react";
import Modal from "react-modal";

const customStyles = {
    content: {
        top: "50%",
        left: "50%",
        right: "auto",
        bottom: "auto",
        marginRight: "-50%",
        width: "80%",
        transform: "translate(-50%, -50%)",
    },
};

Modal.setAppElement("#login-component");

const CustomModal = ({ isOpen, onClose, children }) => {
    return (
        <Modal
            isOpen={isOpen}
            onRequestClose={onClose}
            style={customStyles}
            contentLabel="Modal"
        >
            <div className="col-md-12 mb-3">
                <button className="btn btn-sm btn-danger mb-2 float-end" onClick={onClose}>Close</button>
            </div>
            {children}
        </Modal>
    );
};
// const [modalIsOpen, setModalIsOpen] = useState(false);

// const openModal = () => {
//     setModalIsOpen(true);
// };

// const closeModal = () => {
//     setModalIsOpen(false);
// };

{/* <CustomModal isOpen={modalIsOpen} onClose={closeModal}>
                                <form>
                                    <div className="row">
                                        <div className="col-md-6 mb-3">
                                            <label for="title" class="form-label">Subject</label>
                                            <select name="subject" id="subject" className="form-control" required>
                                                <option value="">Choose</option>
                                                <option value="physics">Physics</option>
                                                <option value="chemistry">Chemistry</option>
                                            </select>
                                        </div>
                                        <div className="col-md-6 mb-3">
                                            <label for="expiry_date" class="form-label">Expiry Date</label>
                                            <input type="date" class="form-control" id="expiry_date" required />
                                        </div>
                                        <div className="col-md-12 mb-3">
                                            <label for="question" class="form-label">Title</label>
                                            <textarea name="question" id="question" rows="2" className="form-control required"></textarea>
                                        </div>
                                        <h5>Choices</h5>
                                        <div className="col-md-6 mb-3">
                                            <label for="option1" class="form-label">Option 1</label>
                                            <input type="text" name="option1" id="option1" className="form-control" required />
                                        </div>
                                        <div className="col-md-6 mb-3">
                                            <label for="option2" class="form-label">Option 2</label>
                                            <input type="text" name="option2" id="option2" className="form-control" required />
                                        </div>
                                        <div className="col-md-6 mb-3">
                                            <label for="option3" class="form-label">Option 3</label>
                                            <input type="text" name="option3" id="option3" className="form-control" required />
                                        </div>
                                        <div className="col-md-6 mb-3">
                                            <label for="option4" class="form-label">Option 4</label>
                                            <input type="text" name="option4" id="option4" className="form-control" required />
                                        </div>
                                        <div className="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-success float-end">Generate</button>
                                        </div>
                                    </div>
                                </form>
                            </CustomModal> */}


export default CustomModal;
