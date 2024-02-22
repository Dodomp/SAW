

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
                row.setAttribute('data-id', user.id);
                row.innerHTML = `<td>${user.firstname}</td>
                            <td>${user.lastname}</td>
                            <td>${user.email}</td>`;

                let checkboxTd = document.createElement('td');
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.className = 'adminCheckbox';
                checkbox.checked = user.admin;
                checkbox.disabled = true;
                checkbox.setAttribute('data-email', user.email);
                checkbox.onchange = function () {
                    toggleAdmin(this.getAttribute('data-email'));
                };

                checkboxTd.appendChild(checkbox);
                row.appendChild(checkboxTd);

                //creo un bottone per rimuovere l'utente
                let removeButtonTd = document.createElement('td');
                let removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btnRemove';
                removeButton.innerHTML = 'X';
                removeButton.disabled = true;
                removeButton.setAttribute('data-id', user.id);
                removeButton.onclick = function () {
                    removeUser(this.getAttribute('data-id'));
                };

                removeButtonTd.appendChild(removeButton);
                row.appendChild(removeButtonTd);
                tbody.appendChild(row);

            });
        })
        .catch(error => {
            console.log('Errore nella chiamata FETCH: ', error);
        });

});





function toggleAdmin(email) {


    let requestData = {
        email: email,
    };

    fetch("../back-end/ToggleAdmin.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
            return response.json();
        })
        .then(response => {
            console.log(response.message);
            mostraPopupSuccesso(response.message);
        })
        .catch(error => {
            console.error('Errore nella richiesta Fetch POST:', error);
        });
}


function removeUser(id) {
    let requestData = {
        id: id,
    };

    fetch("../back-end/RemoveUser.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(requestData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
            return response.json();
        })
        .then(response => {
            console.log(response.message);
            if (response.message === "Utente rimosso con successo") {
                EliminaRigaById(id);
            }
            mostraPopupSuccesso(response.message);
        })
        .catch(error => {
            console.error('Errore nella richiesta Fetch POST:', error);
        });
}

function EliminaRigaById(id) {
    let tbody = document.querySelector('#userTable tbody');
    let row = tbody.querySelector(`tr[data-id="${id}"]`);
    tbody.removeChild(row);
}


function attivaModificheAdmin(value) {
    if (value === 1) {
        let checkboxes = document.querySelectorAll('#userTable input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.disabled = false;
        });
        let removeButtons = document.querySelectorAll('#userTable button');
        removeButtons.forEach(function (button) {
            button.disabled = false;
        });
    }
    else if (value === 0) {
        let checkboxes = document.querySelectorAll('#userTable input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.disabled = true;
        });
        let removeButtons = document.querySelectorAll('#userTable button');
        removeButtons.forEach(function (button) {
            button.disabled = true;
        });}
}





function mostraPopupSuccesso($responseMessage) {
    let toast = new bootstrap.Toast(document.getElementById('toast'));

    if ($responseMessage === "ERRORE non puoi modificare i tuoi privilegi") {
        document.getElementById('toast-body-content').innerHTML = $responseMessage;
    }
    else if ($responseMessage === "Utente rimosso con successo") {
        document.getElementById('toast-body-content').innerHTML = $responseMessage;
    }
    else if ($responseMessage === "ERRORE utente non rimosso") {
        document.getElementById('toast-body-content').innerHTML = $responseMessage;
    }
    else if ($responseMessage === "ERRORE non puoi rimuovere te stesso") {
        document.getElementById('toast-body-content').innerHTML = $responseMessage;

    }
    else if ($responseMessage === "Privilegi amministratore modificati con successo") {
        document.getElementById('toast-body-content').innerHTML = $responseMessage;
    }

    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 3000);
}




