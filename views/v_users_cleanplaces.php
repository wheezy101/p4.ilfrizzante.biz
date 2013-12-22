<h1><?=$user->user_name?>'s Clean Machine</h1>

<div class="places">

    <form name="areas" method='POST' action='/users/p_cleanplaces'>

	<!--List the places the user can choose to do their cleaning-->

	<h2>Choose a Place to Clean<h2>

	<table>
	<tr><td><input type='radio' name='place' id='kitchen' value='kitchen'>  Kitchen</td></tr>
	<tr><td><input type='radio' name='place' id='bathroom' value='bathroom'>  Bathroom</td></tr>
	<tr><td><input type='radio' name='place' id='hallway' value='hallway'>  Hallway</td></tr>
	<tr><td><input type='radio' name='place' id='foyer' value='foyer'>  Foyer</td></tr>
	<tr><td><input type='radio' name='place' id='livingroom' value='livingroom'>  Living Room</td></tr>
	<tr><td><input type='radio' name='place' id='bedroom' value='bedroom'>  Bedroom</td></tr>
	<tr><td><input type='radio' name='place' id='familyroom' value='familyroom'>  Family Room</td></tr>
	<tr><td><input type='radio' name='place' id='study' value='study'>  Study</td></tr>
	<tr><td><input type='radio' name='place' id='laundryroom' value='laundryroom'>  Laundry Room</td></tr>
	<tr><td><input type='radio' name='place' id='basement' value='basement'>  Basement</td></tr>
	<tr><td><input type='radio' name='place' id='attic' value='attic'>  Attic</td></tr>
	</table>

	<?php if(isset($error)): ?>
	    <div class='error'>
            Please choose a place to clean! 
	    </div>
	    <br>
	<?php endif; ?>

    
    <br>
    <!--Imput choice into SQL table when button is pressed-->
    <input type='submit' value='Confirm place!' class='btn btn-success start'>
    
    </form>

</div>
