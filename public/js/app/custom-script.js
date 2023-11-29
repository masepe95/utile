function aggiornaAppuntamentiAjax() {
    fetch("/api-proxy") // URL dell'API per aggiornare gli appuntamenti
        .then((response) => response.json())
        .then((data) => {
            // Aggiorna la pagina con i nuovi dati
            alert("Aggiornamento appuntamenti completato con successo.");
        })
        .catch((error) => {
            alert("Si è verificato un errore.");
        });
}

function aggiornaContrattiAjax() {
    fetch("/api-proxy2") // URL dell'API per aggiornare i contratti
        .then((response) => response.json())
        .then((data) => {
            // Aggiorna la pagina con i nuovi dati
            alert("Aggiornamento contratti completato con successo.");
        })
        .catch((error) => {
            alert("Si è verificato un errore.");
        });
}
