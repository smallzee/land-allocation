$(document).ready(function() {
	$("#state").change(function(event) {
		/* Act on the event */
		var state = $(this).val();

		if(state != ""){
			$.ajax({
				url: 'lga.php',
				type: 'GET',				
				data: {
					state: state
				},
				success:function(f){
					$("#lga").html(f);
				}
			});			
			
		}
	});
});