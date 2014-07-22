<div id="comments">
	
	<?php 
		if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) { die ('Σφάλμα!'); }

		if (!empty($post->post_password)) { 
			if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie?>
				<p class="nocomments">Απαιτείται Κωδικός.<p>
			<?php
				return;
			}
		}
	?>

	<?php if (have_comments()) { ?>
		<div class="comment_nav">
			<div class="nav">
				Σχόλια <?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') ); ?>
				<?php global $comments; ?>
			</div>
		</div>
		
		<ul class="comment_list">
			<?php wp_list_comments('type=comment&reverse_top_level=1&callback=paged_comments'); ?>
		</ul>
		
		<div class="comment_nav">
			<div class="nav">
				Σχόλια <?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') ); ?>
			</div>
		</div>
		
	<?php }  ?>
	
	<?php if ('open' == $post->comment_status) { ?> 
	<div id="respond" class="form_land">	
		<div class="comment_form">
			<h3 class="comment_on">Σχολιάστε</h3>
			<form class="form" action="<?php echo URL; ?>/wp-comments-post.php" method="post" id="commentform">
			
				<?php if ( $user_ID ) { ?>
					<p>Συνδεδεμένος ως <a href="<?php echo URL; ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
						<a href="<?php echo URL; ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Αποσύνδεση &raquo;</a></p>
				<?php } else { ?>

					<p><label for="author">
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="TextField" style="width: 210px;" />
						Όνομα (Υποχρεωτικό)
					</label></p>
							
					<p><label for="email">
						<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="TextField" style="width: 210px;" />
						eMail (Υποχρεωτικό) (Δεν Δημοσιεύεται)
					</label></p>
						
					<p><label for="url">
					<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="TextField" style="width: 210px;" />
					Προσωπικός Ιστοχώρος/Ιστοσελίδα/Blog
					</label></p>

				<?php }?>	
				<p>
					<textarea name="comment" id="comment" rows="20" tabindex="4" class="TextArea" ></textarea>
				</p>

				<p>
					<input name="SubmitComment" type="submit" class="SubmitComment"  title="Post Your Comment" value="Υποβολή του Σχολίου" alt="Υποβολή του Σχολίου" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				</p>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		</div>
		<div class="comments_guide">
			<h4>Όροι Συμμετοχής</h4>
			<ol>
				<li>Φροντίστε να διατυπώνετε προτάσεις, σχόλια ή ερωτήσεις που σχετίζονται άμεσα με το υπό διαβούλευση ζήτημα. Προφανώς κάθε ζήτημα εντάσσεται σε ένα γενικότερο πλαίσιο αλλά ο δημόσιος διάλογος διευκολύνεται με στοχευμένες και συγκεκριμένες προτάσεις και παρεμβάσεις.</li>
<li>Φροντίστε να διατυπώνετε τις προτάσεις, σχόλια ή ερωτήσεις με τρόπο σύντομο και περιεκτικό.</li>
<li>Προσπαθήστε να τεκμηριώνετε αυτά που γράφετε με αναφορές, παραπομπές σε άλλα κείμενα, υλικό ή συνδέσμους με αντίστοιχο περιεχόμενο, εκτός αν η χρήση τους είναι καταχρηστική και στην περίπτωση αυτή θα αφαιρούνται.</li>
<li>Βεβαιωθείτε ότι το περιεχόμενο που υποβάλετε δεν προσβάλλει δικαιώματα άλλων προσώπων.</li>
<li>Είναι γόνιμο να υπάρχει ανταλλαγή απόψεων μεταξύ των συμμετεχόντων αλλά είναι σημαντικό για την ποιότητα και αποτελεσματικότητα του διαλόγου να αποφεύγονται οι προσωπικές αντιπαραθέσεις με άλλους συμμετέχοντες.</li>
<li>Προτάσεις, σχόλια, υπερσύνδεσμοι ή οποιοδήποτε άλλο περιεχόμενο, τα οποία διατυπώνονται σε γλώσσα και με τρόπο υβριστικό, χυδαίο ή περιέχουν ή υποκινούν μισαλλοδοξία και διακρίσεις που βασίζονται σε φύλο, ηλικία, σεξουαλικό προσανατολισμό, φυλετική ή εθνική καταγωγή ή θρησκευτικές πεποιθήσεις δεν θα δημοσιεύονται στο <a href="http://www.opengov.gr">OpenGov.gr</a>. Επίσης δε θα δημοσιεύονται σχόλια τα οποία παραπέμπουν σε άλλους δικτυακούς τόπους για λόγους διαφήμισης, δημοσιότητας ή οποιονδήποτε άλλο σκοπό που κρίνεται από το <a href="http://www.opengov.gr">OpenGov.gr</a> ως καταχρηστικός.</li>
<li>Οι προτάσεις, σχόλια ή ερωτήσεις που υποβάλετε υπόκεινται σε έλεγχο ως προς την τήρηση των παρόντων όρων χρήσης και συμμετοχής.</li>
<li>Με τη συμμετοχή σας αποδέχεστε τη χρήση του ηλεκτρονικού σας ταχυδρομείου για ενημερωτικούς λόγους σχετικούς με τους στόχους του <a href="http://www.opengov.gr">OpenGov.gr</a>.</li>
<li>Με τη συμμετοχή σας αποδέχεστε τη διάθεση των προτάσεων, σχολίων ή ερωτήσεων που υποβάλετε με την άδεια <a href="http://creativecommons.org/licenses/by/3.0/gr/" target="_blank">«Creative Commons»</a>.</li>
			</ol>
		</div>
	</div>
	<?php } ?>
		
</div>