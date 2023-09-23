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
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of a  form showing  Captcha image with random string to user read and enter</title>
<script type="text/javascript">
function reload()
{
img = document.getElementById("capt");
img.src="captcha-image.php?rand_number=" + Math.random();
}
</script>

</head>
<body >

<form type=post action=captcha-demo-data.php><input type=text name=t1>
<img src=captcha-image.php id="capt"><input type=button onClick=reload(); value='Reload image'><input type=submit value='submit'></form>
<br><br>Return to <a href=captcha.php>captcha tutorial</a>
</body>
</html>
