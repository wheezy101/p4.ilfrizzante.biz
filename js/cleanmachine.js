
// Javascript for the chore timer

var timeCircles = $(".choreTimer").TimeCircles({start: false});

$(".start").click(function(){
	$(".choreTimer").TimeCircles().start();
	setTimeout(function(){alert("Time's up! Choose another place to clean by clicking on the Places to Clean link.")},300000);
	});

$(".choreTimer").TimeCircles({count_past_zero: false});
	
