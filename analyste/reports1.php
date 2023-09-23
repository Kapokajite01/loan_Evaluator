<?php require_once 'includes/header.php'; ?>
          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?>
<!DOCTYPE html>
<html>
<head>
<style>

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    width: 100%; /* Full width */
    height: 100%; /* Full height */
	border: 5px solid #888;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #6eacbd;
    margin: 0px auto;
    padding: 5px;
    border: 1px solid #888;
    width: 100%;
}

/* The Close Button */
.close {
    color: #000000;
    float: right;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script>
function getDistrict(val) {
	$.ajax({
	type: "POST",
	url: "getDistrict.php",
	data:'disrict_id='+val,
	success: function(data){
		$("#disrict_liste").html(data);
		getSector();

	}
	});
}


function getSector(val) {
	$.ajax({
	type: "POST",
	url: "getSector.php",
	data:'sector_id='+val,
	success: function(data){
		$("#sector-list").html(data);
				getCell();

	}
	});
}
function getCell(val) {
	$.ajax({
	type: "POST",
	url: "getCell.php",
	data:'cell_id='+val,
	success: function(data){
		$("#cell_list").html(data);
	}
	});
}

</script>
<script type="text/javascript">
       $(function() {
               $("#datesearch").datepicker({ dateFormat: "yy-mm-dd" }).val()
               $("#datesearch1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });

   </script>
</head>
<body>
	<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Reports</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
				<!-- Trigger/Open The Modal -->
					
					<button class="btn btn-default button1" data-toggle="modal"  id="myBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Reports </button>
				</div> <!-- /div-action -->				
				
				report view

			</div> <!-- /panel-body -->



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div style="background-color:#f7f9fa;height:50%;width:70%;margin:0 auto;" >
<form class="form-horizontal" role="form" method="post" action="save_report" enctype="multipart/form-data"id="myCoolForm">

 <fieldset><legend><strong><font color="#000000">Where</font></strong></legend>
<div class="frmDronpDown">
<div class="row">
<table align="center">
<tr>
<td><label><strong>Province</strong></label></td>
<td><label><strong>Disrict</strong></label></td>
<td><label><strong>Sector</strong></label></td>
<td><label><strong>Cell</strong></label></td>
</tr>

<tr><td><select name="province" id="province-list" onChange="getDistrict(this.value);">
<option value disabled selected value="">Select Province</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["Province_id"]; ?>"><?php echo $province["province_name"]; ?></option>
<?php
}
?>
</select>
</td><td>

<select name="district" id="disrict_liste" onChange="getSector(this.value);" required> 
<option value="">Select Disrict</option>
</select>
</td><td>
<select name="sector" id="sector-list"  onChange="getCell(this.value);" required>
<option value="">Select Sector</option>
</select>
</td><td>

<select name="cell" id="cell_list" required>
<option value="">Select Cell</option>
</select></td></tr>
<tr>
<td><label><strong>Latitude</strong></label></td>
<td><label><strong>Longitude</strong></label></td>
</tr>
<tr><td>
<input type="text"  name="latitude"></td><td>
<input type="text"  name="longitude"></td><td>

<tr><td><label><strong>Geo-Description</strong></label><textarea name="gedodescription" rows="3" cols="80" style="width:60%" required></textarea></td></tr>
</table>
</fieldset>

<fieldset><legend><strong><font color="#000000">When</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Date of Incident: </strong></label><input type="text" name="dateincident" id="datesearch" placeholder="Date of Incident" required aria-required='true' aria-describedby='name-format'></td><td><label><strong>Date of Entry :</strong></label><input type="text" name="datesearch1" id="dateentry" placeholder="Date of Data entry" required aria-required='true' aria-describedby='name-format'></td></tr>
</table>
</div>
</fieldset>


<fieldset><legend><strong><font color="#000000">What</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Incident: </strong></label><select name="incident" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Subversive activities">Subversive activities</option>   
			   <option value="Local Conflict">Local Conflict</option>
                <option value="Killings">Killings</option>
                <option value="Intimidation">Intimidation</option>

	           </select></td><td><label><strong>Keyword :<label><select name="keyword" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Military">Military</option>   
			   <option value="Security Situation">Security Situation</option>
                <option value="Road Bandits">Road Bandits</option>
                <option value="Education">Education</option>
                <option value="Mouvment">Mouvment</option>
                <option value="Abduction">Abduction</option>

	           </select></td>
<td><label><strong>Sub-Keyword :<label><select name="subkeyword" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Deployment">Deployment</option>   
			   <option value="Security Situation">Attempt</option>
                <option value="Killings">Killings</option>
                <option value="Imminent attacks">Imminent attacks</option>
                <option value="Weapons smuggling">Weapons smuggling</option>

	           </select></td></tr>
</table>
<table align="center">
<tr><td><label><strong>Report Body</strong></label></td><td><textarea name="message" rows="5" cols="130" required style="width:90%"></textarea></td></tr>
</table>
</div>
</fieldset>

<fieldset><legend><strong><font color="#000000">Who</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Actor Group: </strong></label><select name="actorgroupa" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Enemies Groups">Enemies Groups</option>   
			   <option value="Political Prties">Political Prties</option>
                <option value="Civil Society">Civil Society</option>

	           </select><br>

<label><strong>institution: </strong></label><select name="institution" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Ministry of local governement">Ministry of local governement</option>   
			   <option value="RDB">RDB</option>
                <option value="Civil Society">Parliament</option>

	           </select>
</td><td><label><strong>Actor: </strong></label><select name="actora" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="FDLR">FDLR</option>   
			   <option value="CNRD">CNRD</option>
                <option value="FLN">FLN</option>

	           </select><br>

<label><strong>Members </strong></label><select name="memebrs" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="FDLR">FDLR</option>   
			   <option value="CNRD">CNRD</option>
                <option value="FLN">FLN</option>

	           </select>
</td>
<td><label><strong>Actor Description: </strong></label><input type="text"  name="actoradescription"><br>

<label><strong>Member Description: </strong></label><input type="text"  name="memeberdescription">

</td></tr>
</table>
</div>
</fieldset>




<fieldset><legend><strong><font color="#000000">Metadata</font></strong></legend>
<div class="frmDronpDown">
<table align="center">
<tr><td><label><strong>Classification: </strong></label><select name="classification" id="classification" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                <option value="Top Secret">Top Secret</option>
                <option value="Secret">Secret</option>
                <option value="Confidential">Confidential</option>
                <option value="Restricted">Restricted</option>
	           </select><br>

<label><strong>Credibility: </strong></label><select name="credibility" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                <option value="Confirmed">Confirmed</option>   
			    <option value="Probably true">Probably true</option>
                <option value="Possibly true">Possibly true</option>
                <option value="Doubtfull">Doubtfull</option>
                <option value="Unlikely">Unlikely</option>
                <option value="Accuracy cannot be determined">Accuracy cannot be determined</option>

	           </select>


</td><td><br>

<label><strong>Reliability: </strong></label><select name="reliability" required aria-required="true" aria-describedby="name-format"><option value=""></option>
                 <option value="Completely reliable">Completely reliable</option>   
			   <option value="Usually Relaible">Usually Relaible</option>
                <option value="Fairy relaible">Fairy relaible</option>
                <option value="Usually unrelaible">Usually unrelaible</option>
                <option value="Unrelaible">Unrelaible</option>
                <option value="Reliability cannot be determined">Reliability cannot be determined</option>

	           </select>
</td>
<td><br>

<label><strong>Source: </strong></label><input type="text"  name="source">

</td></tr>
</table>



                   
					

					<div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach" >
						<a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
                    </div>
					
					<a class="add_field_button"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attach File(s)</strong></a>

				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SAVE" id="bigbutton"/>
	
				</form>
  </div>

</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
 <script>
            jQuery(document).ready(function() {
                jQuery("#submit").click(function(e) {
                    var sen_email = jQuery('.sen_email').val();
                    var rec_email = jQuery('.rec_email').val();
                    if (sen_email == "") {
                        alert('Sender\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                    if (rec_email == "") {
                        alert('Receiver\'s Email Address cannot be empty.');
                         e.preventDefault();
                    }
                   /* var attach = jQuery('#first_attach').val();
                    if (attach == "") {
                        alert('Atleast one attachment is required!!!');
                        e.preventDefault();
                    }*/
                    
                });
                // Code for creating more attachment file
                // Maximum attachment allowed
                var max_fields = 11;
                //Fields wrapper
                var wrapper = $(".input_fields_wrap");
                // Add button ID
                var add_button = $(".add_field_button");
                // Initlal attachment field count
                var x = 1;

                // Add attachment field on per click
                $(add_button).click(function(e) {
                    e.preventDefault();
                    // Max attachment allowed
                    if (x < max_fields) {
                        // Attachment increment
                        x++;
						y = x-1;
                        $(wrapper).append('<div style = " margin-left:85px"><input type="file" name="attachment' + x + '"/><a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File'+y+'</strong></a></div>'); //add attachment
                        if (x == max_fields) {
                            // Hide add more attachment link
                            $(".add_field_button").hide();
                        }
						
                    }

                });
                // Remove attachment on per click
                $(wrapper).on("click", ".remove_field", function(e) { //user click on to remove attachment
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;

                    if (x < max_fields) {
                        // Show add more attachment link when field < max_fields
                        $(".add_field_button").show();
                    }
                })
            });
        </script>
		
<script>
$("#toggle").on("click", function(){
  $("#send_to").toggle();                 // .fadeToggle() // .slideToggle()
});
$("#toggle2").on("click", function(){
  $("#bcc").toggle();                 // .fadeToggle() // .slideToggle()
});

</script>





<script>
var el = document.getElementById('myCoolForm');

el.addEventListener('submit', function(){
    return confirm('Are you sure you want to save report?');
}, false);

</script>
 </section><!-- /.content -->
 <style>
input#bigbutton {
width:150px;
background: #3e9cbf; /*the colour of the button*/
padding: 8px 14px 10px; /*apply some padding inside the button*/
border:1px solid #3e9cbf; /*required or the default border for the browser will appear*/
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
/*style the text*/
font-size:1.5em;
font-family:Oswald, sans-serif; /*Oswald is available from http://www.google.com/webfonts/specimen/Oswald*/
letter-spacing:.1em;
text-shadow: 0 -1px 0px rgba(0, 0, 0, 0.3); /*give the text a shadow - doesn't appear in Opera 12.02 or earlier*/
color: #fff;
/*use box-shadow to give the button some depth - see cssdemos.tupence.co.uk/box-shadow.htm#demo7 for more info on this technique*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 5px 0px 0px #205c73, 0px 10px 5px #999;
/*give the corners a small curve*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
/***SET THE BUTTON'S HOVER AND FOCUS STATES***/
input#bigbutton:hover, input#bigbutton:focus {
color:#dfe7ea;
/*reduce the size of the shadow to give a pushed effect*/
-webkit-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
-moz-box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
box-shadow: inset 0px 1px 0px #3e9cbf, 0px 2px 0px 0px #205c73, 0px 2px 5px #999;
}
	
	</style>
</body>
</html>

   