$(function () {
  $.ajax({
    url: "http://localhost/training-php/web/pages/chart/chart_data.php",
    type: "GET",
    success: function (data) {
      chartData = data;
      var chartProperties = {
        caption: "Count of Courses by Category",
        xAxisName: "Category Name",
        yAxisName: "Number of Courses",
        rotatevalues: "0",
        showPercentInTooltip: "0",
        tooltipBorderRadius: "10",
        decimals: "2",
        theme: "fusion",
      };

      apiChart = new FusionCharts({
        // type: "pie2d",
        type: "column2d",
        // type: "column3d",
        renderAt: "chart-container",
        width: "1000",
        height: "500",
        dataFormat: "json",
        dataSource: {
          chart: chartProperties,
          data: chartData,
        },
      });
      apiChart.render();
    },
  });
});
