<?php
	
	function getOptions() {
		$options = get_option('consultation_comment_options');
		if (!is_array($options)) {
			$options['cat_close'] = '';
			$options['cat_open'] = '';
			$options['cat_announcements'] = '';
			update_option('consultation_comment_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['cons_opt_save'])) {
			$options = getOptions();

			$options['cat_close'] = $_POST['cat_close'] ;
			$options['cat_open'] = $_POST['cat_open'] ;
			$options['cat_announcements'] = $_POST['cat_announcements'] ;
			
			// RSS
			$options['rss_feed'] = stripslashes($_POST['rss_feed']);
			$options['rss_feed_num'] = stripslashes($_POST['rss_feed_num']);
			$options['rss_feed_title'] = stripslashes($_POST['rss_feed_title']);

			// footer
			$options['footer_content'] = stripslashes($_POST['footer_content']);
			
			// analytics
			$options['analytics_content'] = stripslashes($_POST['analytics_content']);

			update_option('consultation_comment_options', $options);

		} else {
			getOptions();
		}

	}

	function display() {
		$options = getOptions();
?>

<form action="#" method="post" enctype="multipart/form-data" name="blocks_form" id="blocks_form">
	<div class="wrap">
		<div class="icon32" id="icon-users"><br></div>
		<h2>Ρυθμίσεις Σχολιασμού</h2>
		
		<p class="submit"><input class="button-primary" type="submit" name="cons_opt_save" value="Αποθήκευση" /></p>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Ειδικές Κατηγορίες</th>
					<td>
						 
						<select name="cat_announcements"  style="width:250px;">
							<option value="0" <?php if (get_option('cat_announcements') == 0) { echo 'selected="selected"'; }?>>--Καμία--</option>';	 
							<?php $catz = get_categories(); ?>
							<?php foreach ($catz as $cat){
								if(strlen($cat->name)<30) {
									if ($cat->term_id == $options['cat_announcements']) {
										  echo '<option value="'.$cat->term_id.'" selected="selected">'.$cat->name.'</option>';	  
									} else {
									  echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';	 
									}
								}
							} ?>
						</select> - Ανακοινώσεις<br />
						
						<select name="cat_open"  style="width:250px;">
							<option value="0" <?php if (get_option('cat_open') == 0) { echo 'selected="selected"'; }?>>--Καμία--</option>';	 
							<?php $catz = get_categories(); ?>
							<?php foreach ($catz as $cat){
								if(strlen($cat->name)<30) {
									if ($cat->term_id == $options['cat_open']) {
										  echo '<option value="'.$cat->term_id.'" selected="selected">'.$cat->name.'</option>';	  
									} else {
									  echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';	 
									}
								}
							} ?>
						</select> - Εισαγωγική <br />
						 
						<select name="cat_close"  style="width:250px;">
							<option value="0" <?php if (get_option('cat_close') == 0) { echo 'selected="selected"'; }?>>--Καμία--</option>';	 
							<?php $catz = get_categories(); ?>
							<?php foreach ($catz as $cat){
								if(strlen($cat->name)<30) {
									if ($cat->term_id == $options['cat_close']) {
										  echo '<option value="'.$cat->term_id.'" selected="selected">'.$cat->name.'</option>';	  
									} else {
									  echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';	 
									}
								}
							} ?>
						</select> - Κλεισίματος
					</td>
				</tr>
			</tbody>
		</table>
			
		
		<p class="submit">
			<input class="button-primary" type="submit" name="cons_opt_save" value="Αποθήκευση" />
		</p>
	</div>

</form>

<?php
	}
	if(isset($_POST['cons_opt_save'])) {
		add();
	}
display();



?>
