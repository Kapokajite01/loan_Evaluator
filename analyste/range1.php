<?php
error_reporting(0);
if(isset($_POST["From"], $_POST["to"],$_POST["Status"]) )
{
	$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
	$result = '';
	$query = "SELECT Archive_report_id,report_id,district_name,neighbor_country,geodescription,incident_name,actorgoup_name,classification_name,subject,noattachments,dateincident,Status,dateentry,lname FROM report_archive,users WHERE `users`.`user_id`=`report_archive`.`user_id` AND `report_archive`.`Status`='".$_POST['Status']."' AND report_archive.dateincident BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table class="table table-bordered">
	<tr>
<th >No</th>
<th >District Name</th>
<th >Geo description</th>
<th >Incident Name</th>
<th>Actor Group</th>
<th>Classification</th>
<th >Subject</th>
<th>No Attachment</th>
<th>Date of incident</th>
<th>Date </th>
<th>Done By</th>
<th>Status</th>
<th>View</th>
</tr>';
	if(mysqli_num_rows($sql) > 0)
	{$I=0;

		while($row = mysqli_fetch_array($sql))
		{ $nid = $row['report_id'];
	$district = $row["district_name"];
if($row["district_name"]==''){
	$district = '<strong> Disrict in '.$row["neighbor_country"].'</strong>';
}
			$result .='
			<tr>
			<td>'.++$I.'</td>
			<td>'.$district.'</td>
			<td>'.$row["geodescription"].'</td>
			<td>'.$row["incident_name"].'</td>
			<td>'.$row["actorgoup_name"].'</td>
			<td>'.$row["classification_name"].'</td>
			<td>'.$row["subject"].'</td>
    <td><strong>['.$row["noattachments"].'] Attachment(s)</td>
			<td>'.$row["dateincident"].'</td>
			<td>'.$row["dateentry"].'</td>
			<td>'.$row["lname"].'</td>
			<td>'.$row["Status"].'</td>
			<td><a href="View_archive?id_number='.$row['Archive_report_id'].'&&Status='.$row['Status'].'"><strong>View</strong></td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Purchased Item Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}else{
	echo "error";
}
?>