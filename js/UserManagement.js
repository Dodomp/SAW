

document.addEventListener('DOMContentLoaded', function () {



    // Esegui la chiamata FETCH per ottenere i dati dal backend
    fetch("../back-end/UserManagement.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            let tbody = document.querySelector('#userTable tbody');
            tbody.innerHTML = ''; // Svuota il contenuto della tabella

            data.forEach(function (user) {
                let row = document.createElement('tr');
                row.innerHTML = `<td>${user.firstname}</td>
                            <td>${user.lastname}</td>
                            <td>${user.email}</td>`;

                let checkboxTd = document.createElement('td');
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.checked = user.admin;
                checkbox.setAttribute('data-email', user.email);
                checkbox.onchange = function () {
                    if (this.checked) {
                        makeAdmin(this.getAttribute('data-email'));
                    } else {
                        removeAdmin(this.getAttribute('data-email'));
                    }
                };



                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        makeAdmin(this.getAttribute('data-email'));
                    } else {
                        removeAdmin(this.getAttribute('data-email'));
                    }
                });

                checkboxTd.appendChild(checkbox);
                row.appendChild(checkboxTd);
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.log('Errore nella chiamata FETCH: ', error);
        });

});





function removeAdmin(email) {


    let requestData = {
        email: email,
    };

    fetch("RemoveAdmin.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
        .then(response => {
            if (response.ok) {
                // Controlla se la risposta contiene dati JSON
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    // Se la risposta è vuota o non è JSON, gestisci il caso qui
                    return Promise.resolve({ message: 'Success' }); // Puoi restituire un oggetto vuoto o un messaggio di conferma

                }
            } else {
                // Se la risposta non è OK, gestisci il caso qui
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

        })
        .then(response => {
            console.log('Success:', response);
            mostraPopupSuccesso('remove');
        })
        .catch(error => {
            console.error('Error during fetch:', error);

            // Aggiungi questo log per visualizzare la risposta completa
            response.text().then(text => console.log('Response text:', text));

            // Continua con il gestore dell'errore
            console.log(error);
        });
}


function makeAdmin(email) {


    let requestData = {
        email: email,
    };

    fetch("MakeAdmin.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
        .then(response => {
            if (response.ok) {
                // Controlla se la risposta contiene dati JSON
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    // Se la risposta è vuota o non è JSON, gestisci il caso qui
                    return Promise.resolve({ message: 'Success' }); // Puoi restituire un oggetto vuoto o un messaggio di conferma

                }
            } else {
                // Se la risposta non è OK, gestisci il caso qui
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

        })
        .then(response => {
            console.log('Success:', response);
            mostraPopupSuccesso('make');
        })
        .catch(error => {
            console.error('Error during fetch:', error);

            // Aggiungi questo log per visualizzare la risposta completa
            response.text().then(text => console.log('Response text:', text));

            // Continua con il gestore dell'errore
            console.log(error);
        });
}





function mostraPopupSuccesso(function_type) {
    let toast = new bootstrap.Toast(document.getElementById('toast'));
    // Modifica dinamicamente il testo del corpo del toast in base alla funzione
    let toastBody = document.getElementById('toast-body-content');
    if (function_type === 'make') {
        toastBody.innerHTML = 'Admin aggiunto con successo';
    } else if (function_type === 'remove') {
        toastBody.innerHTML = 'Admin rimosso con successo';
    }
    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 3000);
}


