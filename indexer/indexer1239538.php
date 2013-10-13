<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/indexer/config/settings.php"); 

	session_start();
	if(!isset($_SESSION['authenticated'])){
		$_SESSION['authenticated'] = false;
		echo "nope nope nope";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo getWebsiteOwner();?></title>

		<link rel='shortcut icon' href=<?php echo getURLtoFavicon();?> >
		<link rel="stylesheet" type="text/css" href="/indexer/style.php">

		<script type="text/javascript" src="/indexer/layoutSetup.js"></script>
		<script type="text/javascript" src="/indexer/previewLoad.js"></script>
		<script type="text/javascript" src="/indexer/jquery.js"></script>
		<script type='text/javascript' src='/indexer/deletePublicFile.js'></script>
		<script type="text/javascript" src="/indexer/jquery.qrcode-0.3.min.js"></script>

		<meta name="viewport" content="width=320,user-scalable=false" />
	</head>
	<body>
		<?php if($_SESSION['authenticated']){echo "true true true";} ?>
		<?php
			$protectedFolders = "";
			foreach(getProtectedFolders() as $folder){
				$protectedFolders .= $folder . ",";
			}
		?>
		<script type="text/javascript">
			var pass = "null";
			var protectedFolders = "<?php echo $protectedFolders;?>".split(",");
			var directory = window.location.href.split("#")[0].split("http://")[1].split("/")[1] + "/";
			for(var i = 0; i < protectedFolders.length; i++){
				if(protectedFolders[i] + "/" == "/" + directory && !<?php if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){ echo "true"; } else{ echo "false"; } ?>){
					//request password
					pass = prompt('Please input your password');
				}
			}
			
			var xmlhttp;
			if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			else{// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("content").innerHTML=xmlhttp.responseText;
					layoutSetup();
				}
			}
			xmlhttp.open("POST","/indexer/indexer65418662.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("url=" + window.location.href + "&pass=" + pass);
			//xmlhttp.send("url=" + window.location.href);
		</script>
		<header>
			<div id="headBar" class="headBar">
				<span id="currentLocation" class="currentLocation">
					<script type="text/javascript">
						var _string = "";
						var _url = window.location.href.split("http://")[1];
						var _urlSplit = _url.split("/")
						for (var i = 0; i < _urlSplit.length; i++) {
							var _urlToThisPoint = "http:/";
							for (var j = 0; j <= i; j++) {
								if (_urlSplit[j] != "#"){
									_urlToThisPoint += "/" + _urlSplit[j];
								}
							}
							_string += "/<a href='" + _urlToThisPoint + "'>" + _urlSplit[i] + "</a>";
						};
						_string += " <b>&gt;<b>";
						document.getElementById("currentLocation").innerHTML = _string;
					</script>
				</span>
				<span id="siteName" class="siteName">
					<script type="text/javascript">
						document.getElementById("siteName").innerHTML = "<a href='/'>" + window.location.href.split("/")[2] + "</a>";
					</script>
				</span>
			</div>
			<div id="title" class="title">
				<?php echo getWebsiteName();?>
			</div>
		</header>

		<div id="leftNav" class="leftNav">
			<div class="menu">
				<div class="links">
					<a href="/">Home</a><br /><br />
					<?php
						$links = getSidebarLinks();
						for($i = 0;$i < count($links);$i++){
							if(count($links[$i]) == 2)
								echo "<a href=" . $links[$i][1] . ">" . $links[$i][0] . "</a><br />";
							else
								echo "<a href=" . $links[$i][1] . ">" . $links[$i][0] . "&nbsp;<h4 style='display: inline;color: rgb(61,255,247);'>" . $links[$i][2] . "</h4></a><br />";
						}
					?>
				</div>
				<div class="bottom">
					<form id="upload" action="/indexer/uploadFile.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend>Upload Files</legend>
							<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="26214400" />
							<div>
								<label for="fileselect">Must be &le; 25mb</label>
								<input type="file" id="fileselect" name="uploadedfile[]" multiple style="width: 187px;"/>
							</div>
							<div id="submitbutton">
								<button type="submit">Upload Files</button>
							</div>
						</fieldset>
					</form>
					<div id="progress"></div>
					<!-- // <script src="/indexer/filedrag.js"></script> -->
				</div>
			</div>
			<div id="leftNavTab" class="leftNavTab">
				&gt;
			</div>
		</div>

		<div id="content" class="content insetBox">
		</div>

		<div id="copyright" class="copyright rotate90CW" style="bottom: 83px;left: 499px;">
		  <a href="http://orleans.pl" style="text-decoration:none;">&copy;2013 Louis Orleans</a>
		</div>

		<div id="contentLoader" class="contentLoader insetBox">
			<a id="imgLink" href="#">
				<img id="imgContent" src="" class="imgContent" />
			</a>
			<video id="videoContent" width="640" height="480" controls="controls" class="vidContent" style="display:none;">
				Your browser does not support the video tag.
			</video>
			<audio id="audioContent" controls="controls" class="audContent" style="display:none;">
				Your browser does not support the audio tag.
			</audio>
			<a id="textLink" href="#">
				<div id="textContent" style="display:none;">
					There is no text here.
				</div>
			</a>
 		</div>

		<footer>
			<div id="imgIcon" class="imageIcon">

			</div>
			<a href="/">
				<img src=<?php echo getURLtoLogo();?> id="watermark" class="watermark" />
		</footer>
			</a>
	</body>
</html>
