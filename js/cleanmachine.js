
// Javascript for the chore timer

var timeCircles = $(".choreTimer").TimeCircles({start: false});

$(".start").click(function(){
	$(".choreTimer").TimeCircles().start();
	setTimeout(function(){alert("Time's up! Onto the next one.")},5000);
	});
$(".choreTimer").TimeCircles({count_past_zero: false});
	

// Javascript for recording user activity with place radio buttons

function cleanPlace(frm) {
	var message = "You chose:\n\n"
	for (i=0; i < frm.place.length; i++)
	if (frm.place[i].checked){
		message = "\n" + frm.place[i].value
		break
	}
alert(message);
}


