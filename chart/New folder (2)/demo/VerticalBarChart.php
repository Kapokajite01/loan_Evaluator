<?php


mysql_connect("localhost", "root","fidele") or die(mysql_error());
mysql_select_db("mudb_ims_db") or die(mysql_error());

$query = "SELECT * FROM chart WHERE label!='BURUNDI'AND label!='DRC' AND label!='TANZANIA' AND  label!='UGANDA' order by total_incidents DESC";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");

while ($row = mysql_fetch_array($result))
{
	$distr[] = $row['district_name'];
	$total[] = $row['total_incidents'];
	
}
$N = count($distr);
echo $N;
    
	include "../libchart/classes/libchart.php";

	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	for($i =0 ; $i<$N-1; $i++){
	$dataSet->addPoint(new Point($distr[$i],$total[$i]));
	}
	$chart->setDataSet($dataSet);

	$chart->setTitle("NUMBER OF INCIDENTS BY DISTRICTS");
	$chart->render("generated/demo1.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart vertical bars demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
   

<body>
	<img alt="Vertical bars chart" src="generated/demo1.png" style="border: 1px solid gray;"/>
</body>
</html>
