<!-- footer.php-->
	<?php $options = get_option('consultation_options'); ?>
		<div id="footer"> 
			<div class="left_footer">
				<a href="<?php echo URL; ?>"><?php echo NAME; ?></a> <br />
				<em><?php echo DESCRIPTION; ?></em><br />
				<a href="<?php echo OPENGOV; ?>" target="_blank">OpenGov.gr</a> Ανοικτή Διακυβέρνηση 
			</div>
			<div class="middle_footer">
				<a href="<?php echo OPENGOV; ?>/?page_id=337" target="_blank">Όροι Χρήσης</a></a><br />
				<a href="<?php echo OPENGOV; ?>/?page_id=337" target="_blank">Πολιτική Προστασίας Δεδομένων</a></a><br />
				<a href="<?php echo OPENGOV; ?>/?page_id=312" target="_blank">Πλαίσιο Διαλόγου</a>
			</div>
			<div class="right_footer">
			<a href="http://creativecommons.org/licenses/by/3.0/gr/" target="_blank">Creative Commons License</a><br />
			<a href="http://creativecommons.org/licenses/by/3.0/gr/" target="_blank"><img src="<?php echo IMG; ?>/cc.png"></a><br />
			Με Χρήση του ΕΛ/ΛΑΚ λογισμικού <a href="http://www.wordpress.org" target="_blank">Wordpress</a>.
			</div>
			<?php echo $options['footer_content']; ?>
		</div>
	</div>
</div>
<?php 
	wp_footer(); 
	show_wp_stats();
	echo $options['analytics_content'];
?>
</body>
</html>