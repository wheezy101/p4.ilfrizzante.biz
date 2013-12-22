<!-- Log In View - Modified from P2 -->

<form method='POST' action='/users/p_login'>

<div id='login'>
    Email<br>
    <input type='text' name='email'>    
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password and try again!
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in' class="btn btn-success start"'>

</div>

</form>
