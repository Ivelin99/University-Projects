// Полета за въвеждане и извеждане на данни от HTML
const pre_num_rent_n_input = document.querySelector("#PreNumRent_Time");
const pre_num_rent_R_input = document.querySelector("#PreNumRent_Sum");
const pre_num_rent_i_input = document.querySelector("#PreNumRent_YearPercent");
const pre_num_rent_output = document.querySelector("#PreNumRent_Output");

// Задаване на Събития на полетата за въвеждане на данни
pre_num_rent_n_input.addEventListener("change", () => {
    pre_num_rent_output.textContent = calculatePreNumRent();
})
pre_num_rent_R_input.addEventListener("change", () => {
    pre_num_rent_output.textContent = calculatePreNumRent();
})
pre_num_rent_i_input.addEventListener("change", () => {
    pre_num_rent_output.textContent = calculatePreNumRent();
})

// Функция за изчисляване на формулата
function calculatePreNumRent() {
    // Превръщане на данните от String към Float
    const n = parseFloat(pre_num_rent_n_input.value);
    const R = parseFloat(pre_num_rent_R_input.value);
    const i = parseFloat(pre_num_rent_i_input.value);

    // Проверка дали 'n' е въведен
    if( isNaN( n ) ) return 'Моля въведете n:';
    // Проверка дали 'R' е въведен
    if( isNaN( R ) ) return 'Моля въведете R:';
    // Проверка дали 'i' е въведен
    if( isNaN( i ) ) return 'Моля въведете i:';

    // Изчисляване по формулата
    const q = (i / 100) + 1;
    const sum = R * q * ((Math.pow(q, n) - 1) / (q - 1));

    // Връщане на резултата
    return `${sum.toFixed(2)} лв.`;
}