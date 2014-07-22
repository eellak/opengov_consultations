<?php  redirector(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

	<title><?php headtitles(); ?></title>
	
	<link rel="icon" href="<?php echo IMG; ?>/favicon.ico" />
	<link rel="shortcut icon" href="<?php echo IMG; ?>/favicon.ico" />

	<link rel="stylesheet" href="<?php echo ROOT; ?>/style.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="<?php echo JS; ?>/jquery.js" /></script>
	<script type="text/javascript" src="<?php echo JS; ?>/jquery.cookie.js" /></script>
	<script type="text/javascript" src="<?php echo JS; ?>/jquery.textresizer.js" /></script>

	<script type="text/javascript">
	$(document).ready(function(){
	
		$("ul.textresizer a").textresizer({
			target: "#wrapper" 
		});
	});
	</script>
	
	<?php wp_head(); ?>
</head>

<body>
<div id="wrapper">

	<div id="header">
		<div id="headerlogo">
			<img class="logo" src="<?php echo IMG; ?>/logo.jpg">
			<h1><a href="<?php echo URL; ?>/" title="Αρχική"><?php echo NAME; ?></a></h1>
			<h2><?php echo DESCRIPTION; ?></h2>
		</div>	
	</div>
	<div id="main_nav">
		<ul>
			<li><a href="<?php echo URL; ?>/">Αρχική</a></li>
			<li><a href="http://www.primeminister.gov.gr" target="_blank">Πρωθυπουργός της Ελλάδας</a></li>
			<li><a href="http://www.opengov.gr/home" target="_blank">Ανοικτή Διακυβέρνηση</a></li>
			<li><?php echo get_ministry_link(); ?></li>
			<li><a href="<?php echo OPENGOV; ?>/?cat=42" target="_blank">Διαβουλεύσεις Υπουργείων</a></li>
		</ul>
		<div class="texter">
			<ul class="textresizer">
			   <li><a href="#nogo"><img src="<?php echo IMG; ?>/min.gif" title="Μικρά"/></a></li>
			   <li><a href="#nogo"><img src="<?php echo IMG; ?>/mid.gif" title="Μεσαία"/></a></li>
			   <li><a href="#nogo"><img src="<?php echo IMG; ?>/lrg.gif" title="Μεγάλα"/></a></li>
			</ul>
		</div>
	</div>
	<?php global $cnt; echo $cnt;?>
	<div id="content">	
		<?php if((!is_home()) || (!empty($_GET[c])) ){ my_breadcrumb(); } ?>
