var manageBrandTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageBrandTable = $("#manageBrandTable").DataTable({
		'ajax': 'php_action/fetchusers.php',
		'order': []		
	});

// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var uname = $("#uname").val();
		var pwd = $("#pwd").val();
		var rol = $("#rol").val();

if(firstname == "") {
			$("#firstname").after('<p class="text-danger">first Name field is required</p>');
			$('#firstname').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#firstname").find('.text-danger').remove();
			// success out for form 
			$("#firstname").closest('.form-group').addClass('has-success');	  	
		}

if(lastname == "") {
			$("#lastname").after('<p class="text-danger">last Name field is required</p>');

			$('#lastname').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#lastname").find('.text-danger').remove();
			// success out for form 
			$("#lastname").closest('.form-group').addClass('has-success');	  	
		}
if(uname == "") {
			$("#uname").after('<p class="text-danger">user Name field is required</p>');

			$('#uname').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#uname").find('.text-danger').remove();
			// success out for form 
			$("#uname").closest('.form-group').addClass('has-success');	  	
		}
if(pwd == "") {
			$("#pwd").after('<p class="text-danger">password Name field is required</p>');

			$('#pwd').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#pwd").find('.text-danger').remove();
			// success out for form 
			$("#pwd").closest('.form-group').addClass('has-success');	  	
		}
if(rol == "") {
			$("#rol").after('<p class="text-danger">Role Name field is required</p>');

			$('#rol').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#rol").find('.text-danger').remove();
			// success out for form 
			$("#rol").closest('.form-group').addClass('has-success');	  	
		}
		if(firstname && lastname && uname && pwd && rol) {
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
	}); // /submit brand form function

});















































































function editBrands(u_Id = null) {
	if(u_Id) {
		// remove hidden brand id text
		$('#u_Id').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelecteduser.php',
			type: 'post',
			data: {u_Id : u_Id},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editfirstname').val(response.brand_name);
				// setting the brand status value  
			
				
				$('#editlastname').val(response.brand_active);
				$('#editUsername').val(response.brand_active);
				$('#editpassword').val(response.brand_active);
				$('#editrole').val(response.brand_active);
				// brand id 
				$(".editBrandFooter").after('<input type="hidden" name="u_Id" id="u_Id" value="'+response.brand_id+'" />');

				// update brand form 
				$('#editBrandForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

var firstname = $('#editfirstname').val();
					var lastname = $('#editlastname').val();
					var uname = $('#editUsername').val();
					var pwd = $('#editpassword').val();
					var rol = $('#editrole').val();

					if(firstname == "") {
						$("#editfirstname").after('<p class="text-danger">first Name field is required</p>');
						$('#editfirstname').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editfirstname").find('.text-danger').remove();
						// success out for form 
						$("#editfirstname").closest('.form-group').addClass('has-success');	  	
					}

if(lastname == "") {
						$("#editlastname").after('<p class="text-danger">last Name field is required</p>');
						$('#editlastname').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editlastname").find('.text-danger').remove();
						// success out for form 
						$("#editlastname").closest('.form-group').addClass('has-success');	  	
					}
if(uname == "") {
						$("#editUsername").after('<p class="text-danger">user Name field is required</p>');
						$('#editUsername').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsername").find('.text-danger').remove();
						// success out for form 
						$("#editUsername").closest('.form-group').addClass('has-success');	  	
					}
if(pwd == "") {
						$("#editpassword").after('<p class="text-danger">the password field is required</p>');
						$('#editpassword').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editpassword").find('.text-danger').remove();
						// success out for form 
						$("#editpassword").closest('.form-group').addClass('has-success');	  	
					}
if(rol == "") {
						$("#editrole").after('<p class="text-danger">Role field is required</p>');
						$('#editrole').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editrole").find('.text-danger').remove();
						// success out for form 
						$("#editrole").closest('.form-group').addClass('has-success');	  	
					}					

					if(firstname && lastname && uname && pwd && rol) {
						var form = $(this);

						// submit btn
						$('#editBrandBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editBrandBtn').button('reset');

									// reload the manage member table 
									manageBrandTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function














































function removeuser(u_Id = null) {
	if(u_Id) {
		$('#removeBrandId').remove();
		$.ajax({
			url: 'php_action/fetchSelecteduser',
			type: 'post',
			data: {u_Id : u_Id},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.brand_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removeuser.php',
						type: 'post',
						data: {u_Id : u_Id},
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