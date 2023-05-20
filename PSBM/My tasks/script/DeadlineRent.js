// Полета за въвеждане и извеждане на данни от HTML
const deadline_rent_Sn_input = document.querySelector("#DeadlineRent_Dur");
const deadline_rent_R_input = document.querySelector("#DeadlineRent_Sum");
const deadline_rent_i_input = document.querySelector("#DeadlineRent_Interest");
const deadline_rent_output = document.querySelector("#DeadlineRent_Output");

// Задаване на Събития на полетата за въвеждане на данни
deadline_rent_Sn_input.addEventListener("change", () => {
    deadline_rent_output.textContent = calculateDeadlineRent();
})
deadline_rent_R_input.addEventListener("change", () => {
    deadline_rent_output.textContent = calculateDeadlineRent();
})
deadline_rent_i_input.addEventListener("change", () => {
    deadline_rent_output.textContent = calculateDeadlineRent();
})

// Функция за изчисляване на формулата
function calculateDeadlineRent() {
    // Превръщане на данните от String към Float
    const Sn = parseFloat(deadline_rent_Sn_input.value);
    const R = parseFloat(deadline_rent_R_input.value);
    const i = parseFloat(deadline_rent_i_input.value);

    // Проверка дали N е въведен
    if( isNaN( Sn ) ) return 'Моля въведете Sn:';
    // Проверка дали R е въведен
    if( isNaN( R ) ) return'Моля въведете R:';
    // Проверка дали i е въведен
    if( isNaN( i ) ) return'Моля въведете i:';

    // Изчисляване по формулата
    const q = (i / 100) + 1;
    const sum = (Math.log10(((Sn / R) * (q - 1)) + 1)) / Math.log10(q);

    // Връщане на резултата
    return `${parseInt(sum)} години.`;
}