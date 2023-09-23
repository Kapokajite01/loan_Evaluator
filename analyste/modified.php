<?php require_once 'includes/header.php'; ?>


<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	
	<div class="col-md-4">
		
		<!--/panel-->
		<div class="card">

<link rel="stylesheet" href="newcss/bootstrap.min.css"/>
<link rel="stylesheet" href="newcss/jquery-ui.css"/> 
<link rel="stylesheet" href="newcss/jquery-ui.css"/>

<?php
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
$query = "SELECT Archive_report_id,report_id,district_name,neighbor_country,geodescription,incident_name,actorgoup_name,classification_name,subject,noattachments,dateincident,Status,dateentry,lname FROM report_archive,users WHERE `users`.`user_id`=`report_archive`.`user_id` ORDER BY Archive_report_id desc";
$sql = mysqli_query($conn, $query);
?>
<br><br><br><br><br><br><br><br><br>
<div class="cardHeader" style="background-color: #fafffc; ">
	<select type="text" name="Status" id="Status" class="form-control" placeholder="">
	<option>Selecte status</option>
	<option>Archive_Deleted</option>
	<option>Archive_Edited</option>
	</select>
	</div>
		  <div class="cardHeader" style="background-color: #fafffc; ">
	<input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
	</div>

		  <div class="cardHeader" style="background-color: #fafffc; ">

<input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
		  </div>

		  <div class="cardHeader" style="background-color: #fafffc; ">
<input type="button" name="range" id="range" value="Retreive" class="btn btn-success"/>
</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div></div>
		<div class="col-md-8">
<div id="purchase_order">
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
<th>date Of incident</th>
<th>Date </th>
<th>Done By</th>
<th>Status</th>
<th>View</th>
</tr>
<?php
$I=0;
while($row= mysqli_fetch_array($sql))
{
$district = $row["district_name"];
if($row["district_name"]==''){
	$district = '<strong> Disrict in'.$row["neighbor_country"].'</strong>';
}
	?>
    <tr>
    <td><?php echo ++$I; ?></td>
    <td><?php echo $district; ?></td>
    <td><?php echo $row["geodescription"]; ?></td>
    <td><?php echo $row["incident_name"]; ?></td>
    <td><?php echo $row["actorgoup_name"]; ?></td>
    <td><?php echo $row["classification_name"]; ?></td>
    <td><?php echo $row["subject"]; ?></td>
    <td><strong>[<?php echo $row["noattachments"]; ?>] Attachment(s)</td>
		<td><?php echo $row["dateincident"]; ?></td>
		<td><?php echo $row["dateentry"]; ?></td>
		<td><?php echo $row["lname"]; ?></td>
		<td><?php echo $row["Status"]; ?></td>
    <td><a href="View_archive?id_number=<?php echo $row['Archive_report_id'];?>&&Status=<?php echo $row['Status'];?>"> <strong>View</strong></a></td>
    </tr>
    <?php
}
?>
</table>
</div>
</div>
<script src="newjs/jquery.min.js"></script>
<script src="newjs/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
	
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var Status=$("#Status").val();
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '' && Status !='Selecte status')
		{
			$.ajax({
				url:"range1.php",
				method:"POST",
				data:{From:From, to:to, Status:Status},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the needed data");
		}
	});
});
</script>
</body>
</html>