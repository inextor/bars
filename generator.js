window.addEventListener('load', initCodes );
window.addEventListener('resize', initCodes );


function initCodes()
{
	let index = 0;
	for(let c of window.grap_codes)
	{
		console.log(c);

		let id = '#p_'+index;
		var barcode = new JsBarcode( id, c.value, c );
	}
}
