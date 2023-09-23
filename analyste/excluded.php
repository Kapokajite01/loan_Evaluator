<?php
 error_reporting(0);
 require_once 'php_action/core.php';

 include_once('connect_db.php');
 if (isset($_POST['delete'])){
	$id=$_POST['selector'];
$N = count($id);
$t='You Excluded     '.$N.'   Incident(s)';
for($i=0; $i < $N; $i++)
{
	$j = $i+1;
$result = mysql_query("SELECT incident_name FROM incidents where incident_id='$id[$i]'");
while ($row = mysql_fetch_array($result)) {
$tincidens[] = $row[incident_name];	
}
echo $j.' '.$tincidens[$i].'<br>';
}
if ($N==0){
echo "<font color='red'> <script>alert('$t');</script></font>";
	
}
else{
echo "<script>alert('$t');</script>";
}
echo "<script>window.close();</script>";
 ?>
 <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
	}
</script>
<script type='text/javascript'>
         self.close();
    </script>
	<?php
	 
 }
?>
