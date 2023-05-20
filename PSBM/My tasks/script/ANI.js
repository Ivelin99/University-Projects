// Бутони за таблицата
const AniAddRowButton = document.querySelector("#AniAddRowButton");
const AniAddColButton = document.querySelector("#AniAddColButton");
const AniClearTableButton = document.querySelector("#AniClearTableButton");
const AniExampleButton = document.querySelector("#AniExampleButton");

AniAddRowButton.addEventListener("click", () => {
    AniAddRow();
})
AniAddColButton.addEventListener("click", () => {
    AniAddCol();
})
AniClearTableButton.addEventListener("click", () => {
    AniClearTable();
	AniCalculateTable();
})
AniExampleButton.addEventListener("click", () => {
    AniClearTable();
    initTests();
})

// Функция която добавя ред в таблицата
function AniAddRow() {
    // Създаване на структурата на таблицата
    const container = document.querySelector(".ani-table");

    // Вземане на броя на колоните за периодите в таблицата
    const cols_index = document.querySelectorAll(".ani-table .period").length;

    // Задаване брой на редовете в таблицата
    let cols = '';
    for(let i = 0; i < cols_index; i++) {
        cols += `<div class="col"><input onchange="AniCalculateTable()" type="number" placeholder="Сума" value=""></div>`
    }

    const rand_id = `${Math.floor(Math.random() * 10)}${Math.floor(Math.random() * 10)}${Math.floor(Math.random() * 10)}${Math.floor(Math.random() * 10)}`;

    // Създаване на компонента за добавяне на ред в таблицата
    const row = document.createElement('div');
    row.innerHTML = `
	<div class="row">
		<div class="col">
            <input onchange="AniCalculateTable()" type="text" placeholder="Име" value="И-${rand_id}">
        </div>
		<div class="col">
            <input onchange="AniCalculateTable()" class="rate" type="text" placeholder="Ставка" value="${Math.floor(Math.random() * 30) + 4}">
        </div>
		<div class="col investment negative">
            <input onchange="AniCalculateTable()" type="number" placeholder="Сума" value="">
        </div>
        ${cols}
	</div>
    `;

    // Добавяне на ред в таблицата
    container.appendChild(row);

    const investment_inputs = document.querySelectorAll(`.investment input[type='number']`);
    const investment = investment_inputs[investment_inputs.length - 1]
    investment.addEventListener("change", () => {
        let val = -Math.abs(investment.value);
        investment.value = val;
    });
}

// Функция която добавя колона в таблицата
function AniAddCol() {
    // Вземане на броя на колоните на периодите
    const cols_index = document.querySelectorAll(".ani-table .period").length;

    // Вземане на всички редове
    const containers = document.querySelectorAll(".ani-table .row");

    // Вземане на броя на редовете в таблицата
    const len = containers.length;

    // Обхождане на всички редове
    for(let i = 0; i < len; i++) {
        const box = document.createElement('div');
        if(i == 0) {
            box.classList.add('head', 'period');
            box.innerHTML = `
                <p>Период ${cols_index + 1}</p>
            `;
            box.setAttribute('data-col', cols_index + 1);
        }
        else{
            box.innerHTML = `
            <input onchange="AniCalculateTable()" type="number" placeholder="Сума" value="">
            `;
        }
        containers[i].appendChild(box);
        box.classList.add('col');
    }
}

// Функция за изчистване на таблицата
function AniClearTable() {
    const container = document.querySelector(".ani-table");
    container.innerHTML = `
    <div class="row">
        <div class="col head"></div>
        <div class="col head">Ставка</div>
        <div class="col head">Първоначална инвестиция</div>
    </div>`;
}

