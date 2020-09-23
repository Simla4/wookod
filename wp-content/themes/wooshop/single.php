<?php get_header(); ?>

<?php while (have_posts() ):the_post(); ?>
<div class="container sayfa beyaz-kutu">
	
	<div classs="row">

		<div class="col-md-9 blog-icerik">

			<h1 clas="kalin-baslik"><?php the_title(); ?></h1>
			<div class="clearfix"></div>
			Eklenme Tarihi : <?php echo get_the_date('d.m.Y'); ?>
			<div class="clearfix"></div>
			<?php the_post_thumbnail('thumb-blog-kapak', array('class' => 'img-fluit thubm-blog-kapak', 'alt' => esc_html( get_the_title() ) )); ?>
			<div class="clearfix"></div>
			<?php the_content(); ?>
			<div class="clearfix"></div>
			<?php comments_template(); ?>

		</div>

		<div class="col-md-3 blog-sidebar">

			<?php if(is_active_sidebar('blog-sidebar') ) : ?>
			<?php dynamic_sidebar('blog-sidebar'); ?>
			<?php endif; ?>

		</div>

	</div>

</div>	

<?php endwhile; ?>
<?php get_footer(); ?>