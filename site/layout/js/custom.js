$(function () {
	'use strict'

	// Change Placeholder
	$('[placeholder]').focus(function () {
        $(this).attr('data-text', $(this).attr('placeholder'));
		$(this).attr('placeholder', '');
	}).blur(function () {
		$(this).attr('placeholder', $(this).attr('data-text')); 
    });

	// Input required Asterisk
	$('input, textarea').each( function () {
		if ($(this).attr('required') === 'required') {
			$(this).after('<span class="asterisk">*</span>');
		}
	});

	//confirm delete button
	$('.confirm').click(function(){
		return confirm('Are You Sure ?');
	});

	// Switch btween Login & SignUp
	$('.login-page h1 span').click(function () {
		$(this).addClass('selected').siblings().removeClass('selected');
		$('.login-page form').hide();
		$('.' + $(this).data('class')).fadeIn(650);
	});

	$('.live-name').keyup(function () {
		$('.live-priv .caption h3').text($(this).val());
	});

	$('.live-des').keyup(function () {
		$('.live-priv .caption p').text($(this).val());
	});

	$('.live-price').keyup(function () {
		$('.live-priv span').text('$' + $(this).val());
	});
});