			<?php require_once 'php_action/core.php';
 include_once('connect_db.php');



			?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="sty.css" />
    <script src="jquery-1.5.js"></script>
    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 3000) {
          val.value = val.value.substring(0, 3000);
        } else {
          $('#charNum').text(3000 - len);
        }
      };
    </script>
	<script>
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>



        <link href="css_send/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
     
        <link rel="stylesheet" type="text/css" href="css_send/DT_bootstrap.css">

</head>
<body>

    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">

<br><br>
<div class="form-style-3">
<fieldset><legend>Select by clicking checkbox before Incide(s)</legend>
							<form method="post" action="excluded" >
                        <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        
                            <thead>
						
                                <tr style="background-color:#000; color:#fff;">
                                    <th><input type="checkbox" /></th>
                                    <th>Incident Name</th>

                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysql_query("select * from incidents")or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							$id=$row['incident_id'];
							/*$destlevel= $row[level];
							if($destlevel < $destlevel){
								$destlevel= $destlevel;
							}*/
							?>
                              
										<tr style="background-color:#fff;">
										<td>
										<input name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                         <td><?php echo $row['incident_name'] ?></td>
                                </tr>
                         
						          <?php } 
//echo $destlevel;								  
								  ?>
                            </tbody>
                        </table>
						

					<input type="submit" class="btn btn-danger" value="SEND" name="delete">
          
</form>
</fieldset>
</div>

        </div>
	
        </div>
        </div>
    </div>



</body>
</html>
