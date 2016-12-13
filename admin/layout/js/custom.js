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

	// Show and Hide Password
	$('.show-pass').click(function(){
		$(this).toggleClass('active');

		if ($(this).hasClass('active')){
			$(this).css('color','red');
			$('.password').attr('type', 'text');
		}else{
			$(this).css('color','black');
			$('.password').attr('type', 'password');
		}
	});
	//confirm delete button
	$('.confirm').click(function(){
		return confirm('Are You Sure ?');
	});

	$('.cat h3').click(function () {
		$(this).next('.full-view').fadeToggle(300);
	});

	$('.option span').click(function () {
		$(this).addClass('active').siblings('span').removeClass('active');

		if ($(this).data('view') === 'full') {
			$('.cat .full-view').fadeIn(200);
		}else{
			$('.cat .full-view').fadeOut(200);
		}
	});

	$('.toggle-info').click(function () {
		$(this).toggleClass('selected').parent().next('.panel-body').fadeToggle();
		if ($(this).hasClass('selected')) {
			$(this).html('<i class="fa fa-minus"></i>');
		}else{
			$(this).html('<i class="fa fa-plus"></i>');
		}
	});

});
