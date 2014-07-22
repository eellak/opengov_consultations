<?php 
	get_header();
	$c = mysql_real_escape_string($_GET[c]);
	$the_comment = get_comment($_GET[c]); 
?>
	<div id="comments">
		<ul class="comment_list"><li>
			<?php if ($the_comment->comment_approved == '1') { ?>
				<div class="user">
					<div class="author">
					<?php
						$auth_link = $the_comment->comment_author_url ;  
						if (url_exists($auth_link)){ ?>
							Σχόλιο του χρήστη '<strong><a href="<?php echo $auth_link; ?>" target="_blank" rel="nofollow"><?php echo $the_comment->comment_author; ?></a></strong>'
						<?php } else { ?>
							Σχόλιο του χρήστη '<strong><?php echo $the_comment->comment_author; ?></strong>'
						<?php }	 ?>
					| 
					<?php echo mysql2date("j F Y, H:s", $the_comment->comment_date); ?>
					</div>
					<div class="meta-comment">
						<a href="<?php echo URL; ?>/?c=<?php echo $c; ?>" class="permalink">Μόνιμος Σύνδεσμος</a>
						<div class="rate"><?php echo display_votes($c);  ?></div>
					</div>
				</div>
				<p><?php  echo  $the_comment->comment_content; ?></p>
			<?php } ?>
		</li></ul>			
	</div>	
</div>
<?php 
	get_footer(); 
?>