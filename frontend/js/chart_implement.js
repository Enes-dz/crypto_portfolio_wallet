let myPortfolioChart;
function chart_load(){
    const canvasElement = document.getElementById('myPieChart');
    if (myPortfolioChart instanceof Chart) {
        myPortfolioChart.destroy();
    }
    
    const ctx = canvasElement.getContext('2d');

    myPortfolioChart =new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Bitcoin', 'Ethereum'],
            datasets: [{
                data: [75, 25], 
                backgroundColor: ['#FFAC1C', '#808080'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { 
                    display: false
                },
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 2000
            }
        }
    });
}
