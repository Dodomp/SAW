

fetch("../back-end/inventory.php?", {
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

        data.forEach(function (articoli) {

            let row = document.createElement('tr');
            row.innerHTML = `                          
                            <td>${articoli.Marca}</td>
                            <td>${articoli.Descr}</td>
                            <td style="text-align: right">${articoli.Prezzo}</td>
                            <td style="text-align: right">${articoli.Quantita}</td>`;

            let buttonTd1 = document.createElement('td');
            let button = document.createElement('button');
            button.className = 'btnADD';
            button.textContent = '+';
            button.setAttribute('button-id', articoli.Id_Articolo);

            button.onclick = function () {
                AddToInventory(this.getAttribute('button-id'))
            }

            buttonTd1.appendChild(button);
            row.appendChild(buttonTd1);
            tbody.appendChild(row);
        });
    })
    .catch(error => {
        console.log('Errore nella chiamata FETCH: ', error);
    });


function AddToInventory (id) {

    let data = {
        id : id,
    };

    fetch("../back-end/AddToInventory.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            location.reload();
        })
        .catch(error => {
            console.error('Errore nella richiesta Fetch POST:', error);
        });
}
