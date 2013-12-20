<h1><?=$user->user_name?>'s Clean Machine</h1>
            
<?php foreach($history as $mini): ?>

<article>

    <h1><?=$mini['place']?>  posted:</h1>

    <p><?=$mini['place']?></p>

    <time datetime="<?=Time::display($mini['completed'],'Y-m-d G:i')?>">
        <?=Time::display($mini['completed'])?>
    </time>

</article>

<?php endforeach; ?>

            

