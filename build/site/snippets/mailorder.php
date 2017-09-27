Von: <?= $full_name ?> (<?= $email ?>)

<?= $nachricht ?>

----
Weitere Informationen:

Telefon: <?= $email ?>
Datum: <?= $datum ?>
Art: <?= $art ?>
Vegan: <?php e($vegan == '', '👍', '👎') ?>
<?php echo $vegan ?>
