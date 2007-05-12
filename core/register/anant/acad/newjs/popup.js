function openWin(myURL)
{		window.open(myURL.href, "win"+(new Date()).getSeconds(),'width=600,height=400,resizable=no,scrollbars=yes');
		return false;
}