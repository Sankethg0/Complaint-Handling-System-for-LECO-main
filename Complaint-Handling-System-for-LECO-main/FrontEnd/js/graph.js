google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Work',     11],
    ['Eat',      2],
    ['Commute',  2],
    ['Watch TV', 2],
    ['Sleep',    7]
  ]);

  var options = {
    title: 'chart'
  };

  var chart = new google.visualization.PieChart(document.getElementById('myAreaChart'));

  chart.draw(data, options);



  var chart = new google.visualization.BarChart(document.getElementById('myBarChart'));

  chart.draw(data, options);


}




