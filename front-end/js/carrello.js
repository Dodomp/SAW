document.addEventListener('DOMContentLoaded', function () {



    // Esegui la chiamata FETCH per ottenere i dati dal backend
    fetch("../back-end/carrello.php", {
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
            let qta=0;
            let tbody = document.querySelector('#userTable tbody');
            tbody.innerHTML = ''; // Svuota il contenuto della tabella

            data.forEach(function (carrello) {

                    let percorso = "assets/Orologi/" + carrello.NomeImmagine + ".jpg"


                    let row = document.createElement('tr');
                    row.innerHTML = `
                                <td><img width=50px height=50px src=${percorso} alt="must have"></td>
                                <td>${carrello.Marca}</td>
                                <td>${carrello.Descr}</td>
                                <td>${carrello.quantità}</td>
                                <td>${carrello.prezzo}</td>`;

                    let buttonTdAdd = document.createElement('td');
                    let buttonAdd = document.createElement('button');
                    buttonAdd.textContent = 'Aggiungi al carrello';
                    buttonAdd.setAttribute('button-id', carrello.Id_Articolo);
                    buttonAdd.setAttribute('price', carrello.Prezzo);
                    buttonAdd.setAttribute('op', '1');

                    let buttonTdRM = document.createElement('td');
                    let buttonRM = document.createElement('button');
                    buttonRM.textContent = 'Rimuovi dal carrello';
                    buttonRM.setAttribute('button-id', carrello.Id_Articolo);
                    buttonRM.setAttribute('price', carrello.Prezzo);
                    buttonRM.setAttribute('op', '0');


                    //bottone per aggiungere prodotto
                    buttonAdd.onclick = function () {
                        AddToCart(
                            this.getAttribute('button-id'),
                            this.getAttribute('price'),
                            this.getAttribute('op'))

                    }

                    buttonTdAdd.appendChild(buttonAdd);
                    row.appendChild(buttonTdAdd);
                    tbody.appendChild(row);


                    //bottone per rimuovere prodotto
                    buttonRM.onclick = function () {
                        AddToCart(
                            this.getAttribute('button-id'),
                            this.getAttribute('price'),
                            this.getAttribute('op'))

                    }

                    buttonTdRM.appendChild(buttonRM);
                    row.appendChild(buttonTdRM);
                    tbody.appendChild(row);

                    qta=qta+carrello.prezzo;
            });
            document.getElementById("totale").innerHTML=qta;
        })
        .catch(error => {
            console.log('Errore nella chiamata FETCH: ', error);
        });

});


function AddToCart (id,price,op) {

    let data = {
        id : id,
        price : price,
        op : op,
    };

    fetch("../back-end/AddToCart.php", {
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
            console.log(data);
        })
        .catch(error => {

            console.error('Errore nella richiesta Fetch POST:', error);
        });
}


