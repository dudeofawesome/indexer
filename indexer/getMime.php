<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/indexer/config/settings.php");

	echo explode("/",mime_content_type(getServerRoot() . $_GET['f']))[0];
?>