jQuery(document).ready(function () {
	var anchor = jQuery('.excerpt').find('a').addClass('btn btn-primary').text('Learn More');
	jQuery('<br /><br />').insertBefore(anchor);
});

jQuery('.thumbnail').hover(function() {
	if(jQuery(window).width() > 768) {
		fadeBlurbIn(this);
	}
}, function() {	
	if (jQuery(window).width() > 768) {
		fadeBlurbOut(this);
	}
});

function fadeBlurbIn(sender) {	
	var imgHeight = jQuery(sender).find('img').height();
	jQuery(sender).find('.churchleader').hide(300, function() { });
	jQuery(sender).find('.active-church-leader').css('margin-top', (imgHeight * -1));
	jQuery(sender).find('.active-church-leader').show(300, function() {});
}

function fadeBlurbOut(sender) {	
	jQuery(sender).find('.active-church-leader').hide(300, function() {});
	jQuery(sender).find('.churchleader').show(300, function() {});
}
