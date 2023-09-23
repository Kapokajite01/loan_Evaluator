<?Php
//****************************************************************************
////////////////////////Downloaded from  www.plus2net.com   //////////////////////////////////////////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////// You can distribute this code with the link to www.plus2net.com ///
/////////////////////////  Please don't  remove the link to www.plus2net.com ///
//////////////////////////
//*****************************************************************************
?>
html>

<form type=post action=captcha-demo-data.php id=f1><input type=text name=t1 id=t1>
<img src=captcha-image-adv.php id="capt"><input type=button id='reload' value='Reload image'><input type=button id=b1 value=Submit></form>
<div id=display_msg></div>

<script>
$(document).ready(function() {
function reload(){
img = document.getElementById("capt");
img.src="captcha-image-adv.php?rand_number=" + Math.random();
}	
////
$('#reload').click(function(){
reload();	
})
///
$('#b1').click(function(){
var str=$('#t1').val();

$.post( "captcha-demo3-data-jq.php", {"t1":$('#t1').val()},function(return_data,status){
//$("#msg").html(return_data);
//alert (return_data);
if(return_data=='OK'){
	$('#display_msg').html('Validation is ok')
}else{
	reload();
$('#display_msg').html('Validation failed')	
}
$("#display_msg").show();
setTimeout(function() { $("#display_msg").fadeOut('slow'); }, 3000);
});     

})
////Prevent Enter Key for submitting form///
$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
////
})
</script>



</body>
</html>
