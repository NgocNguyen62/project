
var chartDataElements = document.querySelectorAll('#chart-data');
var data=[]
chartDataElements.forEach(function (chart, index){
    var rawData = chart.getAttribute('data-data');
    var value = JSON.parse(rawData);

    data[index] = value;
})

// Function to update the width of the bars
function updateBarWidths() {
    var bars = document.querySelectorAll('.bar');
    var color = ['#04AA6D', '#2196F3', '#00bcd4', '#ff9800', '#f44336'];
    bars.forEach(function(bar, index) {
        // Adjust the width based on your data
        bar.style.width = data[index] + '%';
        bar.style.backgroundColor = color[index]
    });
}

// Call the function to update the bar widths
updateBarWidths();