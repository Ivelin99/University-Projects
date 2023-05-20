const addRepaymentRow = () => {
    const table = document.querySelector('.spep-table-result');
    const row = document.createElement('div');
    row.classList.add('row');
    const col_id = document.createElement('div');
    col_id.classList.add('col-id');
    col_id.classList.add('col');
    col_id.textContent = table.querySelectorAll('.row').length + 1;
    const col_advance = document.createElement('div');
    col_advance.classList.add('col-advance');
    col_advance.classList.add('col');
    const col_advance_input = document.createElement('input');
    col_advance_input.setAttribute('type', 'text');
    col_advance_input.setAttribute('placeholder', 'Аванс');
    col_advance_input.value = 0;
    col_advance.appendChild(col_advance_input);
    const col_period = document.createElement('div');
    col_period.classList.add('col-period');
    col_period.classList.add('col');
    const col_period_input = document.createElement('input');
    col_period_input.setAttribute('type', 'text');
    col_period_input.setAttribute('placeholder', 'Период');
    col_period_input.value = 0;
    col_period.appendChild(col_period_input);
    row.appendChild(col_id);
    row.appendChild(col_advance);
    row.appendChild(col_period);
    table.appendChild(row);
}

const removeRepaymentRow = () => {
    const table = document.querySelector('.spep-table-result');
    if (table.querySelectorAll('.row').length > 1) {
        table.removeChild(table.lastChild);
    }

}

const setTableRows = () => {
	console.log("Показване на таблица!");
    const rows = document.querySelector('#SPEP_Number_Of_Payments').value;
    const table = document.querySelector('.spep-table-result');
    const currentRows = table.querySelectorAll('.row').length;
    if (rows > currentRows) {
        for (let i = 0; i < rows - currentRows; i++) {
            addRepaymentRow();
        }
    }
    if (rows < currentRows) {
        for (let i = 0; i < currentRows - rows; i++) {
            removeRepaymentRow();
        }
    }
}
setTableRows();

const SPEP = () => {
    const Z = parseFloat(document.querySelector('#SPEP_Price').value);
    const T = parseFloat(document.querySelector('#SPEP_Term_Delivery').value);
    const N = parseFloat(document.querySelector('#SPEP_Term_Credit').value);
    let g = parseFloat(document.querySelector('#SPEP_Interest_Rate_Output').value);
    let i = parseFloat(document.querySelector('#SPEP_Interest_Rate_Comparison').value);
    const number_of_payments = parseFloat(document.querySelector('#SPEP_Number_Of_Payments').value);
    const payment_advances_html = document.querySelectorAll('.spep-table-result .col-advance input');
    const payment_periods_html = document.querySelectorAll('.spep-table-result .col-period input');

    const Payment_Advances = [];
    const Payment_Periods = [];

    // задаване на периодите и авансите
	if (number_of_payments)
    for (let i = 0; i < number_of_payments; i++) {
        Payment_Advances.push(parseFloat(payment_advances_html[i].value));
        Payment_Periods.push(parseFloat(payment_periods_html[i].value));
        if(isNaN(Payment_Advances[i]) || isNaN(Payment_Periods[i])) {
            alert('Невалидни входни данни в таблицата!');
            return;
        }
    }

    if (isNaN(Z) || isNaN(T) || isNaN(N) || isNaN(g) || isNaN(i)) {
        alert('Невалидни входни данни във формата!');
        return;
    }

    g = g / 100;
    i = i / 100;

    let pom1 = 0;
    let pom2 = 0;

    let k1 = Math.pow(1 + g, N) * Math.pow(1 + i, -(N + T));

    for (let j = 0; j < number_of_payments; j++) {
        pom1 += Payment_Advances[j];
    }

    for (let j = 0; j < number_of_payments; j++) {
        pom2 += Payment_Advances[j] * Math.pow((1 + i), -Payment_Periods[j]);
    }
	
    let sum = pom2 + (Z - pom1) * k1;

    document.querySelector("#SPEP_Output").textContent = `${sum.toFixed(2)} лв.`;
}