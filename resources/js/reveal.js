// window.sr = ScrollReveal();
// sr.reveal('#myNav',{
// 	duration: 1000,
// 	origin: 'bottom',
// });
// sr.reveal('#about',{
// 	duration: 1500,
// 	origin: 'top',
// });
// sr.reveal('#contact',{
// 	duration: 1500,
// 	origin: 'bottom',
// });

$(function(){
	// smooth scrolling
$('a[href*="#"]:not([href="#"])').click(function(){
	if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
		var target = $(this.hash);
		target = target.length ?  target : $('[name=' + this.hash.slice(1) + ']');
		if(target.length){
			$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	}
});
});
