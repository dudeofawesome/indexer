<?php
	if(strpos($_GET["url"],"..") === false && !is_link($_SERVER['DOCUMENT_ROOT'] . "/public/" . $_GET["url"]))
		unlink($_SERVER['DOCUMENT_ROOT'] . "/public/" . $_GET["url"]);
?>