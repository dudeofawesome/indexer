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
	$css_font_face = "@font-face{ font-family: Agency; src: url('/indexer/resources/agency.ttf'), url('/indexer/resources/agency.eot');}";
	$main_color = "#37B6CE"; // aka background color (you can use any color profile you want (rgb, rgba, hex))
	$secondary_color = "#FF7C00"; // aka forground color (you can use any color profile you want (rgb, rgba, hex))
	$font_main_color = "rgb(255,255,255)"; // (you can use any color profile you want (rgb, rgba, hex))
	$font_secondary_color = "rgb(61,255,247)"; // aka a:hover color color (you can use any color profile you want (rgb, rgba, hex))

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
	function getCSSfontFace(){
		echo $GLOBALS['css_font_face'];
	}
	function getMainColor(){
		echo $GLOBALS['main_color'];
	}
	function getSecondaryColor(){
		echo $GLOBALS['secondary_color'];
	}
	function getFontMainColor(){
		echo $GLOBALS['font_main_color'];
	}
	function getFontSecondaryColor(){
		echo $GLOBALS['font_secondary_color'];
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
