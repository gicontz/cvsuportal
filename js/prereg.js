$(document).ready(function(){
	$('#add_exceed').hide();

	$('#subject-add').click(function(){
		$('#table-addSubject tbody tr .btn-subSubject').hide();
		$('#table-addSubject tbody tr .btn-addSubject').show();
	});

	$('body').on('click', '.subBtn', function() {
		var unit_value = parseInt($(this).val());
		var totalUnits = parseInt($('#total_units').text());
		$('#total_units').text(totalUnits - unit_value);
		removeFromOrigin('#'+$(this).closest('tr').attr('id'));
	});

	$('body').on('click', '.addBtn', function() {
		var unit_value = parseInt($(this).val());
		var totalUnits = parseInt($('#total_units').text());
		if (totalUnits + unit_value <= max_units) {
			$('#total_units').text(totalUnits + unit_value);
			transferToOrigin('#'+$(this).closest('tr').attr('id'));
		}else {
			alert('The Maximum Units Must Be '+ max_units +' and below');
		}

		if (parseInt($('#total_units').text()) >= max_units) {
			$('#add_exceed').show();
			$('#add_exceed').text(max_units +' Units is the Maximum allowed units');
			$('#add_done').hide();
		}else {
			$('#add_exceed').hide();
			$('#add_done').show();
		}
	});


	function transferToOrigin(selector){
		$('#table-addSubject tbody '+selector+' .btn-addSubject').hide();
		$('#table-addSubject tbody '+selector+' .btn-subSubject').hide();
		$('#table-addSubject tbody '+selector).clone().appendTo('#table-preenrollment tbody');
		$('#table-addSubject tbody '+selector).clone().appendTo('#table-subSubject tbody');
		$('#table-addSubject tbody '+selector).remove();
	}

	function removeFromOrigin(selector){
		$('#table-preenrollment tbody '+selector+' .btn-addSubject').show();
		$('#table-preenrollment tbody '+selector).clone().appendTo('#table-addSubject tbody');
		$('#table-preenrollment tbody '+selector).remove();
		$('#table-subSubject tbody '+selector).remove();
	}


	$('body').on('click', '#subject-minus', function() {
		$('#table-preenrollment tbody .btn-subSubject').toggle();
	});


});