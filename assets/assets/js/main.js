$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });
	// 
	//  
	

	var manualUploader = new qq.FineUploader({
		element: document.getElementById('fine-uploader-manual-trigger'),
		template: 'qq-template-manual-trigger',
		request: {
			endpoint: 'http://localhost/Eduac/painel/biblioteca/upload' 
		},
		thumbnails: {
			placeholders: {
				waitingPath:  'http://localhost/Eduac/assets/js/fine-uploader/placeholders/waiting-generic.png',
				notAvailablePath:  'http://localhost/Eduac/assets/js/fine-uploader/placeholders/not_available-generic.png'
			}
		},
		callbacks: {
			onComplete: function(id, fileName, responseJSON) {
				alert(responseJSON);
				if (responseJSON.success) {
					$('#thumbnail-fine-uploader').append('<img src="img/success.jpg" alt="' + fileName + '">');
				}
			}
		},
		autoUpload: false,
		debug: true
	});

	qq(document.getElementById("trigger-upload")).attach("click", function() {
		manualUploader.uploadStoredFiles();
	});


});