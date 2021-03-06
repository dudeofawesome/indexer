function updateFile (file, location, originalExt, preview) {

	//hide all elements
	document.getElementById("imgContent").style.display="none";
	document.getElementById("videoContent").style.display="none";
	document.getElementById("audioContent").style.display="none";
	document.getElementById("textContent").style.display="none";

	//get file extension
	var extensionArray = file.split(".");
	var hasPreview = false;
	if(extensionArray[1] == "preview"){
		hasPreview = true;
		extension = "." + extensionArray[2];
	}
	else{
		extension = "." + extensionArray[1];
	}

	//check for visibility of preview pane
	if($("#contentLoader").css("display") != "none"){
		//get mime type
		var mimeType = "";
		var getMime;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			getMime = new XMLHttpRequest();
		}
		else{// code for IE6, IE5
			getMime = new ActiveXObject("Microsoft.XMLHTTP");
		}
		getMime.onreadystatechange=function(){
			if (getMime.readyState == 4 && getMime.status == 200){
				mimeType = getMime.responseText;


            //check for image file
//    		if(extension.toLowerCase() == ".jpg" || extension.toLowerCase() == ".jpeg" || 
//    			extension.toLowerCase() == ".png" || extension.toLowerCase() == ".ico" ||
//    			extension.toLowerCase() == ".gif"){
            if(mimeType == "\nimage"){
                document.getElementById("imgContent").src = "";
                document.getElementById("imgContent").src = file;
                if(hasPreview){
                    document.getElementById("imgLink").href = extensionArray[0] + "." + originalExt;
                }
                else{
                    document.getElementById("imgLink").href = file;
                }
                document.getElementById("imgContent").style.display = "inline";
            }
            //check for video file
//            else if(extension.toLowerCase() == ".mp4" || extension.toLowerCase() == ".ogg" || 
//                    extension.toLowerCase() == ".ogv" || extension.toLowerCase() == ".webm"){
            else if(mimeType == "\nvideo"){
                document.getElementById("videoContent").src = file;
                document.getElementById("videoContent").style.display = "inline";
            }
            //check for audio file
//            else if(extension.toLowerCase() == ".mp3" || extension.toLowerCase() == ".wav"
//                    || extension.toLowerCase() == ".aac"){
            else if(mimeType == "\naudio"){
                document.getElementById("audioContent").src = file;
                document.getElementById("audioContent").style.display = "inline";
            }
            //check for text file
            //else if(extension.toLowerCase() == ".txt" || extension.toLowerCase() == ".java" || extension.toLowerCase() == ".js"){
            else if(mimeType == "\ntext"){
                var xmlhttp;
                if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else{// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        var responseText = xmlhttp.responseText.replace("<","&lt;");
                        responseText = responseText.replace(/\n/,"<br />");
                        responseText = responseText.replace(" ","&nbsp;");
                        responseText = responseText.replace(/\t/,"&#09;");
                        document.getElementById("textContent").innerHTML = responseText;
                    }
                }
                xmlhttp.open("GET",file,true);
                xmlhttp.send();

                //document.getElementById("textContent").innerHTML = "Preview not working at this time. Click here to go to file.";
                document.getElementById("textLink").href=file;
                document.getElementById("textContent").style.display="inline";
            }
            else{
                var href = window.location.href.split("#");
                window.location.href = href[0] + file;
            }

            window.history.pushState({"html":file,"pageTitle":file},"", "#" + file);
			}
		}
        getMime.onerror=function(){
            console.log("boom");
        }
        var asdf = "/indexer/getMime.php?f=/" + location + file;
//        asdf = "http://local.indexer/indexer/getMime.php?f=/images//a.js";
		getMime.open("GET",asdf,true);
		getMime.send();

	}
	else{
		var href = window.location.href.split("#");
		window.location.href = href[0] + file;
	}
}

function genQRcode (_file) {
	$("#watermark").stop(true,true);
	$("#imgIcon").stop(true,true);
	$("#imgIcon").qrcode({
		render: 'div',
		width: $("#watermark").width(),
		height: $("#watermark").height(),
		/*color: '#FF7C00',*/
		color: '#000',
		text: _file
	});
	$("#watermark").fadeOut(500);
	$("#imgIcon").fadeIn(500);
}

function removeQRcode () {
	$("#imgIcon").stop(true,true);
	$("#watermark").stop(true,true);
	$("#imgIcon").fadeOut(500,function () {
		$("#imgIcon").empty();
	});
	$("#watermark").fadeIn(500);
}
