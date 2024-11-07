<?php
namespace APP;

// include_once( __DIR__.'/app.php' );
include_once(__DIR__ . '/akou/src/ArrayUtils.php');
include_once(__DIR__ . '/SuperRest.php');

use akou\ArrayUtils;

$l = new SuperRest();
$codes = $l->getMethodParams();


$l = new SuperRest();
$codes = $l->getMethodParams();
// Verifica si el formato de impresión es 'single' o 'multiple'
$printFormat = $codes['printFormat'] ?? 'multiple';
$pageBreakClass = $printFormat === 'single' ? 'single-page' : 'multiple-page';
$attributes = [];
$error = '';
foreach ($codes['codes'] as $index => $code) 
{

	$attr_values = "";
	foreach ($code as $key => $value) 
	{
		$attr_values .= ' jsbarcode-' . $key . '="' . urlencode($value) . '"';
	}
	$attributes[] = $attr_values;
}



$version = 30;
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generador de codigos</title>
	<link rel="stylesheet" href="style.css" crossorigin="anonymous">
	<script src="JsBarcode.all.min.js"></script>
	<script src="generator.js?version<?= $version ?>"></script>
	<script src="qrcode.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script> -->

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			var graph_codes = <?= json_encode($codes, JSON_PRETTY_PRINT) ?>;
			window.graph_codes = graph_codes;
			graph_codes['codes'].forEach((code, i) => {
				if (code.format === 'QR') 
				{
					QRCode.toCanvas(document.getElementById('qr_' + i), code.value, {
						width: parseInt(code.height),
						margin: 2,
						errorCorrectionLevel: code.errorCorrectionLevel
					}, (error) => {
						if (error) console.error('Error generando el código QR:', error);
					});
				} else 
				{
					// Código para manejar los códigos de barra
					JsBarcode("#p_" + i, code.value, {
						format: code.format,
						width: parseFloat(code.width),
						height: parseFloat(code.height),
						displayValue: code.displayValue === 'true'
					});
				}
			});
		});
	</script>
</head>

<body>
	<?php if ($error): ?>
		<div>Error: <?= $error ?></div>
	<?php else: ?>
		<?php foreach ($attributes as $i => $attrs): ?>
			<?php if ($codes['codes'][$i]['format'] === 'QR'): ?>
				<div class="qr-container <?= $pageBreakClass ?> ">
					<canvas id="qr_<?= $i ?>" <?= $attrs ?>></canvas>
					<?php if (strlen($codes['codes'][$i]['value']) < 15): ?>
						<div class="serial-text"><?= htmlspecialchars($codes['codes'][$i]['value']) ?></div>
					<?php endif; ?>
				</div>
			<?php else: ?>
				<div class="barcode-container <?= $pageBreakClass ?>">
					<canvas id="p_<?= $i ?>" class="jsbarcode" <?= $attrs ?> width="400" height="200"></canvas>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

</body>

</html>