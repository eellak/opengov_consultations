<?php 
	get_header();
	$options = get_option('consultation_options');

	$my_query = new WP_Query('post_status=draft&cat='.$_GET[preview].''); 
	if ($my_query->have_posts()) : while ($my_query->have_posts()) :
	$my_query->the_post();
?>
	<div class="breadcrumb">
		<a href="<?php echo URL; ?>" class="home">Αρχική</a> 
		<?php
			$category = get_the_category();
			foreach ($category as $cat) {
				$ID = $cat->cat_ID;
				if (($ID !=$options['cat_close'] ) && ($ID != $options['cat_open'])){
					echo '<a href="'.get_permalink().'">'.$cat -> cat_name.'</a>';
					break;
				}
			}	
		?>
		<span class="single"><?php the_title(); ?></span>
	</div>
	
	<div id="main_content">
		<div class="post clearfix">
			<h3><?php the_title(); ?></h3>
			<div class="post_content"><?php the_content(''); ?></div>
			<div id="consnav">
			<?php get_cons_posts_list($post->ID,'Πλοήγηση στη Διαβούλευση'); ?>
			</div>
		</div>	
		<?php include(TEMPLATEPATH."/sidebar_preview.php"); ?>
		
	</div>
			<?php endwhile; endif; ?> 	
</div>
<?php get_footer(); ?>