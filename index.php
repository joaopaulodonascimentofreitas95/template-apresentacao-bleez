<?php
	require_once(__DIR__."/config.inc.php");
	$url = getUrl();
?>
<!DOCTYPE>
<html lang="pt_br">
<head>
    <title><?=getInformationPage()["page_title"];?></title>
    <meta name="description" content="<?=getInformationPage()["page_description"];?>"/>
    <?php getFilesCss();?>  

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">  
</head>
<body>

<?php
require_once __DIR__ . '/_theme/main/header.inc.php';

$listProducts = getNameProducts();


if(!empty($url[0]) && $url[0] == 'list'):
    require __DIR__ . '/_theme/main/list.php';

elseif(!empty($url[0]) && ($url[0] == 'produto') && !empty($url[1])):

	if(!empty($url[1]) && $url[1] == 'create' && file_exists("_theme/main/{$url['0']}/{$url['1']}.php")):
		require __DIR__ . "/_theme/main/{$url['0']}/{$url['1']}.php";
	endif;
	
	if(!empty($url['1']) && in_array($url['1'], $listProducts)):
		require __DIR__ . "/_theme/main/produto/{$url['0']}.php";
	endif;

else :
    require __DIR__ . '/_theme/main/index.php';
endif;

require_once __DIR__ . '/_theme/main/footer.inc.php';

?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" crossorigin="anonymous"></script>
<script src="Assets/js/scripts.js"></script>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>