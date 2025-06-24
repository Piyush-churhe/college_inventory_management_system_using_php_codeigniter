<?php $this->load->view('backend/header'); ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Charts</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <canvas id="lineChart" width="50" height="25"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <canvas id="radarChart" width="50" height="25"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <canvas id="pieChart" width="50" height="25"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <canvas id="barChart" width="50" height="25"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

<?php $this->load->view('backend/footer'); ?>
    <script>
        var ctx = document.getElementById("lineChart").getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: 'People Arrived',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 255, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'People arrived',
                    data: [10, 9, 6, 9, 1, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("radarChart").getContext('2d');
        var radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Running', 'Swimming', 'Eating', 'Cycling'],
                datasets: [{
                    data: [20, 10, 4, 2]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("pieChart").getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [
                {
                  label: "Population (millions)",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                  data: [2478,5267,734,784,433]
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
              }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("barChart").getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ["1900", "1950", "1999", "2050"],
              datasets: [
                {
                  label: "Africa",
                  backgroundColor: "#3e95cd",
                  data: [133,221,783,2478]
                }, {
                  label: "Europe",
                  backgroundColor: "#8e5ea2",
                  data: [408,547,675,734]
                }
              ]
            },
            options: {
              title: {
                display: true,
                text: 'Population growth (millions)'
              }
            }
        });
    </script>