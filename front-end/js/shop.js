document.addEventListener('DOMContentLoaded', callAndSaveWatch);
document.getElementById('button-search').addEventListener('click', callAndSaveWatch)

function callAndSaveWatch(){

    let q = document.getElementById('input-search').value ?? "";
    let max = document.getElementById('max').value ?? "";


    // Esegui la chiamata FETCH per ottenere i dati dal backend
    fetch("../back-end/shop.php?q=" + q + "&max=" + max,{
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

                let percorso = "assets/Orologi/" + articoli.NomeImmagine + ".jpg"


                let row = document.createElement('tr');
                row.innerHTML = `
                            <td><img id="img" width=50px height=50px src=${percorso} alt="must have"></td>
                            <td>${articoli.Marca}</td>
                            <td>${articoli.Descr}</td>
                            <td style="text-align: right">${articoli.Prezzo.toLocaleString('it-IT', {
                                style: 'currency',
                                currency: 'EUR'
                            })}</td>`;




                let buttonTd1 = document.createElement('td');
                let button = document.createElement('button');
                button.textContent = 'Aggiungi al carrello';
                button.setAttribute('button-id', articoli.Id_Articolo);
                button.setAttribute('price', articoli.Prezzo);
                button.setAttribute('op', '1');

                button.onclick = function () {
                    AddToCart(
                        this.getAttribute('button-id'),
                        this.getAttribute('price'),
                        this.getAttribute('op'))

                }

                buttonTd1.appendChild(button);
                row.appendChild(buttonTd1);
                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.log('Errore nella chiamata FETCH: ', error);
        });
}


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
            if(data.message==='true') {
                mostraPopupSuccesso();
                console.log(data);
            }
            else alert(data.message);
        })
        .catch(error => {

            console.error('Errore nella richiesta Fetch POST:', error);
        });
}


function mostraPopupSuccesso() {
    let toast = new bootstrap.Toast(document.getElementById('toast'));
    // Modifica dinamicamente il testo del corpo del toast in base alla funzione
    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 1500);
}



document.getElementById("max").addEventListener("input", function(event) {
    // Ottieni il valore corrente del campo
    let inputValue = event.target.value;
    //controllo che inpputValue sia un numero
    if (isNaN(inputValue)) {
        // Se non è un numero, elimina l'ultimo carattere inserito
        event.target.value = inputValue.substring(0, inputValue.length - 1);
    }
    //controllo che lo spazio non sia inserito
    else if (inputValue.includes(" ")) {
        // Se non è un numero intero, elimina l'ultimo carattere inserito
        event.target.value = inputValue.substring(0, inputValue.length - 1);
    }
});