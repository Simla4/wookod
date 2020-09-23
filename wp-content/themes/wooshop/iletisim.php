<?php /*Template Name: İletişim */ get_header(); ?>

<?php while (have_posts() ):the_post(); ?>
<div class="container sayfa beyaz-kutu">
	<h2 clas="kalin-baslik"><?php the_title(); ?></h2>		
	<div class="row">

		<div class="col-md-4">
			<?php echo do_shortcode('[contact-form-7 id="112" title="Ornek Form"]'); ?>
		</div>

		<div class="col-md-4">
			<p><strong>Adres: </strong><?php the_field('firma_adres', 'option'); ?> </p>    
            <p><strong>Telefon: </strong><?php the_field('firma_telefon', 'option'); ?></p> 
            <p><strong>E-Mail: </strong><a href="mailto:<?php the_field('firma_e-posta', 'option'); ?>"><?php the_field('firma_e-posta', 'option'); ?></a></p>  
		</div>

		<div class="col-md-4">

			<?php get_field('firma_google_harita_kodu', 'option'); ?>			

		</div>

	</div>
		
</div>	

<?php endwhile; ?>
<?php get_footer(); ?>