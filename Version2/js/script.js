$(document).ready(function() {
	var classes = new Array();
	classes[0] = "project";
	classes[1] = "photo";
	classes[2] = "contact";
  classes[3] = "blog";

	for (var i = 0; i < classes.length; i++ ) {
		$("." + classes[i]).hide();
	}

	$('.button').click(function() {
		for (var i = 0; i < classes.length; i++ ) {
			$("." + classes[i]).hide();
		}
		var div = $(this).attr("id");
		$("." + div).show();
    $('html, body').animate({scrollTop:$("." + div).position().top}, 'slow');
	});
});
