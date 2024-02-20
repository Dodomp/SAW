

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
                    toggleAdmin(this.getAttribute('data-email'));
                };


                checkboxTd.appendChild(checkbox);
                row.appendChild(checkboxTd);
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
            mostraPopupSuccesso();
        })
        .catch(error => {
            console.error('Errore nella richiesta Fetch POST:', error);
        });
}

function mostraPopupSuccesso() {
    let toast = new bootstrap.Toast(document.getElementById('toast'));

    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 3000);
}


