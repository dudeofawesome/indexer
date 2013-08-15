<?php
	//ini_set('display_errors',1); 
	//error_reporting(E_ALL);
?>

<?php
	//you can change these settings
	$website_name = "Indexer";
	$website_owner = "John Doe";
	$url_to_logo = "/indexer/resources/logo.png";
	$url_to_favicon = "/indexer/resources/favicon.ico";
	$file_uploading_enabled = true;
	$file_upload_directory = "/public/";
	$sidebar_links = array(
							array("Audio","/audio"),
							array("Documents","/documents"),
							array("Downloads","/downloads"),
							array("Images","/images"),
							array("Public","/public","new!")
						   );
	$protected_folders = array(
								"/protected",
								"/no_go"
							  );
	$server_password = "batterystaple";




	//do not change anything below this line
	$server_root = $_SERVER['DOCUMENT_ROOT'] . "/";

	function getWebsiteName(){
		echo $GLOBALS['website_name'];
	}
	function getWebsiteOwner(){
		echo $GLOBALS['website_owner'];
	}
	function getURLtoLogo(){
		echo $GLOBALS['url_to_logo'];
	}
	function getURLtoFavicon(){
		echo $GLOBALS['url_to_favicon'];
	}
	function getUploadingEnabled(){
		return $GLOBALS['file_uploading_enabled'];
	}
	function getUploadDirectory(){
		return $GLOBALS['file_upload_directory'];
	}
	function getSidebarLinks(){
		return $GLOBALS['sidebar_links'];
	}
	function getProtectedFolders(){
		return $GLOBALS['protected_folders'];
	}
	function getServerRoot(){
		return $GLOBALS['server_root'];
	}
	function getServerPassword(){
		return $GLOBALS['server_password'];
	}
?>
