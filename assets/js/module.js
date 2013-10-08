
/* Module-specific javascript can be placed here */

$(document).ready(function() {
			handleButton($('#et_save'),function() {
					});
	
	handleButton($('#et_cancel'),function(e) {
		if (m = window.location.href.match(/\/update\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/update/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	handleButton($('#et_deleteevent'));

	handleButton($('#et_canceldelete'),function(e) {
		if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
			window.location.href = window.location.href.replace('/delete/','/view/');
		} else {
			window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
		}
		e.preventDefault();
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});

	$('button.addMedication').click(function(e) {
		e.preventDefault();

		$.ajax({
			'type': 'GET',
			'url': baseUrl+'/OphCiPostoperativenotes/default/addMedication',
			'success': function(html) {
				$('table.medications tbody').append(html);
			}
		});
	});

	$('a.removeMedication').die('click').live('click',function(e) {
		e.preventDefault();
		$(this).parent().parent().remove();
	});

	handleButton($('#et_print'),function(e) {
		printIFrameUrl(OE_print_url,{});
	});

	$('.anaesthesia_grid input').die('keypress').live('keypress',function(e) {
		if (e.keyCode == 13) {
			var n = parseInt($(this).attr('name').match(/[0-9]+$/));
			var tr = $(this).parent().parent().next('tr');
			var input = tr.children('td:first').children('input');
			if (input.length >0) {
				var name = input.attr('name').replace(/[0-9]+$/,'');
				$('#'+name+n).select().focus();
			}
			return false;
		}

		return true;
	});

	$('.anaesthesia_grid input').die('keydown').live('keydown',function(e) {
		switch (e.keyCode) {
			case 37:
				var n = parseInt($(this).attr('name').match(/[0-9]+$/));
				if (n >0) {
					$('#'+$(this).attr('name').replace(/[0-9]+$/,'')+(n-1)).select().focus();
				}
				break;
			case 38:
				var n = parseInt($(this).attr('name').match(/[0-9]+$/));
				var tr = $(this).parent().parent().prev('tr');
				var input = tr.children('td:first').children('input');
				if (input.length >0) {
					var name = input.attr('name').replace(/[0-9]+$/,'');
					$('#'+name+n).select().focus();
				}
				break;
			case 39:
				var n = parseInt($(this).attr('name').match(/[0-9]+$/));
				var next = $(this).attr('name').replace(/[0-9]+$/,'')+(n+1);
				if ($('#'+next).length >0) {
					$('#'+next).select().focus();
				}
				break;
			case 40:
				var n = parseInt($(this).attr('name').match(/[0-9]+$/));
				var tr = $(this).parent().parent().next('tr');
				var input = tr.children('td:first').children('input');
				if (input.length >0) {
					var name = input.attr('name').replace(/[0-9]+$/,'');
					$('#'+name+n).select().focus();
				}
				break;
		}
	});

	$('input.gas_level').die('change').live('change',function(e) {
		var min = parseInt($(this).parent().parent().children('th').attr('data-attr-min'))
		var max = parseInt($(this).parent().parent().children('th').attr('data-attr-max'))
		var val = parseInt($(this).val());

		if ($(this).val().length == 0) {
			var n = parseInt($(this).attr('name').match(/[0-9]+$/));
			var name = $(this).attr('name').replace(/[0-9]+$/,'');

			var col = '#fff';

			while (n >= 1) {
				n -= 1;
				if ($('#'+name+n).parent().css('background')) {
					var col = $('#'+name+n).parent().css('background');
					break;
				}
			}
		} else if ($(this).val().match(/^[0-9]+$/)) {
			if (val < min || val > max) {
				var col = '#f66';
			} else {
				var col = parseInt((255 - (val * (155 / max)))).toString(16);
				if (col.length <2) {
					col = '0'+col;
				}
				var col = '#'+col+col+'ff';
			}
		} else {
			var col = '#f66';
		}

		$(this).parent().css('background',col);

		var n = parseInt($(this).attr('name').match(/[0-9]+$/)) + 1;
		var name = $(this).attr('name').replace(/[0-9]+$/,'');

		while ($('#'+name+n).length >0) {
			if ($('#'+name+n).val().length >0) {
				break;
			}
			$('#'+name+n).parent().css('background',col);
			n += 1;
		}
	});
});

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
