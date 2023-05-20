const clearAmortTable = () => {
    const table = document.querySelector('.dac-table .dac-table-result');
    const rows = table.querySelectorAll('.row');
    for (let i = 0; i < rows.length; i++) {
        table.removeChild(rows[i]);
    }
}

const addAmortizationTableRow = (n, Rn, Dn) => {
    const table = document.querySelector('.dac-table .dac-table-result');
    const row = document.createElement('div');
    row.classList.add('row');

    const col_id = document.createElement('div');
    col_id.classList.add('col-id');
    col_id.classList.add('col');
    col_id.textContent = n;

    const col_advance = document.createElement('div');
    col_advance.classList.add('col-advance');
    col_advance.classList.add('col');

    const col_advance_input = document.createElement('input');
    col_advance_input.setAttribute('type', 'text');
    col_advance_input.setAttribute('readonly', 'readonly');
    col_advance_input.value = Rn + ' лв.';
    col_advance.appendChild(col_advance_input);

    const col_period = document.createElement('div');
    col_period.classList.add('col-period');
    col_period.classList.add('col');

    const col_period_input = document.createElement('input');
    col_period_input.setAttribute('type', 'text');
    col_period_input.value = Dn + ' лв.';
    col_period_input.setAttribute('readonly', 'readonly');

    col_period.appendChild(col_period_input);

    row.appendChild(col_id);
    row.appendChild(col_advance);
    row.appendChild(col_period);

    table.appendChild(row);
}


const DAC = () => {
    let A, S, p, t, Rn, Dn, i;
    let rn_negative = false;
    let rn_negative_payment = 0;

    // Стойност на създаване на актива
    // Max: 1000000000
    // Min: 0
    A = parseFloat(document.querySelector('#DAC_A').value);
	// Брой години
    // Max: 100
    // Min: 0
    t = parseFloat(document.querySelector('#DAC_t').value);
    // Постоянната процентна ставка
    // Max: 100
    // Min: 0
    p = parseFloat(document.querySelector('#DAC_p').value);
	// Сума
    S = parseFloat(document.querySelector('#DAC_S').value);

    // Ако p не е число
    if (isNaN(p)) {
        if (isNaN(S)) {
            console.log('No S');
        }
        else {
            // Прави се валидация дали S е между 0 и A
            (S >= 0 && S <= A) ? S = S : S = 0;
            document.querySelector('#DAC_S').value = S;
            alert('Невалидна стойност за S! (0 <= S <= A)');

            // Изчисляване на p
            p = (((A - S) / t) / A) * 100;

            // Задаване на 'p' да е '?', ако не се напише нищо в полето
            document.querySelector('#DAC_p').value = '?';

            // Показване на резултата при стойността 'p'
            document.querySelector('#DAC_Output').textContent = `p = ${p.toFixed(2)}%`;
        }
    }
    else {
        S = A - t * (A * (p / 100));
        // Задаване на 'S' да е '?', ако не се напише нищо в полето
        document.querySelector('#DAC_S').value = '?';

        // Показване на резултата при стойността 'S'
        document.querySelector('#DAC_Output').textContent = `S = ${S.toFixed(2)} лв.`;
    }

    i = p / 100;

    Dn = A * i;
    // Изчистване на таблицата
    clearAmortTable();

    let RnArr = [];
    let DnArr = [];
    for (let j = 1; j < t + 1; j++) {
        Rn = A * (1 - j * i);
        if (Rn < -1E-10) {
            rn_negative = true;
            rn_negative_payment = j;
            break;
        }

        // Закръглени числа Rn и Dn
        addAmortizationTableRow(j, Rn.toFixed(2), Dn.toFixed(2));
        console.log(`n: ${j}, Rn: ${Rn}, Dn: ${Dn.toFixed(2)}, A: ${A}`);
        RnArr.push({year: j, money: Rn });
        DnArr.push({year: j, money: Dn });
    }
    document.querySelector('#my_diagram').innerHTML = '';
    document.querySelector('#my_diagram').classList.remove('warning');
    document.querySelector('#my_diagram').removeAttribute('data-warning');
    amorttization_diagram(t, RnArr, DnArr);
}

