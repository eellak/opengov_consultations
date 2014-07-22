<?php
	$redirs = array();
	
	// Add Redirects Here
	//$redirs['sinthikes'] = '3';
	//$redirs['sinthikes'] = '3';
	//$redirs['sinthikes'] = '3';
	
	if (array_key_exists($_GET[option],$redirs)){
		header("Location: ".URL."/?p=".$redirs[$_GET[option]]);
	}
?>