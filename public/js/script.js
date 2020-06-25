$(document).ready(function(){

    	/*-----------------------------------------------------
	controle le lien activé
	-------------------------------------------------------*/
	$(".nav .nav-item a").click(function(){
		event.preventDefault();
		let lien = $(this).attr('href')
		// $("#default").load(lien)
		$(".nav .nav-item").find(".active").removeClass("active");
		$(this).addClass("active");
	});
	

})