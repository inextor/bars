window.addEventListener('load', initCodes );	
window.addEventListener('resize', initCodes );


function initCodes()
{
	let graphs = document.querySelectorAll('.code');

	for(let c of codes)
	{
		let id = c.getAttribute('id');
	}

	var barcode = new JsBarcode('code', 
	{
		format: 'CODE128',
		text: '1234567890123',
		font: 'courier',
		height: 100,
		width: 100,
		displayValue: true,
		background: '#ffffff',
		foreground: '#000000'
	});

}
