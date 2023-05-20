const CLP = () => {
    // Купуване
    const n = parseInt(document.querySelector("#clp-n").value);
    const S = parseFloat(document.querySelector("#clp-S").value);
    const p = parseFloat(document.querySelector("#clp-p").value);
    const m = parseInt(document.querySelector("#clp-m").value);

    // Рента
    const rS = parseFloat(document.querySelector("#clp-rS").value);

    let purchaseExpenses = S;
    let rentExpenses = 0;
    for(let i = 0; i < n; i++) {
        // Покупка
        const cost = S;
        purchaseExpenses += (m <= i) ? (p*cost) / 100 : 0;

        // Рента
        rentExpenses += rS;
    }

    // Съобщение
	if (purchaseExpenses > rentExpenses) {
		alert(`При нужда от този продукт за ${n} години рентата е по - изгодна: ${rentExpenses} лв.`);
	} else {
		alert(`Покупката е по-изгодна: ${purchaseExpenses} лв.`);
	}
}