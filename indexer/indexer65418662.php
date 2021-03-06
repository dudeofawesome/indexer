<?php 
	session_start();
	require($_SERVER['DOCUMENT_ROOT'] . "/indexer/config/settings.php");

	if(!isset($_SESSION['authenticated'])){
		$_SESSION['authenticated'] = false;
		// echo "Please log in";
	}
	
	$current_url = explode("#", $_POST['url'])[0];

	if($current_url!="/"){
		//path to directory to scan
		$directory = explode("/",explode("http://",$current_url)[1])[1] . "/";
		
		$needPassword = false;
		foreach(getProtectedFolders() as $folder){
			if($folder . "/" == "/" . $directory){
				$needPassword = true;
			}
		}
		$permissionToView = false;
		if($needPassword){
			if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']){
				$permissionToView = true;
				echo "<a href='/indexer/logout.php'>Logout</a><br /><br />";
			}
			else if($_POST['pass'] == getServerPassword()){
				$_SESSION['authenticated'] = true;
				$permissionToView = true;
				echo "<a href='/indexer/logout.php'>Logout</a><br /><br />";
			}
		}
		else{
			$permissionToView = true;
		}
		
		if($permissionToView){
			if($directory == explode("/",getUploadDirectory())[1] . "/"){
				echo "<h3>This content does not necessarily reflect the views and opinions of the proprietor.</h3>";
			}
			for ($i = 2;$i < count(explode("/",explode("http://",$current_url)[1]));$i++) {
				if (explode("/",explode("http://",$current_url)[1])[$i] != "#"){
					$directory .= explode("/",explode("http://",$current_url)[1])[$i];
					//if ($i < count(explode("/",explode("http://",$current_url)[1]))) {
						$directory .= "/";
					//}
				}
			}

			//get all folders in directory.
			$folders = glob(getServerRoot() . $directory . "*");

			//print ../ to go up directory
			echo "<a href='../'>../</a> <br /><br />";

			//print each folder name
			foreach($folders as $folder)
			{
				if(is_dir($folder)){
					$folder = explode(getServerRoot() . $directory, $folder)[1];
					echo "<a href='".$folder."'>".$folder."/</a><br />";
				}
			}
			
			echo "<br />";

			//get files in directory.
			$files = glob(getServerRoot() . $directory . "*.*");
			
			//print each file name
			foreach($files as $file)
			{
				if($file!="index.php"){
					$file = explode(getServerRoot() . $directory, $file)[1];
					$extension = explode(".", $file);
					if($extension[1] != "preview"){
						if(file_exists(getServerRoot() . $directory . $extension[0] . ".preview.jpg")){
							echo "<a href='".$file."' class='fileLink' onclick=\"if(event.which == 1){updateFile('".$file."','".$directory."','".$extension[1]."','".$extension[0].".preview.jpg'); return false;}\" onmouseover='genQRcode(\"" . $current_url . $file . "\")' onmouseout='removeQRcode()'>".$file."</a><br />";
						}
						else{
							if($directory == "public//"){
								echo "<a href='".$file."' class='fileLink' onclick=\"if(event.which == 1){updateFile('".$file.",".$directory."'); return false;}\" onmouseover='genQRcode(\"" . $current_url . $file . "\")' onmouseout='removeQRcode()'>" . $file . "</a><a href='#'><span id='" . $file . "-btn' class='deleteBtn' onclick='confirmDelete(this);'></span></a><span id='" . $file . "' class='confirmDeleteControls'>&nbsp;&nbsp;<a href='#' onclick='cancelDelete(this.parentNode);'>no</a> / <a href='#' onclick='deleteFile(\"/indexer/deletePublicFile.php?url=" . explode("/",$file)[0] . "\")'>yes</a></span><br />";
							}
							else{
								echo "<a href='".$file."' class='fileLink' onclick=\"if(event.which == 1){updateFile('".$file."','".$directory."'); return false;}\" onmouseover='genQRcode(\"" . $current_url . $file . "\")' onmouseout='removeQRcode()'>" . $file . "</a><br />";
							}
						}
					}
				}
			}
		}
		else{
			echo "<h3>This content has been hidden from you by the proprietor. If you need a password, you may request one from <a href='mailto:webmaster@" . explode("/",$_POST['url'])[2] . "'>the proprietor</a>.</h3>";
		}
	}
	else{
		echo "<span style='font-size:100px'>Ahhhh... you one tricky guy</span> <span style='font-size:12px'>(or girl)</span>";
	}
?>
