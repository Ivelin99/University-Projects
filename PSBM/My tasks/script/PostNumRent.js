// Полета за въвеждане и извеждане на данни от HTML
const post_num_rent_n_input = document.querySelector("#PostNumRent_Time");
const post_num_rent_R_input = document.querySelector("#PostNumRent_Sum");
const post_num_rent_i_input = document.querySelector("#PostNumRent_YearPercent");
const post_num_rent_output = document.querySelector("#PostNumRent_Output");

// Задаване на Събития на полетата за въвеждане на данни
post_num_rent_n_input.addEventListener("change", () => {
    post_num_rent_output.textContent = calculatePostNumRent();
})
post_num_rent_R_input.addEventListener("change", () => {
    post_num_rent_output.textContent = calculatePostNumRent();
})
post_num_rent_i_input.addEventListener("change", () => {
    post_num_rent_output.textContent = calculatePostNumRent();
})

// Функция за изчисляване на формулата
function calculatePostNumRent() {
    // Превръщане на данните от String към Float
    const n = parseFloat(post_num_rent_n_input.value);
    const R = parseFloat(post_num_rent_R_input.value);
    const i = parseFloat(post_num_rent_i_input.value);

    // Проверка дали 'n' е въведен
    if( isNaN( n ) ) return 'Моля въведете n:';
    // Проверка дали 'R' е въведен
    if( isNaN( R ) ) return 'Моля въведете R:';
    // Проверка дали 'i' е въведен
    if( isNaN( i ) ) return 'Моля въведете i:';

    // Изчисляване по формулата
    const q = (i / 100) + 1;
    const sum = R * ((Math.pow(q, n) - 1) / (q - 1));

    // Връщане на резултата
    return `${sum.toFixed(2)} лв.`;
}