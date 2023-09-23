<?php
error_reporting(0);

// Include PHPMailerAutoload.php library file
include ("lib/PHPMailerAutoload.php");

//db conection
$random =rand();
//error_reporting (0);
$con=mysql_pconnect('localhost','root','%9,l6rTDZ=k1')or die("cannot connect to server");
mysql_select_db('sintras')or die("cannot connect to database");
$sen_name = "";
$sen_email = "";
$rec_email = "";
$email_sub = "";
$box_msg = "";
// Retrieving & storing user's submitted information
/*if (isset($_POST['sen_name'])) {
    $sen_name = $_POST['sen_name'];
}
if (isset($_POST['sen_email'])) {
    $sen_email = $_POST['sen_email'];
}
if (isset($_POST['rec_email'])) {
    $rec_email = $_POST['rec_email'];
}
if (isset($_POST['email_sub'])) {
    $email_sub = $_POST['email_sub'];
}
if (isset($_POST['box_msg'])) {
    $box_msg = $_POST['box_msg'];
}*/

session_start();
include "../../inc/config.php";
$connect = mysql_connect("localhost","root","%9,l6rTDZ=k1"); 
mysql_select_db("sintras",$connect);

  $key_value = "k€yv@lµ€"; 
  $key_size =  strlen($key_value);


$mail_id = $_POST['mail_id'];
$sender=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->email;
$fname=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->first_name;
$lname=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->last_name;
?>


<link rel="stylesheet" href="http://localhost/sintras/modul/compose/cssauto/style.css" />

      <head> 
		   <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">	  
           <title>Compose mail</title>
           <script src="jquery.min.js"></script>
           <link rel="stylesheet" type="text/css" href="css/style.css"/>
           <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
           <link rel="stylesheet" type="text/css" href="css/jquery-1.10.2.js"/>
		             <link rel="stylesheet" type="text/css" href="css/jquery-ui.js"/>
           <script src="js/jquery.js"></script>
		  
<html lang="en">

<link rel="stylesheet" href="http://localhost/sintras/modul/compose/jsautocomplete/jquery-ui.css">
<script src="http://localhost/sintras/modul/compose/jsautocomplete/jquery-1.10.2.js"></script>
<script src="http://localhost/sintras/modul/compose/jquery-ui.js"></script>
<script src="http://localhost/sintras/modul/compose/tes.css"></script>



<script>
$(function() {
    function split( val ) {
        return val.split( /;\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
    
    $( "#rec_id" ).bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 1,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            $.getJSON("http://localhost/sintras/modul/compose/ajax_refresh.php?sen=<?php echo $mysender;?>", { term : extractLast( request.term )},response);
        },
		
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( "; " );
            return false;
        }
    });
});
</script>		  
      </head> 
   <section class="content-header">
          <h1>
            SINTRAS
            <small>V 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SINTRAS</li>
          </ol>
        </section>
		<section class="content">
<div class="container">
<div class="row inbox">
	
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body message">
			<?php
		  
		   if(isset($_GET['fail']))
	{
		
		?>
        <blink><h5 align = "center"><strong><i><font color = "red">&#9888; Email was not sent...</font></i></strong></h5></blink>
        <?php
	}
if(isset($_GET['cluster']))
	{
$Text = urldecode($_REQUEST['cluster']);
$Mixed = json_decode($Text);
$n = count($Mixed);
		?>
        <blink><h5 align = "center"><strong><i><font color = "red">&#9888; You Tried To Send To Unexisting Email(s)&nbsp;&nbsp;&nbsp;&nbsp;</font></i><?php for($i=0; $i <$n; $i++){echo',&nbsp;'. $Mixed[$i].'';}?></strong></h5></blink>
        <?php
	}		
		   
		   
		   ?>
<style>				
#send_to{
  display:none;
}
#bcc{
  display:none;
}</style>

				<form class="form-horizontal" role="form" method="post" action="<?=base_admin();?>modul/compose/MulAttachMailGroup.php" enctype="multipart/form-data"id="myCoolForm">
                   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://localhost/sintras/modul/compose/jsauto/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/sintras/modul/compose/jsauto/script.js"></script>
</head>



    
<form class="form-horizontal" role="form" method="post" action="<?=base_admin();?>modul/compose/MulAttachMail.php" enctype="multipart/form-data"id="myCoolForm">
               
				   
				   
				   <div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label"><strong>Group </strong></label>
				    	<div class="col-sm-11">
						 <div class="input_container">
                    <input type="text" id="country_id" name="country_id" onkeyup="autocomplet()" class="form-control select2-offscreen" autocomplete="off" required aria-required='true' aria-describedby='name-format' placeholder="Type Mail Group"  style="background-color: #fff; width:200px;">
                   &nbsp;&nbsp;&nbsp;&nbsp; <ul id="country_list_id"></ul>
                </div>
				    	</div>
				  	</div>


					<?php
					
					if(isset($_GET['clusterc']))
	{
$Text = urldecode($_REQUEST['clusterc']);
$Mixed = json_decode($Text);
$n = count($Mixed);
		?>
        <blink><h5 align = "center"><strong><i><font color = "blue">&#9888; Unexisting Email(s) in Cc&nbsp;&nbsp;&nbsp;&nbsp;</font></i><?php for($i=0; $i <$n; $i++){echo',&nbsp;'. $Mixed[$i].'';}?></strong></h5></blink>
        <?php
	}	?>	
		
<div id="participants"class="form-group">
			    	
				  	</div>
					
					<div class="form-group">
				    	<label for="cc" class="col-sm-1 control-label">Subject:</label>
				    	<div class="col-sm-11">
                              <input style="background-color: #fff; width:600px;" type="text" name="subject" class="form-control select2-offscreen" id="subject" placeholder="Type Subject" tabindex="-1" autocomplete="off" required>
				    	</div>
					<div class="input_fields_wrap">
                        <div style = "display: none" ><input type="file" name="attachment" value="Attach File" id="first_attach" >
						<a href="#" class="remove_field"  style="color:red;"><img src="/sintras/modul/compose/img/delattach.png.png" width="15" height="15"/><strong> Remove File 1</strong></a>
						</div>
                    </div>
					<br>
					<a class="add_field_button"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="/sintras/modul/compose/img/attACHMENT.png" width="15" height="15"/>Attach File(s)</strong></a>
					</div>
					

					<div class="form-group">
					
                     <textarea name="message" id="message"  style="border:0;"class="editbox"id="editbox" style="display:none;" required></textarea>  
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Send To Group" id="bigbutton"/><br>
					
				<div class="form-group">  
                     <input type="hidden" name="mail_id" id="mail_id" ="none"/>  
                     <div id="autoSave"></div>  
                </div>
				</form>
           </div> 	
			</div>
		</div>
		

	</div>

		
	</section>
	
	
 
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
		<script src="<?=base_admin();?>assets/login/js/validate.js"></script>
<script src="<?=base_admin();?>assets/plugins/ckeditor/ckeditor.js"></script>

<script src="<?=base_admin();?>assets/plugins/ckeditor/adapters/jquery.js"></script>
<script src="<?=base_admin();?>assets/dist/js/pass_up.js"></script>

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
    return confirm('Are you sure you want to send this mail?');
}, false);

</script>
 </section><!-- /.content -->
 <style>
input#bigbutton {
width:250px;
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