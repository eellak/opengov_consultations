<?php 
	$defaultmonth = date('m');
	$defaultday = date('d');
	$defaulthour = date('H');
	$defaultyear = date('Y');
	$defaultminute = date('i'); 
	/*
	if ($defaultmonth==12) {
		$defaultmonth=01;
	}else{
		$defaultmonth++;
	}
	*/
?>
<div class="wrap">
	<div class="icon32" id="icon-edit-pages"><br></div>
	<h2>Νέα Διαβούλευση</h2>
	
	<?php if(isset($_POST['consultation_save'])) { ?>
		<div class="updated fade below-h2" id="message"><p>
			<?php 
				$result=check_consultation(); 
				$cns = explode('@', $result);
				$cons = $cns[0];
				?>
			<?php if ($cons == 5) {	?>
			
				H Διαβούλευση <strong>ΔΕΝ</strong> προστέθηκε!
				<br /><br />O Τίτλος είναι Μικρός (πρέπει να είναι πάνω απο <strong>20</strong> χαρακτήρες). 
				<br /><br />Εισάγατε:
				<br /><em>"<?php echo $_POST['c_title']; ?>"</em>
			
			<?php } elseif ($cons == 4) {	?>
			
				H Διαβούλευση <strong>ΔΕΝ</strong> προστέθηκε!
				<br /><br />Δεν έχετε εισάγει αριθμό σχολιάσιμων άρθρων ή δεν εισάγατε αριθμητικό.
			
			<?php } elseif ($cons == 3) {	?>
			
				H Διαβούλευση Προστέθηκε!
				<br /><br />Εισάγατε πάνω απο 100 σχολιάσιμα άρθρα (<?php echo $_POST['c_num']; ?>) : <em>"Προσοχή!"</em>
			
			<?php } elseif ($cons == 2) {	?>
			
				H Διαβούλευση Προστέθηκε!
				<br /><br />H Ημερομηνία Έναρξης/Λήξης ήταν Παρελθούσα<br />
				- Έναρξη: 
				<?php 	echo $_POST['startdate_day'].'/'; 
						echo $_POST['startdate_month'].'/';
						echo $_POST['startdate_year'].' @ ';
						echo $_POST['startdate_hour'].':';
						echo $_POST['startdate_minute'];
				?><br />
				- Λήξη :
				<?php 	echo $_POST['expirationdate_day'].'/'; 
						echo $_POST['expirationdate_month'].'/';
						echo $_POST['expirationdate_year'].' @ ';
						echo $_POST['expirationdate_hour'].':';
						echo $_POST['expirationdate_minute'];
				?><br />
				<em> Ορίστηκε Αυτόματα  
				<?php //echo $defaultday.'/'.$defaultmonth.'/'.$defaultyear.' @ '.$defaulthour.':'.$defaultminute ?>"</em> 
				
			<?php } else { ?>	
				H Διαβούλευση Προστέθηκε!
			<?php } 
				if ($cons<4) { ?>
					<br /><br />
					<a href="<?php echo URL; ?>/wp-admin/edit.php?cat=<? echo $cns[1]; ?>">Προσθέστε Περιεχόμενο</a> &raquo;
					<br /><br />
					<a href="<?php echo URL; ?>/wp-admin/admin.php?page=dlm_addnew&cat=<? echo $cns[1];  ?>">Ανεβάστε Συνοδευτικά Αρχεία</a> &raquo;
					<?php /* <br /><br />
					<a href="<?php echo URL; ?>/wp-admin/admin.php?page=edit-consultation-handle&cons=<? echo $cns[1]; ?>">Επεξεργαστείτε τη Διαβούλευση</a> &raquo; */ ?>
					<br /><br /></strong>
					<a href="<?php echo URL; ?>/?preview=<? echo $cns[1]; ?>">Προεπισκόπηση της Διαβούλευσης</a> &raquo;</strong>
			<?php } ?>
		</p></div>
	<?php	} ?>

	<form action="#" method="post" enctype="multipart/form-data" name="consultation_form" id="blocks_form">
	
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Τίτλος Διαβούλευσης</th>
					<td><textarea name="c_title" id="c_title" class="code" cols="50" rows="2" style="width:98%;font-size:12px;"></textarea></td>
				</tr>				
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Αριθμός Άρθρων</th>
					<td><input type="text" name="c_num" id="c_num" class="code" size="3" value=""> <em>Αριθμός</em></td>
				</tr>				
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Ημερομηνία Έναρξης</th>
					<td>
						<input type="text" size="2" value="<?php echo $defaultday; ?>" name="startdate_day" id="startdate_day" >,

						<select id="startdate_month" name="startdate_month">
							<option value="01" <?php if($defaultmonth=='01') echo 'selected="selected"'; ?>>Ιανουαρίου</option>
							<option value="02" <?php if($defaultmonth=='02') echo 'selected="selected"'; ?>>Φεβρουαρίου</option>
							<option value="03" <?php if($defaultmonth=='03') echo 'selected="selected"'; ?>>Μαρτίου</option>
							<option value="04" <?php if($defaultmonth=='04') echo 'selected="selected"'; ?>>Απριλίου</option>
							<option value="05" <?php if($defaultmonth=='05') echo 'selected="selected"'; ?>>Μαΐου</option>
							<option value="06" <?php if($defaultmonth=='06') echo 'selected="selected"'; ?>>Ιουνίου</option>
							<option value="07" <?php if($defaultmonth=='07') echo 'selected="selected"'; ?>>Ιουλίου</option>
							<option value="08" <?php if($defaultmonth=='08') echo 'selected="selected"'; ?>>Αυγούστου</option>
							<option value="09" <?php if($defaultmonth=='09') echo 'selected="selected"'; ?>>Σεπτεμβρίου</option>
							<option value="10" <?php if($defaultmonth=='10') echo 'selected="selected"'; ?>>Οκτωβρίου</option>
							<option value="11" <?php if($defaultmonth=='11') echo 'selected="selected"'; ?>>Νοεμβρίου</option>
							<option value="12" <?php if($defaultmonth=='12') echo 'selected="selected"'; ?>>Δεκεμβρίου</option>
						</select>
						
						<select id="startdate_year" name="startdate_year" >
							<option <?php if($defaultyear==2010) echo 'selected="selected"'; ?>>2010</option>
							<option <?php if($defaultyear==2011) echo 'selected="selected"'; ?>>2011</option>
							<option <?php if($defaultyear==2012) echo 'selected="selected"'; ?>>2012</option>
							<option <?php if($defaultyear==2013) echo 'selected="selected"'; ?>>2013</option>
							<option <?php if($defaultyear==2014) echo 'selected="selected"'; ?>>2014</option>
							<option <?php if($defaultyear==2015) echo 'selected="selected"'; ?>>2015</option>
							<option <?php if($defaultyear==2016) echo 'selected="selected"'; ?>>2016</option>
							<option <?php if($defaultyear==2017) echo 'selected="selected"'; ?>>2017</option>
						</select>
						<?php $defaulthour = $defaulthour+2; ?>
						@ (24Η)<input type="text" size="2" value="<?php echo $defaulthour; ?>" name="startdate_hour" id="startdate_hour" >
						:<input type="text" size="2" value="00" name="startdate_minute" id="startdate_minute" >
					</td>
				</tr>				
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Ημερομηνία Λήξης</th>
					<?php $defaultmonth = $defaultmonth +1 ;?>
					<td>
						<input type="text" size="2" value="<?php echo $defaultday; ?>" name="expirationdate_day" id="expirationdate_day" >,

						<select id="expirationdate_month" name="expirationdate_month">
							<option value="01" <?php if($defaultmonth=='01') echo 'selected="selected"'; ?>>Ιανουαρίου</option>
							<option value="02" <?php if($defaultmonth=='02') echo 'selected="selected"'; ?>>Φεβρουαρίου</option>
							<option value="03" <?php if($defaultmonth=='03') echo 'selected="selected"'; ?>>Μαρτίου</option>
							<option value="04" <?php if($defaultmonth=='04') echo 'selected="selected"'; ?>>Απριλίου</option>
							<option value="05" <?php if($defaultmonth=='05') echo 'selected="selected"'; ?>>Μαΐου</option>
							<option value="06" <?php if($defaultmonth=='06') echo 'selected="selected"'; ?>>Ιουνίου</option>
							<option value="07" <?php if($defaultmonth=='07') echo 'selected="selected"'; ?>>Ιουλίου</option>
							<option value="08" <?php if($defaultmonth=='08') echo 'selected="selected"'; ?>>Αυγούστου</option>
							<option value="09" <?php if($defaultmonth=='09') echo 'selected="selected"'; ?>>Σεπτεμβρίου</option>
							<option value="10" <?php if($defaultmonth=='10') echo 'selected="selected"'; ?>>Οκτωβρίου</option>
							<option value="11" <?php if($defaultmonth=='11') echo 'selected="selected"'; ?>>Νοεμβρίου</option>
							<option value="12" <?php if($defaultmonth=='12') echo 'selected="selected"'; ?>>Δεκεμβρίου</option>
						</select>
						
						<select id="expirationdate_year" name="expirationdate_year" >
							<option <?php if($defaultyear==2010) echo 'selected="selected"'; ?>>2010</option>
							<option <?php if($defaultyear==2011) echo 'selected="selected"'; ?>>2011</option>
							<option <?php if($defaultyear==2012) echo 'selected="selected"'; ?>>2012</option>
							<option <?php if($defaultyear==2013) echo 'selected="selected"'; ?>>2013</option>
							<option <?php if($defaultyear==2014) echo 'selected="selected"'; ?>>2014</option>
							<option <?php if($defaultyear==2015) echo 'selected="selected"'; ?>>2015</option>
							<option <?php if($defaultyear==2016) echo 'selected="selected"'; ?>>2016</option>
							<option <?php if($defaultyear==2017) echo 'selected="selected"'; ?>>2017</option>
						</select>
						@ (24Η)<input type="text" size="2" value="23" name="expirationdate_hour" id="expirationdate_hour" >
						:<input type="text" size="2" value="59" name="expirationdate_minute" id="expirationdate_minute" >
					</td>
				</tr>				
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Διαχειριστής</th>
					<td>
						<select id="c_user" name="c_user" >
						<?php
							global $wpdb;
							$sql = "SELECT ID, display_name FROM $wpdb->users";
							echo $sql;
							$authors = $wpdb->get_results($sql);
							foreach ( $authors as $author ) { ?>
							<option value="<?php echo $author->ID;  ?>"><?php echo $author->display_name;  ?></option>
						<?php } ?>
						</select></td>
				</tr>				
			</tbody>
		</table>
	
		<p class="submit">
			<input class="button-primary" type="submit" name="consultation_save" value="Προσθήκη" />
		</p>
	</form>
