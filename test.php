<script>
 function CheckTextbox(){

    if(textbox1 is disabled){ //here
      alert("disabled");
    }else{
      alert("enable");
    }

   if(textbox2 is disabled){ //here
      alert("disabled");
   }else{
      alert("enable");
   }
}
</script>

<input type="text" id="textbox1" disabled="disabled">
<input type="text" id="textbox2">
<input type="button" onclick="CheckTextbox();">