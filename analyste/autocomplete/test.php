<!doctype html>
<html lang="en">
<link rel="stylesheet" href="jsautocomplete/jquery-ui.css">
<script src="jsautocomplete/jquery-1.10.2.js"></script>
<script src="jsautocomplete/jquery-ui.js"></script>

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
            $.getJSON("skills.php", { term : extractLast( request.term )},response);
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
<body>

<label for="skills">Tag your skills: </label>
<input id="rec_id" size="250">
 
</body>
</html>