
// Javascript for the chore timer

var timeCircles = $(".choreTimer").TimeCircles({start: false});

$(".start").click(function(){
	$(".choreTimer").TimeCircles().start();
	setTimeout(function(){alert("Time's up! Onto the next one.")},5000);
	});

$(".choreTimer").TimeCircles({count_past_zero: false});
	
