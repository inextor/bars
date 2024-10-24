<?php
namespace APP;

include_once( __DIR__.'/app.php' );
include_once( __DIR__.'/akou/src/ArrayUtils.php');
include_once( __DIR__.'/SuperRest.php');

use akou\ArrayUtils;


$l = new SuperRest();
$codes = $l->getMethodParams();
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generador de codigos</title>
	<link rel="stylesheet" href="style.css" crossorigin="anonymous">
	<script src="JsBarcode.all.min.js"></script>
	<script src="generator.js"></script>
	<script>
		var grap_codes = <?=json_encode($codes, JSON_PRETTY_PRINT)?>;
	</script>
</head>
<body>
<?php if($error):?>
	<div>Error: <?=$error?></div>
<?php else:?>
	<?php foreach($codes as $index=>$code):?>
	<div class="page">
		<canvas id="p_<?=$index?>" width="400" height="200"></canvas>
	</div>
	<?php endforeach;?>
<?php endif;?>
</body>
</html>
