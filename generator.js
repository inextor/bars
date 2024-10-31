window.addEventListener('load', initCodes ); 
window.addEventListener('resize', initCodes );


function initCodes()
{
	let index = 0;
	/*
		JsBarcode( '.jsbarcode').init();
	*/

	window.graph_codes.codes.forEach((c,index)=>
	{
		JsBarcode('#p_'+index,c.value,c);
	});
}
