<!-- Sign Up Page - modified from P2 -->

<form method='POST' action='/users/p_signup'>

<div id='signup'>
    
    User Name<br>
    <input type='text' name='user_name'>
    <br><br>

    Email<br>
    <input type='text' name='email'>
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>
   
    
    <?php if(isset($error)): ?>
        <div class='error'>
            Don't leave any fields blank! Try again!
            If you didn't leave fields blank, you may have used an email or user name that already exists.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Sign up' class='btn btn-success start'>

</div>
</form>
