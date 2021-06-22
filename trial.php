<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS - www.malasngoding.com</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<center>
		<h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS<br/>- www.malasngoding.com -</h2>
	</center>
 
 
	<?php 
	include 'data-index.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>            
            
            <canvas id="myChart"></canvas>
                    <script>
                      var ctx = document.getElementById("myChart").getContext('2d');
                      var myChart = new Chart(ctx,{
                        type: 'pie',
                        data: {
                          labels: ["Belum diverifikasi", "Diverifikasi", "Kuliah tatap muka"],
                          datasets: [{
                            label: '',
                            data:[
                                <?php
                                echo $tampil_jmlbaris;
                              ?>,
                              <?php
                                echo $tampil_jmldiver;
                              ?>,
                              <?php
                                echo $tampil_jmlkul;
                              ?>
                            ],
                            backgroundColor: [
                              'rgba(225,99,132,0.2)',
                              'rgba(54,162, 235,0.2)',
                              'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                              'rgba(255,99,132,1)',
                              'rgba(54,162,235,1)',
                              'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                          }]
                        },
                        options: {
                          scales: {
                            yAxes: [{
                              ticks: {
                                beginAtZero:true
                              }
                            }]
                          }
                        }
                      })
                </script>
    </body>
</html>