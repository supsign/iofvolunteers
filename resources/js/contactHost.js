import axios from 'axios';
import Swal from 'sweetalert2';

function searchHost(event) {
    event.preventDefault();
    const guest_id = event?.target?.elements?.guest_id?.value;
    const host_id = event?.target.elements?.host_id?.value;
    const submitButtonElement = event?.target?.elements?.submitButton;

    if (submitButtonElement) {
        submitButtonElement.disabled = true;
    }

    if (!guest_id || !host_id) {
        console.log(event);
        return;
    }
    axios

        .post('/host/contact/' + host_id, { guest_id })
        .then(() => {
            Swal.fire({
                title: 'Mail to host has been sent',
                icon: 'success',
            });
        })
        .catch((e) => {
            Swal.fire({
                title: e.response?.data?.message || e?.message,

                icon: 'error',
            });
        });
}

window.searchHost = searchHost;
