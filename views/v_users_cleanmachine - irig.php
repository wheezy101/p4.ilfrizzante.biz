
	<!-- Five minute countdown timer -->
            <h1><?=$user->user_name?>'s Clean Machine</h1>

            <div class="choreTimer" data-timer="5" >
		<h2>5-Minute Timer</h2>
	    <button class="btn btn-success start">Start</button>
	    </div>

	<div class="places">
		<form name="areas">
		<h2>Places to Clean<h2>
			<table>
			<tr><td><input type='radio' name='place' id='kitchen' value='kitchen' onclick=''>  Kitchen</td></tr>
			<tr><td><input type='radio' name='place' id='bathroom' value='bathroom' onclick=''>  Bathroom</td></tr>
			<tr><td><input type='radio' name='place' id='hallway' value='hallway' onclick=''>  Hallway</td></tr>
			<tr><td><input type='radio' name='place' id='foyer' value='foyer' onclick=''>  Foyer</td></tr>
			<tr><td><input type='radio' name='place' id='livingroom' value='livingroom' onclick=''>  Living Room</td></tr>
			<tr><td><input type='radio' name='place' id='bedroom' value='bedroom' onclick=''>  Bedroom</td></tr>
			<tr><td><input type='radio' name='place' id='familyroom' value='familyroom' onclick=''>  Family Room</td></tr>
			<tr><td><input type='radio' name='place' id='study' value='study' onclick=''>  Study</td></tr>
			<tr><td><input type='radio' name='place' id='laundryroom' value='laundryroom' onclick=''>  Laundry Room</td></tr>
			<tr><td><input type='radio' name='place' id='basement' value='basement' onclick=''>  Basement</td></tr>
			<tr><td><input type='radio' name='place' id='attic' value='attic' onclick=''>  Attic</td></tr>
			</table>
			<br>
			<input type='button' value='Confirm area!' onclick='cleanPlace(this.form)'>
			</form>

	    
