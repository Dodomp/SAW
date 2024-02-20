document.addEventListener("DOMContentLoaded", function() {




    // chiamata fetch per prendere i dati dal server e metterli nella pagina
    fetch("../back-end/show_profile.php",
        {
            method: 'GET',
            headers:
                {
                    'Content-Type': 'application/json'
                },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            take_data(data); //funzione che prende i dati e li mette nella pagina (è implementata sotto)
        })
        .catch(error => console.log(error)
    );


    //la funzione sotto controlla se c'è stato il click sul bottone update
    //e se è stato cliccato prende i dati, li salva in updateData e manda i dati al server tramite
    //una chiamata fetch POST

    //se clicco sul botton update mando i dati al server
    document.getElementById("UpdateBtn").addEventListener("click", function(event) {
        event.preventDefault();
        // Raccogli i dati dalla pagina
        let updatedData = {
            firstname: document.getElementById("firstname").value,
            lastname: document.getElementById("lastname").value,
            email: document.getElementById("email").value,
            age: document.getElementById("age").value,
            description: document.getElementById("description").value,
            nationality: document.getElementById("nationality").value,
        };

        //modifico updatedData in variabile JSON
        updatedData = JSON.stringify(updatedData);

        // Invia i dati aggiornati al server
        fetch("../back-end/update_profile.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: updatedData
        })
            .then(response => {
                if (!response.ok) {
                    alert("ERRORE, potresti aver usato una mail non valida");
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(updatedData => {
                console.log(updatedData);
                location.reload();
            })
            .catch(error => {
                console.error('Error during fetch:', error);
                alert("ERRORE, potresti aver usato una mail non valida");
            });

    });

    function take_data(data){

        document.getElementById("firstname-h5").innerHTML = data.firstname + " " + data.lastname;
        document.getElementById("email-h6").innerHTML = data.email;
        document.getElementById("firstname").value = data.firstname;
        document.getElementById("lastname").value = data.lastname;
        document.getElementById("email").value = data.email;
        document.getElementById("nationality").value = data.nationality;
        if(data.age == 0){ document.getElementById("age").value = null; }
        else { document.getElementById("age").value = data.age; }
        document.getElementById("description").value = data.descr;
        //document.getElementById("sTate").value = data.sTate;
        //document.getElementById("zIp").value = data.zIp;

    }



    //se clicco sul botton cancel fa il refresh della pagina
    document.getElementById("CancelBtn").addEventListener("click", function() {
        location.reload();
    });

    // parte per la modifca della password
    document.getElementById("change-password-btn").addEventListener("click", function() {
        // rendo visibile il div con id update-password
        let div = document.getElementById("update-password");
        if (div.hidden) {
            div.removeAttribute("hidden"); // Mostra il div
            // opacizzo tutto il resto
            document.getElementById("main-container").style.opacity = "0.03";
            // metto tutto il resto non interagibile
            document.getElementById("main-container").style.pointerEvents = "none";
        }
    });


    //add event listener per non far inserire lettere nel campo age

    document.getElementById("age").addEventListener("input", function(event) {
        // Ottieni il valore corrente del campo
        let inputValue = event.target.value;

        //controllo che inpputValue sia un numero
        if (isNaN(inputValue)) {
            // Se non è un numero, elimina l'ultimo carattere inserito
            event.target.value = inputValue.substring(0, inputValue.length - 1);
        }
        //anche se è un numero controllo che sia un numero intero
        else if (inputValue % 1 != 0) {
            // Se non è un numero intero, elimina l'ultimo carattere inserito
            event.target.value = inputValue.substring(0, inputValue.length - 1);
        }
        //controllo che il numero sia compreso tra 1 e 120
        else if (inputValue < 1 || inputValue > 120) {
            // Se non è un numero intero, elimina l'ultimo carattere inserito
            event.target.value = inputValue.substring(0, inputValue.length - 1);
        }
        //controllo che lo spazio non sia inserito
        else if (inputValue.includes(" ")) {
            // Se non è un numero intero, elimina l'ultimo carattere inserito
            event.target.value = inputValue.substring(0, inputValue.length - 1);
        }
    });





});







//funzione per chiudere il div con id update-password
function closeUpdatePassword() {
    //metti a hidden il div con id update-password
    let div = document.getElementById("update-password");
    if (!div.hidden) {
        //svuoto i campi di inserimento password
        document.getElementById("current-password").value = "";
        document.getElementById("new-password").value = "";
        document.getElementById("confirm-password").value = "";
        // nascondo il div
        div.setAttribute("hidden", "");
        // riporto l'opacità a 1
        document.getElementById("main-container").style.opacity = "1";
        // riporto la possibilità di interagire con il resto della pagina
        document.getElementById("main-container").style.pointerEvents = "auto";

    }
}


//funzione per confermare l'update della password e mandare i dati al server
function confirmUpdate() {

    //se almeno uno dei campi è vuoto non faccio niente
    if (document.getElementById("current-password").value === "" || document.getElementById("new-password").value === "" || document.getElementById("confirm-password").value === "") {
        mostraPopup('error', 'Inserisci tutti i campi')
        return;
    }

    //prendo i dati inseriti dall'utente e li metto in un array
    let updatedData = {
        old_password: document.getElementById("current-password").value,
        new_password: document.getElementById("new-password").value,
        confirm_password: document.getElementById("confirm-password").value,
    };

    fetch("../back-end/update_password.php",
        {
            method: 'POST',
            headers:
                {
                    'Content-Type': 'application/json'
                },
            body: JSON.stringify(updatedData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Errore HTTP! Stato: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            //console.log(data);
            if (data.success) {
                closeUpdatePassword();
                mostraPopup('success', data.message);
            } else {
                mostraPopup('error', data.message);
            }
        })
        .catch(error => {
            console.error('Error during fetch:', error);
            // Continua con il gestore dell'errore
            console.log(error);
        });
}


//funzione per mandare dei popup di conferma o di errore
function mostraPopup(function_type, message) {
    let toast = new bootstrap.Toast(document.getElementById('toast'));
    // Modifica dinamicamente il testo del corpo del toast in base alla funzione
    let toastBody = document.getElementById('toast-body-content');
    if (function_type === 'success') {
        toastBody.innerHTML = message;
    } else if (function_type === 'error') {
        toastBody.innerHTML = message;
    }
    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 5000);
}





















