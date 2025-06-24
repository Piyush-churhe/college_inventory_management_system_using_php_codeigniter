<?php $this->load->view('librarian/header'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>
<script>
    $(function() {
        localStorage.setItem('thisLink', 'dashboard');
        thisLink = localStorage.getItem('thisLink');
        if (thisLink) {
            $('#' + thisLink).addClass('active');
        }
    });
</script>
        <div class="wrapper-page">

            <div class="page-title">
                <h1><i class="icon-grid"></i>librarian Dashboard</h1>
            </div>
            <div class="flashmessage">Faka?</div>
            <div class="page-content">
                <div class="container-fluid">                   
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel bg-white br-1">
                                <div class="panel-body widget">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="pull-left">User</h5>
                                            <span class="pull-right"><i class="icon-user"></i></span>
                                            <div class="clearfix"></div>
                                            <h1>00<?php
                                                   $this->db->where('user_type','User');
        									       $this->db->from("users");
        									       echo $this->db->count_all_results();
            									?>
                                            </h1>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress">
                                              <div class="progress-bar red" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel bg-white br-1">
                                <div class="panel-body widget">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="pull-left">Admin</h5>
                                            <span class="pull-right"><i class="icon-people"></i></span>
                                            <div class="clearfix"></div>
                                            <h1>00<?php 
            									$this->db->where('user_type','Admin');
            									$this->db->from("users");
            									echo $this->db->count_all_results();
        									?>
                                            </h1>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress">
                                              <div class="progress-bar orange" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel bg-white br-1">
                                <div class="panel-body widget">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="pull-left">Product</h5>
                                            <span class="pull-right"><i class="icon-bag"></i></span>
                                            <div class="clearfix"></div>
                                            <h1>00<?php
                                                echo $this->db->count_all_results('product');
                                                ?>
                                            </h1>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="progress">
                                              <div class="progress-bar grey" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                    </div>            
                  
                </div>
            </div><!-- /.page-content  -->
        </div>
<script>
  $("body").on("click", ".to-do", function(){
        var clickedItem = $(this);
        var clickedVal = clickedItem.attr('data-value');
        $.ajax({
          url: "updateTododata",
          type:"POST",
          data:
          {
          'toid': $(this).attr('data-id'),         
          'tovalue': $(this).attr('data-value'),
          },
          success: function(response) {
              var response = JSON.parse(response);
              if(response.status == 'error') {

                $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);

                } else if(response.status == 'success'){
                    console.log(response);

                    if(response.value == 1) {
                        clickedItem.attr('data-value', 0);
                    } else if(response.value == 0) {
                        clickedItem.attr('data-value', 1);
                    }

                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);

                }
          },
          error: function(response) {
            console.error();
          }
      });
  });			
</script>         
	<script>
  $("#add_todo").on("submit", function(event){
      event.preventDefault();
	  //console.log( $( this ).serialize() );
      $.ajax({
            url: "addTodoData",
            type:"POST",
            data:$( this ).serialize(),
            dataType: "html",
            success: function(response) {
                var response = JSON.parse(response);
                if(response.status == 'error') {

                $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);

                } else if(response.status == 'success'){

                    $(".flashmessage").fadeIn('fast').delay(3000).fadeOut('fast').html(response.message);
                    
                    $(".todo-list").prepend(response.todoHtml);
                }              
            },
            error: function(response) {
            console.error();
            }
        });
    });			
</script>
<script>
    if (document.getElementById("myChart")) {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August"],
                datasets: [{
                    label: ' Sales Progress',
                    data: [11, 23, 28, 39, 23, 30, 12, 43],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        '#fff',
                        '#fff',
                        '#fff',
                        '#fff',
                        '#fff',
                        '#fff',
                        '#fff',
                        '#fff'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            stepSize: 10,
                            fontColor: "#ececec",
                            fontSize: 14
                        },
                        gridLines: {
                            color: "#fff",
                            lineWidth: 1,
                            zeroLineColor: "#fff",
                            zeroLineWidth: 1
                        },
                        stacked: true
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: "#646464",
                            fontSize: 14
                        },
                        gridLines: {
                            color: "#fff",
                            lineWidth: 2
                        }
                    }]
                },
                responsive: true,
                chartArea: {
                    backgroundColor: '#fff'
                },
                legend: {
                    display: false
                }
            }
        });
    }
</script>

<script>
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill',
            backgroundColor: 'transparent',
            strokeWidth: 1,
            zoomOnScroll: false,
            regionStyle: {
                initial: {
                    fill: '#fff',
                    "fill-opacity": 1,
                    stroke: 'rgba(153, 102, 255, 0.5)',
                    "stroke-width": 1,
                    "stroke-opacity": .4
                },
                hover: {
                    fill: 'rgba(153, 102, 255, 0.5)',
                    "fill-opacity": 0.8,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#fff',
                    stroke: 'red',
                    'fill-opacity': 1,
                    'stroke-width': 8,
                    'stroke-opacity': 0.3,
                    'cursor': 'pointer',
                    r: 5
                },
                hover: {
                    r: 8,
                    stroke: 'info',
                    'stroke-width': 10
                }
            },
            series: {
                regions: [{
                    values: {
                        "CA": 'rgba(54, 162, 235, 0.5)',
                        "US": 'rgba(75, 192, 192, 0.5)',
                        "RU": 'rgba(153, 102, 255, 0.5)',
                        "GB": 'rgba(255, 99, 132, 0.5)',
                        "ES": 'rgba(54, 162, 235, 0.5)',
                        "FR": 'rgba(153, 102, 255, 0.5)',
                        "DE": 'rgba(255, 99, 132, 0.5)',
                    },
                    attribute: 'fill'
                }]
            }
        });
    });
</script>
<?php $this->load->view('librarian/footer'); ?>


