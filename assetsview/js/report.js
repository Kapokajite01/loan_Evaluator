$(document).ready(function() {
	// order date picker
	$("#dateofvetting").datepicker();


	$("#getOrderReportForm").unbind('submit').bind('submit', function() {
		
		var dateofvetting = $("#dateofvetting").val();
		

		if(dateofvetting == "" || endDate == "") {
			if(dateofvetting == "") {
				$("#dateofvetting").closest('.form-group').addClass('has-error');
				$("#dateofvetting").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}

		

			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'text',
				success:function(response) {
					var mywindow = window.open('', 'Digital Star Vetting System', 'height=400,width=600');
	        mywindow.document.write('<html><head><title>Order Report Slip</title>');        
	        mywindow.document.write('</head><body>');
	        mywindow.document.write(response);
	        mywindow.document.write('</body></html>');

	        mywindow.document.close(); // necessary for IE >= 10
	        mywindow.focus(); // necessary for IE >= 10

	        mywindow.print();
	        mywindow.close();
				} // /success
			});	// /ajax

		} // /else

		return false;
	});

});