</div>

<?php 
function check_consultation(){
	if (strlen($_POST['c_title']) < 20){ //Short Consultation Title
		return '5@0';
	}
	else if(empty($_POST['c_num'])){ // No Post Num
		return '4@0';
	}
	else if($_POST['c_num'] > 100 ){
		$cons_id = build_consultation();
		return '3@'.$cons_id;
	}
	else if(!check_date()){
		$cons_id = build_consultation();
		return '2@'.$cons_id;
	}
	$cons_id = build_consultation();
	return  '1@'.$cons_id;
}

function check_date(){
	$dateExpSet = ''.$_POST['expirationdate_year'].'-'.$_POST['expirationdate_month'].'-'.$_POST['expirationdate_day'].' ';
	$dateExpSet .= ''.$_POST['expirationdate_hour'].':'.$_POST['expirationdate_minute'];
	$dateStrSet = ''.$_POST['startdate_year'].'-'.$_POST['startdate_month'].'-'.$_POST['startdate_day'].' ';
	$dateStrSet .= ''.$_POST['startdate_hour'].':'.$_POST['startdate_minute'];
	$dateNow =  ''.date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i') ;			
	if(strtotime($dateExpSet) > strtotime($dateNow)){ 
		return true;
	}
	if(strtotime($dateStrSet) > strtotime($dateNow)){ 
		return true;
	}
	return false;
}

