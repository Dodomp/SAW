document.addEventListener('DOMContentLoaded', function () {



    // Esegui la chiamata FETCH per ottenere i dati dal backend
    fetch("../back-end/shop.php", {
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

                let percorso = "assets/Orologi/" + articoli.NomeImmagine + ".jpeg"


                let row = document.createElement('tr');
                row.innerHTML = `
                            <td><img width=50px height=50px src=${percorso} alt="must have"></td>
                            <td>${articoli.DescBreve}</td>
                            <td>${articoli.Descr}</td>
                            <td>${articoli.Prezzo}</td>`;

                let buttonTd = document.createElement('td');
                let button = document.createElement('button');
                button.textContent = 'Aggiungi al carrello';
                button.setAttribute('button-id', articoli.Id_Articolo);

                button.onclick = function () {
                    AddToCart(this.getAttribute('button-id'));
                }

                buttonTd.appendChild(button);
                row.appendChild(buttonTd);
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.log('Errore nella chiamata FETCH: ', error);
        });

});