function updateValues()
{
	//Create new XML request
	var request = new XMLHttpRequest();

	request.onreadystatechange = function()
	{
		//Checking if request is ready and valid
		if (this.readyState == 4 && this.status == 200)
		{
			document.getElementById("changeThis").innerHTML = this.responseText;
		}
	};

	//Opening request with method and file, then sending
	request.open("GET", "../Controller/updateReading.php", true);
	request.send();
}

setInterval(updateValues, 20000);