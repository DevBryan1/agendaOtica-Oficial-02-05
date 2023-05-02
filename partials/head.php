<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$GLOBALS['head']['title'];?></title>
    <link rel="stylesheet" href="assets/frames/fonticons/css/all.min.css">
    <?php foreach($GLOBALS['css'] as $c){ ?>
        <link rel="stylesheet" href="<?=$c['attr'];?>?=<?=time();?>">
    <?php } ?>
</head>
<script src="https://kit.fontawesome.com/ca7955397c.js" crossorigin="anonymous"></script>
<body>
<div class="site-completo">
    