function build_consultation(){
	global $wpdb;
	
	$dateExpSet = ''.$_POST['expirationdate_year'].'-'.$_POST['expirationdate_month'].'-'.$_POST['expirationdate_day'].' ';
	$dateExpSet .= ''.$_POST['expirationdate_hour'].':'.$_POST['expirationdate_minute'];
	$dateStrSet = ''.$_POST['startdate_year'].'-'.$_POST['startdate_month'].'-'.$_POST['startdate_day'].' ';
	$dateStrSet .= ''.$_POST['startdate_hour'].':'.$_POST['startdate_minute'];
	$dateNow =  ''.date('Y').'-'.date('m').'-'.date('d').' '.date('H').':'.date('i') ;			
	
	if(strtotime($dateExpSet) < strtotime($dateNow)){ 
		$month = date('m');
		$day = '01';
		if ($month ==12 ) { $month = '01'; 
			$year = date('Y') + 1; 
			$dateDef =  ''.$year.'-'.$month.'-'.$day.' '.date('H').':'.date('i') ;	
		} else {
			$dateDef =  ''.date('Y').'-'.$month.'-'.$day.' '.date('H').':'.date('i') ;	
		}
		$dateExpSet = $dateDef; 
	} 
	
	if(strtotime($dateStrSet) < strtotime($dateNow)){ 
		$month = date('m');
		$day = '01';
		if ($month ==12 ) { $month = '01'; 
			$year = date('Y') + 1; 
			$dateDef =  ''.$year.'-'.$month.'-'.$day.' '.date('H').':'.date('i') ;	
		} else {
			$dateDef =  ''.date('Y').'-'.$month.'-'.$day.' '.date('H').':'.date('i') ;	
		}
		$dateStrSet = $dateDef ;
	} 
	
	// Build New Category
	// Expiration and Start Date as Description
	$new_cons = array(
		'cat_name' => $_POST['c_title'], 
		'category_description' => ''.$dateStrSet.'@'.$dateExpSet.'', 
		'category_parent' => 0);


	$cons_id = wp_insert_category($new_cons);
	
	// Build Author 
	/*
	if (is_email($_POST['c_user'])) {
		$email_exists = $wpdb->get_row("SELECT user_email FROM $wpdb->users WHERE user_email = '" . $_POST['c_user'] . "'");
		if (!$email_exists) {
			$username_arr = explode('@', $_POST['c_user']);	
			$username = $username_arr[0];
			if (validate_username($username )) {
				if (!username_exists($username)) {
					$password = substr(md5(uniqid(microtime())), 0, 7);
					$user_id = wp_insert_user(array(
								"user_login" => $username,
								"user_pass" => $password,
								"role" => 'editor',
								"user_email" => $_POST['c_user']));
					wp_new_user_notification($user_id, $password);
				} else {
					$userinfo = get_userdatabylogin($username);
					$user_id = $userinfo->ID ;
				}
			}
		}else{
			$userinfo = $wpdb->get_row("SELECT ID FROM $wpdb->users WHERE user_email = '" . $_POST['c_user'] . "'");
			$user_id = $userinfo->ID ;
		}
	} */
	
	$user_id = $_POST['c_user'];
	
	// Build Posts and AsignThem to the Category
	$num_o_posts = $_POST['c_num'];
	//if ($num_o_posts>100) { $num_o_posts =100 ;}
	
	$new_post = array();
	$dateNow =  ''.date('Y').'-'.date('m').'-'.date('d') ;
	$cnt = 0; $hr = 0;
	for($i=$num_o_posts; $i>=1; $i=$i-1)
	{	
		if ($cnt==60 || $cnt==0) {
			$hr = $hr+1;
			$datePost = $dateNow.' 0'.$hr.':00:00';
			if ($cnt==0) { $cnt = $cnt+10; } else { $cnt = 0; }; 
		} else {
			$datePost = $dateNow.' 0'.$hr.':'.$cnt.':00';
			$cnt=$cnt+10;
		}
		if ($i<10) { $title = '0'; } else {  $title = ''; }
		$new_post['post_title'] = 'Άρθρο '.$title.$i.'';
		$new_post['post_content'] = 'Περιεχόμενο Άρθρου';
		$new_post['post_status'] = 'publish';
		$new_post['comment_status'] = 'closed'; 
		$new_post['ping_status'] = 'closed'; 
		if (!empty($user_id)) { $new_post['post_author'] = $user_id; }
		$new_post['post_category'] = array($cons_id);
		$new_post['post_date'] = $datePost ;
		wp_insert_post( $new_post );
	}
	
	// Build Download Category
	global $wp_dlm_db_taxonomies;
	$name = $_POST['c_title']; 
	$parent = 0;
	$id = $cons_id;
	$query_ins = sprintf("INSERT INTO %s (id, name, parent, taxonomy) VALUES ('%s','%s','%s','category')",
		$wpdb->escape( $wp_dlm_db_taxonomies ),
		$wpdb->escape( $id ),
		$wpdb->escape( $name ),
		$wpdb->escape( $parent ));
	$wpdb->query($query_ins);
	
	$options = get_option('consultation_options');	
	
	// Intro Text
	if ($cnt==60 || $cnt==0) {
		$hr = $hr+1;
		$datePost = $dateNow.' 0'.$hr.':00:00';
		if ($cnt==0) { $cnt = $cnt+10; } else { $cnt = 0; }; 
	} else {
		$datePost = $dateNow.' 0'.$hr.':'.$cnt.':00';
		$cnt=$cnt+10;
	}
	$new_post['post_title'] = $_POST['c_title'];
	$new_post['post_content'] = 'Κείμενο Εισαγωγής - Να παραμείνει Πρόχειρο Μέχρι την Έναρξη της Διαβούλευσης!';
	$new_post['post_status'] = 'draft';
	$new_post['comment_status'] = 'closed'; 
	if (!empty($user_id)) { $new_post['post_author'] = $user_id; }
	$new_post['post_category'] = array($cons_id,$options['cat_open'] );
	$new_post['post_date'] = $datePost ;
	wp_insert_post( $new_post );
	
	/* Outro Text
	if ($cnt==60 || $cnt==0) {
		$hr = $hr+1;
		$datePost = $dateNow.' 0'.$hr.':00:00';
		if ($cnt==0) { $cnt = $cnt+10; } else { $cnt = 0; }; 
	} else {
		$datePost = $dateNow.' 0'.$hr.':'.$cnt.':00';
		$cnt=$cnt+10;
	}
	$new_post['post_title'] = ''.$_POST['c_title'].' - Ολοκλήρωση';
	$new_post['post_content'] = 'Κείμενο Ολοκλήρωσης - Να παραμείνει Πρόχειρο Μέχρι την Ολοκλήρωση της Διαβούλευσης!';
	$new_post['post_status'] = 'draft';
	$new_post['comment_status'] = 'closed'; 
	if (!empty($user_id)) { $new_post['post_author'] = $user_id; }
	$new_post['post_category'] = array($cons_id, $options['cat_close']);
	$new_post['post_date'] = $datePost ;
	wp_insert_post( $new_post );
	*/
	return $cons_id;
}
?>

