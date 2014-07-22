<?php 
	get_header();
	$options = get_option('consultation_options');
?>
	<div id="main_content">
		<div class="post clearfix">
			<?php
			if (in_category($options['cat_open'])){
			// Είναι εισαγωγικό: 
			$category_in = get_the_category();
			$cat_id_in ;
			foreach ($category_in as $cat_in) {
				$cat_id_in = $cat_in->cat_ID;
				if (($cat_id_in !=$options['cat_close'] ) && ($cat_id_in != $options['cat_open']) && ($cat_id_in != $options['cat_results'])){	break; }
			}
			
			//Φέρε άν υπάρχει Τελικό Σχέδιο
			query_posts('cat='.$options['cat_results']);  
			if (have_posts()) {
				while (have_posts()) { 
					the_post(); 
					$category = get_the_category();
					foreach ($category as $cat) {
						if ($cat_id_in == $cat->cat_ID){ 
						?>	
						<div class="results">
							<h3><?php the_title(); ?></h3>
							<div class="post_content has_results"><?php the_content(''); ?></div>
						</div>
						<?php
							break;
						}
					}		
				}
			}
			wp_reset_query() ;
			
			//Φέρε άν υπάρχει της ολοκλήρωσης			
				query_posts('cat='.$options['cat_close']);  
				if (have_posts()) {
					while (have_posts()) { 
						the_post(); 
						$category = get_the_category();
						foreach ($category as $cat) {
							if ($cat_id_in == $cat->cat_ID){ 
							?>				
								<h3 class="complete"><?php the_title(); ?></h3>
								<div class="post_content is_complete"><?php the_content(''); ?></div>
							<?php
								break;
							}
						}		
					}
				}
				wp_reset_query() ;
			}			
			?>
			
			<?php
			if (in_category($options['cat_close'])){
				$category_in = get_the_category();
				$cat_id_in ;
				foreach ($category_in as $cat_in) {
					$cat_id_in = $cat_in->cat_ID;
					if (($cat_id_in !=$options['cat_close'] ) && ($cat_id_in != $options['cat_open']) && ($cat_id_in != $options['cat_results'])){	break; }
				}
				
				//Φέρε άν υπάρχει Τελικό Σχέδιο
				query_posts('cat='.$options['cat_results']);  
				if (have_posts()) {
					while (have_posts()) { 
						the_post(); 
						$category = get_the_category();
						foreach ($category as $cat) {
							if ($cat_id_in == $cat->cat_ID){ 
							?>	
							<div class="results">
								<h3><?php the_title(); ?></h3>
								<div class="post_content has_results"><?php the_content(''); ?></div>
							</div>
							<?php
								break;
							}
						}		
					}
				}
				wp_reset_query() ;
			}
			?>
			
			<?php while (have_posts()) : the_post(); ?>
			
				<?php if (in_category($options['cat_close'])){ ?>				
					<h3 class="complete"><?php the_title(); ?></h3>
					<div class="post_content is_complete""><?php the_content(''); ?></div>
				<?php } else { ?>
					<h3><?php the_title(); ?></h3>
					<div class="post_content"><?php the_content(''); ?></div>
				<?php }  ?>
			<?php endwhile; ?> 
			<?php
			if (in_category($options['cat_close'])){
			// Είναι ολοκλήρωσης: Φέρε άν υπάρχει της εισαγωγής
				$category_in = get_the_category();
				$cat_id_in ;
				foreach ($category_in as $cat_in) {
					$cat_id_in = $cat_in->cat_ID;
					if (($cat_id_in !=$options['cat_close'] ) && ($cat_id_in != $options['cat_open'])){	break; }
				}
				
				query_posts('cat='.$options['cat_open']);  
				if (have_posts()) {
					while (have_posts()) { 
						the_post(); 
						$category = get_the_category();
						foreach ($category as $cat) {
							if ($cat_id_in == $cat->cat_ID){ 
							?>				
								<h3><?php the_title(); ?></h3>
								<div class="post_content"><?php the_content(''); ?></div>
							<?php
								break;
							}
						}		
					}
				}
				wp_reset_query() ;
			}			
			?>
			<div id="consnav">
			<?php get_cons_posts_list($post->ID,'Πλοήγηση στη Διαβούλευση'); ?>
			</div>
		</div>	
		<?php get_sidebar(); ?>
		
	</div>	
<?php 
	$has_comments = get_post_meta($post->ID, 'has_comments', true); 
	if (((!in_category($options['cat_open'])) && (!in_category($options['cat_close'])) && (!in_category($options['cat_results']))) || ($has_comments==true) ){ 
		comments_template(); } 
	?>
</div>
<?php get_footer(); ?>