function checkInput() 
{

	var textBoxList = document.getElementsByClassName("textbox");

	
	for (var i = 0; i < textBoxList.length; i++)
	{
		if (textBoxList[i].value == "")
		{
			window.alert("Please fill out all fields to continue.");
			return false;
		}
	}
}