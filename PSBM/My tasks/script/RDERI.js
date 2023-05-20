
const addRepaymentPlansTableRow = (j,S,T,Z,A) => {
    const table = document.querySelector('.rderi-table .rderi-table-result');
    const row = document.createElement('div');
    row.classList.add('row', 'up-five');

    const col_year = document.createElement('div');
    col_year.classList.add('col');
    col_year.textContent = j;

    const col_remainder = document.createElement('div');
    col_remainder.classList.add('col');
    col_remainder.textContent = S;

    const col_payment = document.createElement('div');
    col_payment.classList.add('col');
    col_payment.textContent = T;

    const col_interest = document.createElement('div');
    col_interest.classList.add('col');
    col_interest.textContent = Z;

    const col_payment_real = document.createElement('div');
    col_payment_real.classList.add('col');
    col_payment_real.textContent = A;

    row.appendChild(col_year);
    row.appendChild(col_remainder);
    row.appendChild(col_payment);
    row.appendChild(col_interest);
    row.appendChild(col_payment_real);

    table.appendChild(row);
}

const clearRepaymentPlansTable = () => {
    const table = document.querySelector('.rderi-table .rderi-table-result');
    table.innerHTML = '';
}

const RDERI = () => {
    // Изчистване на таблицата
    clearRepaymentPlansTable();
    
    let S = parseFloat(document.querySelector("#RDERI_S").value);
    
    const t = parseFloat(document.querySelector("#RDERI_t").value);

    const i = parseFloat(document.querySelector("#RDERI_i").value);

    // Изчисляване на годините
    const T = S / t;

    let FinalPayment = 0;
    let FinalInterest = 0;
    let FinalYearlyPayments = 0;

    for (let j = 0; j < t; j++) {
        const Z = S*i;
        const A = T + S*i;
        FinalPayment += T;
        FinalInterest += Z;
        FinalYearlyPayments += A;
        addRepaymentPlansTableRow(
            j+1,S,T,Z,A
        );
        S-=T;
    } 
    addRepaymentPlansTableRow(
        '','-',FinalPayment,FinalInterest,FinalYearlyPayments
    ); 
}