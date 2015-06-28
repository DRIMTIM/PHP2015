function clearAllInputs(){
	var inputs = document.getElementsByTagName("input");
	for(var i = 0; i < inputs.length; i++){
		var input = inputs[i];
		input.value = "";
	}
};
function isMobile(){
	var dispositivo = navigator.userAgent.toLowerCase();
	if( dispositivo.search(/iphone|ipod|ipad|android/) > -1 ){return true;}
	return false;
};
function refreshOfertasDelDia(){
	$.ajax({
		url: "ajax/refreshOfertasDelDia",
	}).done(function(data) {
		$("#__contenedor_ofertas").html(data);
		buildCountDown();
	});
};
function buildCountDown(){
	$('.timeLimitOferta').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate).on('update.countdown', function(event) {
			$this.html(event.strftime('Tiempo restante : %H:%M:%S'));
		}).on('finish.countdown', function(event) {
			if(event.target.id){
				refreshOfertasDelDia();
			}
		})
	});
};