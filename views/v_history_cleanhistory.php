<h1><?=$user->user_name?>'s Clean Machine</h1>

<h2>Here is your cleaning history!</h2>
            
<?php foreach($history as $mini): ?>

<article>
    
    <br>
    <p>
        You cleaned for 5 minutes in the <?=$mini['place']?> on <time datetime="<?=Time::display($mini['completed'],'Y-m-d G:i')?>"><?=Time::display($mini['completed'])?></time>
    </p>

</article>

<?php endforeach; ?>
 

