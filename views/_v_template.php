<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

	<!-- Common CSS/JSS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/TimeCircles.css" >
        <link rel="stylesheet" href="/css/cleanmachine.css" > 
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
	<div id='wrapper'>
		    <div id='menu'>

      <a href='/'>Home</a>

        <!-- Menu for users who are logged in -->
       <?php if($user): ?>

            <a href='/users/logout'>Logout</a>
            <a href='/users/cleanplaces'>My Clean Places</a>
            <a href='/history/cleanhistory'>My Clean History</a>

        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>Sign up</a>
            <a href='/users/login'>Log in</a>

        <?php endif; ?>

    </div>


	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
<!--	-->
	<script type="text/javascript" src="/js/TimeCircles.js"></script>
        <script type="text/javascript" src="/js/cleanmachine.js"></script>
	
		    </div>
</body>
</html>
