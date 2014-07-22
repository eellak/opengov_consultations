<div class="wrap">
	<div class="icon32" id="icon-tools"><br></div>
	<h2>Εργαλεία</h2>
	
	<div class="updated fade below-h2" id="message"><p>
		<strong>Προσοχή Στη Χρήση!</strong>
		<br />
		<?php if(isset($_POST['remove_trackbacks'])) { 
		
		} ?>
	</p></div>
	
	<form action="#" id="cons_form" method="post">
		Αφαιρέστε όλα τα <strong>Τrackbacks</strong> (Εντοπίστηκαν <strong><?php echo count_trackbacks(); ?></strong>) 
		<input class="button-primary" type="submit" name="remove_trackbacks" value="OK" />
	</form>
	<br />
	<form action="#" id="cons_form" method="post">
		Αφαιρέστε όλες τις <strong>Αναθεωρήσεις</strong> (Εντοπίστηκαν <strong><?php echo count_revisions(); ?></strong>) 
		<input class="button-primary" type="submit" name="remove_revisions" value="OK" />
	</form>
	<br />
</div>

<?php 
function count_trackbacks(){

}

function count_revisions(){

}

function remove_trackbacks(){

}

function remove_revisions(){

}

?>

