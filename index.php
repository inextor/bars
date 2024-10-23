<?php
namespace APP;

include_once( __DIR__.'/app.php' );
include_once( __DIR__.'/akou/src/ArrayUtils.php');
include_once( __DIR__.'/SuperRest.php');

use akou\ArrayUtils;


$l = new SuperRest();
$params = $l->getMethodParams();



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generador de codigos</title>
	<link rel="stylesheet" href="style.css" crossorigin="anonymous">
	<script src="JsBarcode.all.min.js"></script>
	<script src="generator.js"></script>
</head>
<body>
<?if($error):?>
	<div>Error: <?=$error?></div>
<?else:?>
	<div class="page">
	<?foreach($params as $code):?>
		
	<?endfor;?>
	</div>
<?endif;?>
</body>
</html>
