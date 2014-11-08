$(function()
{
	var y = modif = 0;
	var add = '#genInscription thead tr:nth-child(1) ';

	function majIndex()
	{
		$('tr[id^="tr"]').each(function(i)
		{
			var name = $(this).find('td input:first').attr('name', 'index' + i).val();
			if (name)
			{
				$(this).find('td:nth-of-type(3) textarea').attr('name', name + 'Html');
				$(this).find('td:nth-of-type(4) textarea').attr('name', name + 'Verif');
			}
			else
				$(this).remove();
		});
	}

	function addInput(index, name)
	{
		$('#genInscription tbody').prepend('<tr id="tr' + index + '"></tr>');
		$('#tr' + index)
		.append('<td><div class="rmBT" title="Remove"><div class="crossL"></div><div class="crossR"></div></div></td>')
		.append('<td><input name="index' + index + '" placeholder="Name" value="' + name + '" maxlength="255" pattern="[A-Za-z0-9 ]{2,255}" title="2 à 255 caractères alphanumériques"></td>')
		.append('<td><textarea name="' + name + 'Html" placeholder="Code HTML for this input">' + $(add + 'textarea:nth-of-type(1)').val() + '</textarea></td>')
		.append('<td><textarea name="' + name + 'Verif" placeholder="Condition of validation">' + $(add + 'td:last-of-type textarea').val() + '</textarea></td>');

		$('#tr' + index)
		.find('td')
		.wrapInner('<div style="display: none;" />')
		.parent()
		.find('td > div')
		.slideDown(700, function(){
			var $set = $(this);
			$set.replaceWith($set.contents());
		});

		rmTr(index);
		$('table tbody').sortable('refresh');
		$(add + 'input').val('');
		$(add + 'textarea').each(function(i)
		{
			$(this).val('')
		});
	}

	function surveyName()
	{
		$('tr[id^="tr"]').each(function(i)
		{
			(function(i)
			{
				$('#tr' + i).find('input').on('focus', function()
				{
					var save = $('#tr' + i).find('input').val();
					$('#tr' + i).find('input').on('keydown', function(event)
					{
						var e = event || window.event;
						var key = e.which || e.keyCode;alert(key);
						if((key < 65 && key > 90) || (key < 96 && key > 105)){
							return false;
						}
						var last = $('#tr' + i).find('input').val(),
						textarea = $('#tr' + i).find('td:nth-of-type(3) textarea').val();

						textarea = textarea.replace(
							new RegExp('name="' + save + '"','ig'),
							'name="' + last + '"'
						).replace(
							new RegExp('for="' + save + '"','ig'),
							'for="' + last + '"'
						).replace(
							new RegExp('id="' + save + '"','ig'),
							'id="' + last + '"'
						);

						$('#tr' + i).find('td:nth-of-type(3) textarea').val(textarea);
						save = $('#tr' + i).find('input').val();
					});
				});
			})(i);
		});
	}

	function init()
	{
		$('.createBT').on('click', function()
		{
			if($('.addInput177').val().length > 1)
			{
				addInput(y, $('.addInput177').val());
				y++;
			}
		});
		/* Change behavior of enter key in addInput */
		$(add + 'input:first-of-type').on('keydown', function(event)
		{
			var e = event || window.event;
			var key = e.which || e.keyCode;
			if(key == 13)
			{
				e.preventDefault();
				$('.createBT').trigger('click');
			}
		});

		$('table tbody input, table tbody textarea').one('change', function()
		{
			modif++;
		});

		surveyName();

		$('table tbody').sortable({
			axis: 'y',
			cursor: 'move',
			delay: 350,
			opacity: 0.7,
			revert: true,
			distance: 10,
			tolerance: "pointer",
			scrollSensitivity: 100,
			scrollSpeed: 40,
			placeholder: 'sortable-placeholder',
			handle: 'td:nth-child(2)',
			change: function(event, ui)
			{
				modif++;
			}
		});

		$('.rmBT').each(function(i)
		{
			rmTr(i);
			y++;
		});
	}

	function rmTr(i)
	{
		$('#tr' + i + ' .rmBT').on('click', function()
		{
			$('table > tbody > #tr' + i)
				.find('td')
				.wrapInner('<div style="display: block;" />')
				.parent()
				.find('td > div')
				.slideUp(700, function()
				{
					$(this).parent().parent().remove();
				});
		});
	}

	function loadFile(file)
	{
		destroy();
		$( '#genInscription table').load('#genInscription table tr', { ajax: $('.genInscLoader select').val() }, function() {
			init();
		});
	}

	function destroy()
	{
		$('table tbody').sortable('destroy');
		$('.rmBT').each(function(i)
		{
			$(this).off('click');
		});
		$('.createBT').off('click');
		$(add + 'input:first-of-type').off('keydown');
	}

	function leave()
	{
		console.log('try');
		if (modif > 0)
			return 'You leave me, without save nor submit? :\'(';
	}

	init();

	$('.genInscLoader select').on('change', function(){
		if ($(this).val())
			loadFile($(this).val());
	});

	$(window).on('beforeunload', function()
	{
		return leave();
	});

	$('#genInscription').on('submit', function ()
	{
		$(window).off('beforeunload');
		majIndex();
	});

});
