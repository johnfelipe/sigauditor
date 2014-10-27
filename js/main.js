//animacion del logo grupo sig
$('#logosig').addClass('animated bounceIn');

//esta función identifica cuando se inicia y finaliza una ejecución ajax para mostrar y ocultar el modal loading
//-------------------------------------------------------------------------------------------------
var __USE_GENERIC_LOADING__ = true;
 
$(document).ajaxSend(function (r, s) {
if (__USE_GENERIC_LOADING__)
    waitingDialog.show();//setTimeout(function () {waitingDialog.hide();}, 3000);
    //$("#contentLoading").show();
});
 
$(document).ajaxStop(function (r, s) {
    if (__USE_GENERIC_LOADING__)
        waitingDialog.hide();
        //$("#contentLoading").fadeOut("fast");
});
 
function invalidateGenericLoading() {
        __USE_GENERIC_LOADING__ = false;
}
//-------------------------------------------------------------------------------------------------




//esta funcion es para el modal cargando que aparece al utilizar funciones ajax
var waitingDialog = (function ($) {

    // Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			var settings = $.extend({
				dialogSize: 'm',
				progressType: ''
			}, options);
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			if (typeof options === 'undefined') {
				options = {};
			}
			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	}

})(jQuery);



//esta funcion es para el boton ir arriba que aparece y desaparece
jQuery(document).ready(function() {
jQuery("#IrArriba").hide();
jQuery(function () {
jQuery(window).scroll(function () {
if (jQuery(this).scrollTop() > 200) {
jQuery('#IrArriba').fadeIn();
} else {
jQuery('#IrArriba').fadeOut();
}
});
jQuery('#IrArriba a').click(function () {
jQuery('body,html').animate({
scrollTop: 0
}, 800);
return false;
});
});

});


//Esta funcion es para el efecto del menu principal
var activeEl = 0;
$(function() {
    var items = $('.btn-nav');
    $( items[activeEl] ).addClass('active');
    $( ".btn-nav" ).click(function() {
        $( items[activeEl] ).removeClass('active');
        $( this ).addClass('active');
        activeEl = $( ".btn-nav" ).index( this );
    });
});



//esta funcion es para volver al menu principal desde cada modulo
function volver(){
	if(confirm("Está seguro de volver al menú principal"))
	window.location.href=baseurl+"index.php/inicio/principal";
}