import axios from "axios";
import Swal from "sweetalert2";

function searchVolunteer(event) {
    event.preventDefault();
    const project_id = event?.target.elements?.project_id?.value;
    const volunteer_id = event?.target?.elements?.volunteer_id?.value;
    const submitButtonElement = event?.target?.elements?.submitButton;

    if (submitButtonElement) {
        submitButtonElement.disabled = true;
    }

    if (!project_id || !volunteer_id) {
        return;
    }
    axios
        .post("/volunteer/contact/" + volunteer_id, { project_id })
        .then(() => {
            Swal.fire({
                title: "Mail to volunteer has been sent",
                icon: "success",
            });
        })
        .catch((e) => {
            Swal.fire({
                title: e.response?.data?.message || e?.message,
                icon: "error",
            });
        });
}

window.searchVolunteer = searchVolunteer;
