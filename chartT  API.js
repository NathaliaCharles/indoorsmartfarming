var chartT = new Highcharts.Chart ({
    chart: { renderTo : 'chart-temperature'},
    title: { text: 'Temperature Level' },
    series: [{
        showInLegend: false,
        data: value2
    }],
    plotOptions: {
        line: { animation: false,
        dataLabels: { enabled: true }
         },
        series: { color: '#059e8a' }
    },
    xAxis: { 
        type: 'datetime',
        categories: reading_time
    },
    yAxis: {
        title: { text: 'Temperature (degree celsius) '}
    },
    credits: {enabled: false }
});