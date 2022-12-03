let ctx = document.getElementById('myChart');
let myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Corte","Medición","Unión","Golpe", "Sujecion","Mecanico"],
        datasets: [{
            label: 'Cantidad de repuestos',
            data: [9, 7, 9, 5, 16, 4],
            backgroundColor: ['#FFE800'],
        }],
    },
});