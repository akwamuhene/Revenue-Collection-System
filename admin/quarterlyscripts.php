<script type="text/javascript">
var ctxnine = document.getElementById("chartjs_bar1").getContext('2d');
        var myChart = new Chart(ctxnine, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($janmartolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($janmaramount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
                scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
        }
        });
</script>

<script type="text/javascript">
var ctxnine = document.getElementById("chartjs_bar2").getContext('2d');
        var myChart = new Chart(ctxnine, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($aprjuntolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($aprjunamount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
                scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
        }
        });
</script>

<script type="text/javascript">
var ctxnine = document.getElementById("chartjs_bar3").getContext('2d');
        var myChart = new Chart(ctxnine, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($julseptolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($julsepamount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
                scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
        }
        });
</script>

<script type="text/javascript">
var ctxnine = document.getElementById("chartjs_bar4").getContext('2d');
        var myChart = new Chart(ctxnine, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($octdectolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($octdecamount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
                scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
        }
        });
</script>

<script type="text/javascript">
var ctx = document.getElementById("chartjs_pieqi");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($qiarea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($qiaramount+$qiramount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>

<script type="text/javascript">
var ctx = document.getElementById("chartjs_pieqii");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($qiiarea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($qiiaramount+$qiiramount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>

<script type="text/javascript">
var ctx = document.getElementById("chartjs_pieqiii");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($qiiiarea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($qiiiaramount+$qiiiramount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>

<script type="text/javascript">
var ctx = document.getElementById("chartjs_pieqiv");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($qivarea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($qiiiaramount+$qivramount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>

<script type="text/javascript">
var ctx = document.getElementById("chartjs_pie1");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($farea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($faramount+$framount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>
<script type="text/javascript">
var ctx = document.getElementById("chartjs_pie2");
var myChart = new Chart(ctx, {
    type: 'pie',
   data:{
   labels: <?php echo json_encode($sarea); ?>,
        datasets: [{
            label: 'Rates',
            data: <?php echo json_encode($saramount+$sramount); ?>,
            backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ]
        }]
},
    options: {
        scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
    }
});
</script>
<script type="text/javascript">
var ctxseven = document.getElementById("chartjs_pie3").getContext('2d');
        var myChart = new Chart(ctxseven, {
            type: 'pie',
            data: {
                labels:<?php echo json_encode($tarea); ?>,
                datasets: [{
                    backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ],
                    data:<?php echo json_encode($taramount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
        });
</script>
<script type="text/javascript">
var ctxeight = document.getElementById("chartjs_pie4").getContext('2d');
        var myChart = new Chart(ctxeight, {
            type: 'pie',
            data: {
                labels:<?php echo json_encode($foarea); ?>,
                datasets: [{
                    backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ],
                    data:<?php echo json_encode($foaramount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
        });
</script>


<script type="text/javascript">
var ctxnine = document.getElementById("midyear_bar1").getContext('2d');
        var myChart = new Chart(ctxnine, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($fmytolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($fmyamount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
                scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }
        }
        });
</script>
<script type="text/javascript">
var ctxten = document.getElementById("midyear_bar2").getContext('2d');
        var myChart = new Chart(ctxten, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($smytolltype); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)',
                       'rgba(255, 99, 132, 1)'
                    ],
                    data:<?php echo json_encode($smyamount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
            scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }

        }
        });
</script>

<script type="text/javascript">
var ctxten = document.getElementById("midyear_bar3").getContext('2d');
        var myChart = new Chart(ctxten, {
            type: 'bar',
            data: {
                labels:<?php echo json_encode($frate); ?>,
                datasets: [{
                    backgroundColor: [
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)',
                       'rgba(54, 162, 235, 1)'
                    ],
                    data:<?php echo json_encode($framount); ?>,
                }]
            },
            options: {
                   legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },
            scales: {
            
            yAxes: [{
            ticks: {
            
                   min: 0,
                   max: 100,
                   callback: function(value){return value+ "%"}
                },  
								scaleLabel: {
                   display: true,
                   labelString: "Percentage"
                }
            }]
        }

        }
        });
</script>