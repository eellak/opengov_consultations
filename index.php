<?php 
	get_header();
	if (!empty($_GET[c])){
		include(TEMPLATEPATH."/comments_single.php");
	}
	else if (!empty($_GET[preview])){
		include(TEMPLATEPATH."/page_preview.php");
	}
	else {
	$options = get_option('consultation_options');
?>
	<div id="main_content">
		<ul class="index_selection">
			<li class="all<?php if(empty($_GET[type])) echo ' selected"'; ?>"><a href="<?php echo URL; ?>/">Όλες οι Διαβουλεύσεις</a></li>
			<li class="open<?php if($_GET[type]=='open') echo ' selected"'; ?>"><a href="<?php echo URL; ?>/?type=open">Ανοικτές σε Σχολιασμό</a></li>
			<li class="closed<?php if($_GET[type]=='closed') echo ' selected"'; ?>"><a href="<?php echo URL; ?>/?type=closed">Πρός Επεξεργασία</a></li>
			<li class="done<?php if($_GET[type]=='done') echo ' selected"'; ?>"><a href="<?php echo URL; ?>/?type=done">Ολοκληρωμένες</a></li>
		</ul>
		<div class="index_list">
			<?php get_consultations_list_index();	?>
		</div>			
	</div>	
</div>
<?php 
	}
	get_footer(); 
?>