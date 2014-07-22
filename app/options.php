<?php
	
	function getOptions() {
		$options = get_option('consultation_options');
		if (!is_array($options)) {
			$options['cat_close'] = '';
			$options['cat_open'] = '';
			$options['cat_results'] = 0;
			$options['footer_content'] = '';
			$options['analytics_content'] = '';
			$options['rss_feed'] = '';
			$options['rss_feed_num'] = '';
			$options['rss_feed_title'] = '';
			update_option('consultation_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['cons_opt_save'])) {
			$options = getOptions();

			$options['cat_close'] = $_POST['cat_close'] ;
			$options['cat_open'] = $_POST['cat_open'] ;
			$options['cat_results'] = $_POST['cat_results'] ;
			
			// RSS
			$options['rss_feed'] = stripslashes($_POST['rss_feed']);
			$options['rss_feed_num'] = stripslashes($_POST['rss_feed_num']);
			$options['rss_feed_title'] = stripslashes($_POST['rss_feed_title']);

			// footer
			$options['footer_content'] = stripslashes($_POST['footer_content']);
			
			// analytics
			$options['analytics_content'] = stripslashes($_POST['analytics_content']);

			update_option('consultation_options', $options);

		} else {
			getOptions();
		}

	}

	function display() {
		$options = getOptions();
?>

<form action="#" method="post" enctype="multipart/form-data" name="blocks_form" id="blocks_form">
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Ρυθμίσεις Διαβουλεύσεων</h2>
		
		<p class="submit"><input class="button-primary" type="submit" name="cons_opt_save" value="Αποθήκευση" /></p>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Ειδικές Κατηγορίες</th>
					<td>
						 <?php $catz = get_categories('hide_empty=0'); ?>
						
						<select name="cat_open"  style="width:250px;">
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
							<?php foreach ($catz as $cat){
								if(strlen($cat->name)<30) {
									if ($cat->term_id == $options['cat_close']) {
										  echo '<option value="'.$cat->term_id.'" selected="selected">'.$cat->name.'</option>';	  
									} else {
									  echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';	 
									}
								}
							} ?>
						</select> - Κλεισίματος<br />
						
						<select name="cat_results"  style="width:250px;">
							<option value="0" <?php if (get_option('cat_results') == 0) { echo 'selected="selected"'; }?>>--Καμία--</option>';	 	
							<?php foreach ($catz as $cat){
								if(strlen($cat->name)<30) {
									if ($cat->term_id == $options['cat_results']) {
										  echo '<option value="'.$cat->term_id.'" selected="selected">'.$cat->name.'</option>';	  
									} else {
									  echo '<option value="'.$cat->term_id.'">'.$cat->name.'</option>';	 
									}
								}
							} ?>
						</select> - Αποτελέσματα
					</td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Τροφοδοσία RSS</th>
					<td>
						<input type="text" name="rss_feed_title" id="rss_feed_title" class="code" size="40" value="<?php echo($options['rss_feed_title']); ?>">Τίτλος
						<br />
						<input type="text" name="rss_feed" id="rss_feed" class="code" size="40" value="<?php echo($options['rss_feed']); ?>">RSS URL 
						<br />
						<select name="rss_feed_num" size="1">
							<option value="1" <?php if($options['rss_feed_num'] == 1) echo ' selected '; ?>>1</option>
							<option value="2" <?php if($options['rss_feed_num'] == 2) echo ' selected '; ?>>2</option>
							<option value="3" <?php if($options['rss_feed_num'] == 3) echo ' selected '; ?>>3</option>
							<option value="4" <?php if($options['rss_feed_num'] == 4) echo ' selected '; ?>>4</option>
							<option value="5" <?php if($options['rss_feed_num'] == 5) echo ' selected '; ?>>5</option>
							<option value="6" <?php if($options['rss_feed_num'] == 6) echo ' selected '; ?>>6</option>
						</select>Αριθμός Προβαλλόμενων Άρθρων 
						<br />
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Footer<br/><small style="font-weight:normal;">HTML enabled</small></th>
					<td>
						<label>
							<textarea name="footer_content" cols="50" rows="10" id="footer_content" class="code" style="width:98%;font-size:12px;"><?php echo($options['footer_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Analytics</th>
					<td>
						<label>
							<textarea name="analytics_content" cols="50" rows="10" id="analytics_content" class="code" style="width:98%;font-size:12px;"><?php echo($options['analytics_content']); ?></textarea>
						</label>
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
