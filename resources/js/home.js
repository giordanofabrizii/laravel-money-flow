const periodEl = document.getElementById("period-selector");
const incomeEl = document.getElementById("income");
const outcomeEl = document.getElementById("outcome");
const balanceEl = document.getElementById("balance");

periodEl.addEventListener('click', function(event) {
    // remove all the "selected" class from the childrens and add to the clicked
    Array.from(periodEl.children).forEach(li => li.classList.remove('selected'));
    event.target.classList.add('selected');

    // get the datas
    const type = event.target.getAttribute('data-type');
    const value = event.target.getAttribute('data-value');
    const year = event.target.getAttribute('data-year');

    // AJAX call for the datas from the db
    fetch(`/transactions/${type}/${value}/${year}`)
        .then(response => response.json())
        .then(data => {
            // update the span
            incomeEl.textContent = data.incoming;
            outcomeEl.textContent = data.outcoming;
            balanceEl.textContent = parseFloat(data.balance).toFixed(2);;
        })
        .catch(error => console.error('Errore:', error));
})
