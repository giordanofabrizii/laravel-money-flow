document.addEventListener('DOMContentLoaded', function () {
    const periodEl = document.getElementById("period-selector");
    const incomeEl = document.getElementById("income");
    const outcomeEl = document.getElementById("outcome");
    const balanceEl = document.getElementById("balance");

    // Funzione per caricare i dati delle transazioni
    function loadTransactions(type, value, year) {
        fetch(`/transactions/${type}/${value}/${year}`)
            .then(response => response.json())
            .then(data => {
                // Aggiorna i contenuti
                incomeEl.textContent = parseFloat(data.incoming).toFixed(2);
                outcomeEl.textContent = parseFloat(data.outcoming).toFixed(2);
                balanceEl.textContent = parseFloat(data.balance).toFixed(2);
            })
            .catch(error => console.error('Errore:', error));
    }

    // Carica i dati iniziali
    const initialType = periodEl.children[0].getAttribute('data-type'); // Tipo dell'elemento iniziale
    const initialValue = periodEl.children[0].getAttribute('data-value'); // Valore dell'elemento iniziale
    const initialYear = periodEl.children[0].getAttribute('data-year'); // Anno dell'elemento iniziale

    loadTransactions(initialType, initialValue, initialYear);

    // Aggiungi un listener per il click sugli elementi
    periodEl.addEventListener('click', function(event) {
        // Verifica se il target è un elemento <li>
        if (event.target.tagName === 'LI') {
            // Rimuovi la classe "selected" da tutti i figli e aggiungila all'elemento cliccato
            Array.from(periodEl.children).forEach(li => li.classList.remove('selected'));
            event.target.classList.add('selected');

            // Ottieni i dati dell'elemento cliccato
            const type = event.target.getAttribute('data-type');
            const value = event.target.getAttribute('data-value');
            const year = event.target.getAttribute('data-year');

            // Carica i dati basati sull'elemento cliccato
            loadTransactions(type, value, year);
        }
    });
});
