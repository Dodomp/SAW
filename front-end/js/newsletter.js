
/*
const LoadEmail= async () => {

    if (document.getElementById("emailObject").value == "") {
        alert("Inserisci un oggetto");
        return;
    };



    let email = {
        'object' : document.getElementById("emailObject").value,
        'text' : document.getElementById("emailBody").innerHTML
    };


    try{
        let res = await fetch('../AdminAreaFolder/Send_Newsletter.php', {
            'method': 'POST',
            'headers': {
                'Content-Type': 'application/json; charset=utf-8'
            },
            body: JSON.stringify(email)
        });
        let data =  res.json();
        console.log(data);
        let messaggio="Newsletter inviata con successo";
        alert(messaggio);
        window.location.href = "../AdminAreaFolder/AdminArea.php";

    }catch(error){

        console.error('Si è verificato un errore', error);
    }
}*/

function mostraPopupSuccesso() {
    let toast = new bootstrap.Toast(document.getElementById('toast'));
    // Modifica dinamicamente il testo del corpo del toast in base alla funzione
    toast.show();
    setTimeout(function() {
        toast.hide();
    }, 1500);
}