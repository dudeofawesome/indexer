<?php 
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	require($_SERVER['DOCUMENT_ROOT']."/indexer/config/settings.php");

	$file = $_FILES["uploadedfile"];

	if(getUploadingEnabled()){
		$target_path = getUploadDirectory();
		// foreach($file['tmp_name'] as $file){
		for($i = 0; $i < count($file['tmp_name']); $i++){
			if($file["size"][$i] == 0){
				echo "file appears to have failed to transfer<br />";
			}
			else if($file["size"][$i] < 26214400 && $file["name"][$i] != ".htaccess"){

				if(move_uploaded_file($file['tmp_name'][$i], getServerRoot().$target_path.$file['name'][$i])){
					echo "<br />".$file['tmp_name'][$i]."&nbsp;&nbsp;&nbsp;".$target_path.$file['name'][$i]."<br />";
					echo $file["error"][$i]."<br />";
				}
				else{
					// header("location:/indexer/failure.php");
					echo "failed to move file<br />error code 000";
					echo "<br />".$file['tmp_name'][$i]."&nbsp;&nbsp;&nbsp;".$target_path.$file['name'][$i]."<br />";
					echo $file["error"][$i]."<br />";
				}
			}
			else{
				// header("location:/indexer/failure.php");
				echo "file too large<br />error code 001<br />size:".$file["size"][$i]."<br />";
			}
		}
		header("location:".$target_path);
	}
	else{
		header("location:/");
	}
?>
