<!DOCTYPE html>
<html>

<head>
<script src="js/zingchart.min.js"></script>
    <style>
    html,
    body,
    #myChart {
      width: 100%;
      height: 100%;
    }

}
  </style>


</head>

<body>

<?php
 session_start();
 error_reporting(0);
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
$graph ="SELECT fist_value FROM chart";
$sqlgradph = mysqli_query($conn, $graph);
while($rowgraph = mysqli_fetch_array($sqlgradph))
		{
		$aa[]=	$rowgraph['fist_value'];
		
		}

$graph1 ="SELECT  	second_value FROM chart";
$sqlgradph1 = mysqli_query($conn, $graph1);
while($rowgraph1 = mysqli_fetch_array($sqlgradph1))
		{
		$aa1[]=	$rowgraph1['second_value'];
		
		}
  ?>
  <div id='myChart'><center><table><tr><td bgcolor="#21accd">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $_SESSION['incident1'];?></td><td bgcolor="#cc0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $_SESSION['incident2'];?></td></tr></table></center></div>
  <div class="a">
  <script>
    var myConfig = {
      type: "bar",
      series: [{
        values: [<?php for($i = 0 ; $i < 30; $i++){
		echo $aa[$i];		
		};?>]
      }, {
        values: [<?php for($i1 = 0 ; $i1 < 30; $i1++){
		echo $aa1[$i1];		
		};?>]
      }]
    };

    zingchart.render({
      id: 'myChart',
      data: myConfig,
      height: "100%",
      width: "100%"
	  
    });
  </script></div><br><br><br>


</body>
</html>