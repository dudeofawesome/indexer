function confirmDelete (that) {
	// $("#" + that.id).hide();
	// $("#" + that.id.split("-btn")[0]).show();
	document.getElementById(that.id).style.display="none";
	document.getElementById(that.id.split("-btn")[0]).style.display="inline-block";
}

function cancelDelete (that) {
	// $("#" + that.id).show();
	// $("#" + that.id.split("-btn")[0]).hide();
	document.getElementById(that.id).style.display="none";
	document.getElementById(that.id + "-btn").style.display="inline-block";
}

function deleteFile (file) {
	console.log("attempt");
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			//document.getElementById("textContent").innerHTML=xmlhttp.responseText;
			console.log("success" + xmlhttp.responseText);
			// document.getElementById(file).innerHTML = "deleted";
			window.location.reload();
		}
	}
	xmlhttp.open("GET",file,true);
	xmlhttp.send();
}