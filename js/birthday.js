window.addEventListener('load', function() {
	$('.spread_365_item').on('click',function(){
		$('form').submit();
	});

	//選択した月に応じて日の選択肢を変える
	$('#btd_m').on('change', function () {
		var selectedMonth = $(this).val();
		$('#btd_d').empty();
		var daysInMonth = new Date(2000, selectedMonth, 0).getDate();
		for (var day = 1; day <= daysInMonth; day++) {
			$('#btd_d').append($('<option>', {
				value: day,
				text: day
			}));
		}
	});

});