<?php

	$current_url=$_SERVER['REQUEST_URI'];
	$min_link = explode('/',$current_url);
	
	$cons = mysql_real_escape_string($_GET['ec']);
	$type = mysql_real_escape_string($_GET['t']);

	if (is_numeric($cons) && $cons>0){
		$filename = $min_link[1].'_comments_'.$cons;
		if ($type == 'xls'){
			get_comments_xls($filename, $cons);
		}
	}
?>