const amorttization_diagram = (t, RnArr, DrArr) => {

    const margin = { top: 35, right: 30, bottom: 30, left: 50 },
        width = 400 - margin.left - margin.right,
        height = 400 - margin.top - margin.bottom;

    const svg = d3.select("#my_diagram")
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");

    const allGroup = ["Rn", "Dn"];
    const maxRn = Math.max(...RnArr.map(o => o.money));
    const maxDn = Math.max(...DrArr.map(o => o.money));
    let max_x = t * 1.1;
    let max_y = (maxRn > maxDn ? maxRn : maxDn) * 1.1;

    const dataReady = [
        {
            name: "Rn",
            values: RnArr
        }
        ,
        {
            name: "Dn",
            values: DrArr
        }
    ]

    console.log(dataReady)

    // Избор на цветове в диаграмата
    var myColor = d3.scaleOrdinal()
        .domain(allGroup)
        .range(d3.schemeSet3);

    // Добавяне на оста x
    var x = d3.scaleLinear()
        .domain([0, max_x])
        .range([0, width]);
    svg.append("g")
        .attr("transform", "translate(0," + height + ")")
        .call(d3.axisBottom(x));

    // Добавяне на оста y
    var y = d3.scaleLinear()
        .domain([0, max_y])
        .range([height, 0]);
    svg.append("g")
        .call(d3.axisLeft(y));

    // Добавяне на линиите
    var line = d3.line()
        .x(function (d) { 
            return x(+d.year) })
        .y(function (d) { 
            return y(+d.money) 
        })
    svg.selectAll("myLines")
        .data(dataReady)
        .enter()
        .append("path")
        .attr("class", function (d) { 
            return d.name 
        })
        .attr("d", function (d) { 
            return line(d.values) 
        })
        .attr("stroke", function (d) { 
            return myColor(d.name) 
        })
        .style("stroke-width", 4)
        .style("fill", "none")

    // Създаване на точките
    svg
        .selectAll("myDots")
        .data(dataReady)
        .enter()
        .append('g')
        .style("fill", function (d) { return myColor(d.name) })
        .attr("class", function (d) { return d.name })
        .selectAll("myPoints")
        .data(function (d) { return d.values })
        .enter()
        .append("circle")
        .attr("cx", function (d) { return x(d.year) })
        .attr("cy", function (d) { return y(d.money) })
        .attr("r", 5)
        .attr("stroke", "gray")
        .style("cursor", "pointer")
        .on("mouseover", function (d) {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("r", 8)
                .attr("stroke", "white")
            svg
                .append("text")
                .attr("class", "tooltip-year")
                .attr('x', 240)
                .attr('y', -20)
                .text(`Година: ${parseInt(d.year)}`)
                .style("fill", "black")
                .style("font-size", 15)
            svg
                .append("text")
                .attr("class", "tooltip-money")
                .attr('x', 240)
                .attr('y', 0)
                .text(`Сума: ${d.money.toFixed(2)}`)
                .style("fill", "black")
                .style("font-size", 15)
        })
        .on("mouseleave", function (d) {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("r", 5)
                .attr("stroke", "gray")
            d3.selectAll(".tooltip-year").remove()
            d3.selectAll(".tooltip-money").remove()
        })  
    svg
        .selectAll("myLegend")
        .data(dataReady)
        .enter()
        .append('g')
        .append("text")
        .attr('x', function (d, i) { return 30 + i * 60 })
        .attr('y', 0)
        .text(function (d) { return d.name; })
        .style("fill", function (d) { return myColor(d.name) })
        .style("font-size", 15)
        .style("cursor", "pointer")
        .on("click", function (d) {
            currentOpacity = d3.selectAll("." + d.name).style("opacity")
            d3.selectAll("." + d.name).transition().style("opacity", currentOpacity == 1 ? 0 : 1)
        })
}