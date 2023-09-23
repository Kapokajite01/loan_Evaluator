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
<script language="JavaScript" type="text/javascript">
	function checkDelete(){
			return confirm('Are you sure you want to delete this report?');
	}
	</script>
<?php
$conn = mysqli_connect("localhost", "root", "fidele", "mudb_ims_db");
$query = "SELECT report_id,district_name,neighbor_country,geodescription,incident_name,actorgoup_name,classification_name,subject,noattachments,dateincident,Status FROM reports ORDER BY report_id desc";
$sql = mysqli_query($conn, $query);
?>
<br><br><br><br><br><br><br><br><br>
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
<th>Date of incident</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php
$I=0;
$color="#00cec9";
while($row= mysqli_fetch_array($sql))
{
$district = $row["district_name"];
if($row["district_name"]==''){
	$district = '<strong> Disrict in'.$row["neighbor_country"].'</strong>';
}
else if(!$row["Status"]=="Edited")
{$color="";}

	?>
    <tr bgcolor="<?php echo $color;?>">
    <td><?php echo ++$I; ?></td>
    <td><?php echo $district; ?></td>
    <td><?php echo $row["geodescription"]; ?></td>
    <td><?php echo $row["incident_name"]; ?></td>
    <td><?php echo $row["actorgoup_name"]; ?></td>
    <td><?php echo $row["classification_name"]; ?></td>
    <td><?php echo $row["subject"]; ?></td>
    <td><strong>[<?php echo $row["noattachments"]; ?>] Attachment(s)</td>
    <td><?php echo $row["dateincident"]; ?></td>
	<td><?php echo $row["Status"]; ?></td>
    <td><a href="edit_report?id_number=<?php echo $row['report_id'];?>"> <strong>View</strong></a></td>
	<td><a href="delete?id_number=<?php echo $row['report_id'];?>" onclick="return checkDelete()"  style="color:red;"><img src='images/delete.png'>Delete</a></td>
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
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"range.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#purchase_order').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
</body>
</html>