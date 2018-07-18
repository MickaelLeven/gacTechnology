$(document).ready(function() {

	$('.timepicker').datetimepicker({

		pickDate: false
    });

	$('.calendar').datetimepicker({

		language: 'pt-BR'
	});
	
	$('body').on('change', '.js_select_type_ticket', function() {
		
		let type = $('option:selected', this).attr('type');
		
		if(type == 'data') {
			
			$('.js_div_data').show();
			$('.js_div_phone').hide();
		}
		else if(type == 'phone') {
			
			$('.js_div_data').hide();
			$('.js_div_phone').show();
		}
		else {
			
			$('.js_div_data').hide();
			$('.js_div_phone').hide();
		}
			
	});
	
	$('.js_select_type_ticket').change();
});