// Функция за изчисляване на таблицата
function AniCalculateTable() {
    setTimeout(() => {
        // Вземане на всички редове
        const containers = document.querySelectorAll(".ani-table .row");

        // Изчистване на резултатите
        const result_container = document.querySelector(".ani-table-result");
        result_container.innerHTML = `
        <div class="row">
            <div class="col head">Инвестиция</div>
            <div class="col head">ЧПД</div>
        </div>
        `;
        // Брой редове
        const len = containers.length;
    
        const ALL_NPV_Arr = [];
    
        // Обхождане на всички редове
        for(let j = 1; j < len; j++) {
            let Ct  = undefined;
            let i   = parseFloat(containers[j].querySelector(".rate").value);
            let t   = document.querySelectorAll(".period").length;
            let C0  = parseFloat(containers[j].querySelector(".investment input[type='number']").value);
            if(isNaN(C0)) {
                continue;
            }
            
            i = i/100;
            
            let NPV_Arr = [C0];
            let NPV = C0;
            for(let T = 1; T <= t; T++) {
                Ct = parseFloat(containers[j].querySelector(`.col:nth-child(${3 + T}) input[type="number"]`).value);
                if(isNaN(Ct)) continue;
                NPV += parseFloat(Ct / Math.pow(parseFloat(1 + i), T) );
                NPV_Arr.push(NPV);
            }

            const investment_name = document.querySelector(`div.ani-table > div:nth-child(${1+j}) > div > div:nth-child(1) > input[type=text]`).value;
            ALL_NPV_Arr.push({
                name: investment_name,
                arr: NPV_Arr
            });
            AniAddRowToResult(
                investment_name,
                NPV_Arr[NPV_Arr.length - 1].toFixed(2)
            );
        }
    }, 500)
}

// Добавяне на колона в таблица с резултати
function AniAddRowToResult(name, val) {
    console.log(`Инвестиция: ${name} има ЧПД: ${val}`);
    // Добавяне на резултата в таблицата
    const container = document.querySelector(".ani-table-result");

    const row = document.createElement('div');
    row.innerHTML = `
	<div class="row">
		<div class="col" style="justify-content: flex-start; text-align: center;">
            ${name}
        </div>
		<div class="col" style="justify-content: flex-end;">
            ${val} лв.
        </div>
	</div>
    `;

    // Използване на компонента за редовете
    container.appendChild(row);
}

const loadTests = () => {
    // Ставка А
    document.querySelector("div:nth-child(2) > div > div:nth-child(2) > input")
    .value = 10;
    // Ставка Б
    document.querySelector("#AdjustedNetIncome > div.ani-table > div:nth-child(3) > div > div:nth-child(2) > input")
    .value = 8;
    // Ставка В
    document.querySelector("div:nth-child(4) > div > div:nth-child(2) > input")
    .value = 13;

    // Инвестиция А
    document.querySelector("div:nth-child(2) > div > div.col.investment.negative > input[type=number]")
    .value = -5000;
    // Инвестиция Б
    document.querySelector("div:nth-child(3) > div > div.col.investment.negative > input[type=number]")
    .value = -45000;
    // Инвестиция В
    document.querySelector("div:nth-child(4) > div > div.col.investment.negative > input[type=number]")
    .value = -50000;

    // Период 1 А
    document.querySelector("div:nth-child(2) > div > div:nth-child(4) > input[type=number]")
    .value = 5600;
    // Период 2 А
    document.querySelector("div:nth-child(2) > div > div:nth-child(5) > input[type=number]")
    .value = '';
    // Период 3 А
    document.querySelector("div:nth-child(2) > div > div:nth-child(6) > input[type=number]")
    .value = '';

    // Период 1 Б
    document.querySelector("div:nth-child(3) > div > div:nth-child(4) > input[type=number]")
    .value = 30000;
    // Период 2 Б
    document.querySelector("div:nth-child(3) > div > div:nth-child(5) > input[type=number]")
    .value = 30000;
    // Период 3 Б
    document.querySelector("div:nth-child(3) > div > div:nth-child(6) > input[type=number]")
    .value = '';

    // Период 1 В
    document.querySelector("div:nth-child(4) > div > div:nth-child(4) > input[type=number]")
    .value = 13000;
    // Период 2 В
    document.querySelector("div:nth-child(4) > div > div:nth-child(5) > input[type=number]")
    .value = 26000;
    // Период 3 В
    document.querySelector("div:nth-child(4) > div > div:nth-child(6) > input[type=number]")
    .value = 23000;
}
const initTests = () => {

    AniAddRow();
    AniAddRow();
    AniAddRow();

    AniAddCol();
    AniAddCol();
    AniAddCol();
    
    loadTests();

    AniCalculateTable();
}

initTests();