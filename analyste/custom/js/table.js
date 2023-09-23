var manageBrandTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage  table
	manageBrandTable = $("#manageBrandTable").DataTable({
		'ajax': 'php_action/fetchtable.php',
		'order': []		
	});

	// submit table form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var tableName = $("#tableName").val();
		var tableStatus = $("#tableStatus").val();

		if(tableName == "") {
			$("#tableName").after('<p class="text-danger">table Name field is required</p>');
			$('#tableName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#tableName").find('.text-danger').remove();
			// success out for form 
			$("#tableName").closest('.form-group').addClass('has-success');	  	
		}

		if(tableStatus == "") {
			$("#tableStatus").after('<p class="text-danger">table Name field is required</p>');

			$('#tableStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#tableStatus").find('.text-danger').remove();
			// success out for form 
			$("#tableStatus").closest('.form-group').addClass('has-success');	  	
		}

		if(tableName && tableStatus) {
			var form = $(this);
			// button loading
			$("#createBrandBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createBrandBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageBrandTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitBrandForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-brand-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit table form function

});



function removetable(table_id = null) {
	if(table_id) {
		$('#removeBrandId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedtable.php',
			type: 'post',
			data: {table_id : table_id},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.brand_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removeTables.php',
						type: 'post',
						data: {table_id : table_id},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeBrandBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageBrandTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeBrandFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function