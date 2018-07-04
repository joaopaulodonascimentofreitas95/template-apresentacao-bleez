<?php
ob_start(); session_start();
require('config.inc.php');
// require('dts/dbaSis.php');
// require('dts/getSis.php');
// require('dts/setSis.php');
// require('dts/outSis.php');
?>
<!DOCTYPE html>
<html lang="pd-br">
<head>

<?php $Seo = getHeaderPage();?>

	<title><?=$Seo->title;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="base" href="<?=setHome();?>"/>
	<meta name="title" content="<?=$Seo->title;?>" />
 	<meta name="description" content="<?=$Seo->description;?>" />
 	<meta name="keywords" content="<?=$Seo->keywords;?>" />
 	<meta name="author" content="<?=$Seo->author;?>" />   
 	<meta name="url" content="<?=$Seo->url;?>" />  
 	<meta name="language" content="<?=$Seo->language;?>" /> 
 	<meta name="robots" content="<?=$Seo->robots;?>" /> 

<link href="<?php setHome();?>/Assets/fonticon.css" rel="stylesheet" type="text/css" />
<link href="<?php setHome();?>/Assets/css/style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="<?php setHome();?>/tpl/images/favicon.png" />
</head>

<body>

<?php getFileInc('inc/header.php');?>

<?php getHome(); ?>

<?php getFileInc('inc/footer.php');?>

</body>

<?php include('Assets/js/jscSis.php'); ob_end_flush(); ?>

</html>