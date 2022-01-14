// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Tenda Dome", "Tas Punggung", "Pakaian Hangat", "Peralatan Masak", "Perlengkapan Trecking", "Accesories"],
    datasets: [{
      data: [2, 2, 2, 1, 1, 1],
      backgroundColor: ['#0275d8', '#d9e2ef', '#42ba96', '#df4759', '#ffc107', '#292b2c'],
      hoverBackgroundColor: ['#0275d8', '#d9e2ef', '#42ba96', '#df4759', '#ffc107', '#292b2c'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
