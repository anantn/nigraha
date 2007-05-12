function doSubmitOnce(currentForm)
{
	// Run through elements and disable submit buttons
	for(i=0;i<currentForm.length;i++)
	{
		var currentElement = currentForm.elements[i];
		if(currentElement.type.toLowerCase() == "submit")
			currentElement.disabled = true;
	}
}


// We need to register our submit once function on all forms
if(document.all||document.getElementById) 
{	
	// Run through all forms on page
	for(i=0;i<document.forms.length;i++)
	{
		var currentForm = document.forms[i];
		// Register event handler
		// Use quirksmode idea for flexible registration by copying existing events
		var oldEventCode = (currentForm.onsubmit) ? currentForm.onsubmit : function () {};
		currentForm.onsubmit = function () {oldEventCode(); doSubmitOnce(currentForm)};
	}
}