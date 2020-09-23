<?php
/*TEMA SETUP BAŞLANGIÇ*/

function wooshop_setup() {

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );


register_nav_menu( 'primary', __( 'Ana Menü', 'wooshop' ) );
register_nav_menu( 'footermenu1', __( 'Footer Menü 1', 'wooshop' ) );
register_nav_menu( 'footermenu2', __( 'Footer Menü 2', 'wooshop' ) );
register_nav_menu( 'mobilmenu', __( 'Mobil Menü', 'wooshop' ) );

	

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 604, 270, true );



add_filter( 'use_default_gallery_style', '__return_false' );

    
//Bunlar bir woocommarce temasıdır aşaıdaki çzellikler kullanıllabilir demek istiyoruz.
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );       

}

add_action( 'after_setup_theme', 'wooshop_setup' );//

/*TEMA SETUP BİTİŞ*/



/*Tema Stil ve Script Dosyaları*/

function wooshop_scriptler_stiller() {

wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array() );

wp_enqueue_style( 'slider', get_template_directory_uri() . '/inc/slider/css/swiper.min.css', array() );

wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fontawesome/css/all.min.css', array() );

wp_enqueue_style( 'wooshop-style', get_stylesheet_uri(), array() );

wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array() );

	

wp_enqueue_script( 'Popper', get_template_directory_uri() . '/inc/popper.min.js', array('jquery'));

wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '2016-19-08', true );

wp_enqueue_script( 'slider2', get_template_directory_uri() . '/inc/slider/js/swiper.min.js', array( 'jquery' ), '2016-19-08', true );

wp_enqueue_script( 'slider3', get_template_directory_uri() . '/inc/slider/js/swiper.thumbnails.js', array( 'jquery' ), '2016-19-08', true );

wp_enqueue_script( 'jsscript', get_template_directory_uri() . '/inc/scripts.js', array( 'jquery' ), '2016-19-08', true );	



}

add_action( 'wp_enqueue_scripts', 'wooshop_scriptler_stiller' );





/*ACF Bileşeni*/

add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    $path = get_stylesheet_directory() . '/inc/acf/';

    return $path;

    

}

add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

 

    $dir = get_stylesheet_directory_uri() . '/inc/acf/';

    return $dir;

    

}

//add_filter('acf/settings/show_admin', '__return_false');



include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );



if( function_exists('acf_add_options_page') ) {

	

	acf_add_options_page(array(

		'page_title' 	=> 'Site Ayarları',

		'menu_title'	=> 'Site Ayarları',

		'menu_slug' 	=> 'site-ayarlari',

		'capability'	=> 'manage_options',

		'redirect'		=> false,

		'update_button'		=> __('Güncelle', 'acf'),

		'updated_message'	=> __("Ayarlar Güncellendi", 'acf'),

	));

}
/*Acf Bileşenleri bitiş*/

/*SEPET GÜNCELLEYİCİ*/

function wookod_sepet($urunler) {

	ob_start();
	?>
	<span class="sepet-guncel"></span>
	<span class="sepet-urun"><?php echo WC()->cart->cart_contents_count; ?></span>
	<span class="sepet-fiyat"><?php echo WC()->cart->get_cart_total(); ?></span>
	<?php
	$urunler['.sepet-guncel'] = ob_get_clean();
	return $urunler;
}
add_filter('woocommerce_add_to_cart_fragments', 'wookod_sepet');



/*Klasik Editöre Geri Dönüş*/

add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);


/*RESİM BOYUTLARI*/

function resim_boyutlari(){

	add_image_size('thumb-blog-kapak', 1110, 438, true);
	add_image_size('thumb-kategori-2-kapak2', 350, 206, true);
}

add_action('after_setup_theme', 'resim_boyutlari');


/*ÖZEL ÖZET*/


function ozel_ozet(){

	$excerpt = get_the_content();
	$excerpt = preg_replace("([.*?])", '', $excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 250);
	$excerpt = substr($excerpt, 0,strripos($excerpt, " ") );
	$excerpt = trim(preg_replace('/\s+/', ' ', $excerpt) );
	$excerpt = $excerpt.'<div class="clearfix"></div> <a href="'.get_the_permalink().'" class="devamini-oku">devamını oku <i class="fas fa-long-arrow-alt-right"></i></a>';
	return $excerpt;
}

/*Ürün Detay Sayfasında Tab İkinci Başlığı Kapatır*/

add_filter('woocommerce_product_description_heading', '__return_null');
add_filter('woocommerce_product_addtional_information_heading', '__return_null');

/*Ürün Deyat Sayfasında Tab İSimlendirme*/

add_filter('woocommerce_product_tabs', 'tab_isimlendirme', 98);
function tab_isimlendirme($tabs){

	$tabs['description']['title'] = __('Genel Bakış');
	return $tabs;
}


/*İlgili Ürünler veÇapraz Ürünler*/

add_filter('woocommerce_output_related_products_args', 'ilgili_urunler_args', 20);
function ilgili_urunler_args($args){

	$args['post_per_page'] = 6;
	$args['columns'] = 6;
	return $args;
}

add_filter('woocommerce_upsell_display_args', 'capraz_satis_args', 20);
function capraz_satis_args($args){

	$args['post_per_page'] = 6;
	$args['columns'] = 6;
	return $args;
}

/*Mağza Başlığını Gizler*/
add_filter('woocommerce_show_page_title', 'magza_basligini_gizle');
function magza_basligini_gizle($title){

	if(is_shop()) $title = false;
	return $title;
}

/*Özel Mağaza Sidebarı*/
function magaza_sidebar() {

	register_sidebar(
		array (
			'name' => __('Mağaza Sidebarı', 'wookod'),
			'id' => 'magaza_sidebar',
			'description' => __('Mağaza Sidebarı', 'wookod'),
			'before_widget' => '<div class="beyaz-kutu">',
			'after_widget' => "</div>",
			'before_title' => '<h3 class="tab-baslik kalin-baslik">',
			'after_title' => '</h3><div class="clearfix"></div>'
			)
		);
	register_sidebar(
		array(
			'name' => 'Blog Sidebar',
			'id' => 'blog_sidebar',
			'description' => 'Blog Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="tab-baslik kalin-baslik">',
			'after_title' => '</h3><div class="clearfix"></div>'
			)
		);
}

add_action('widgets_init', 'magaza_sidebar');

/*Arama Sonuçlarını Direkt Ürüne Yönlendirmez*/
add_filter('woocommerce_redirect_single_search_result', '__return_false');

/*Sepet Sayfasını Otomatik Güncelleme */
add_action('wp_footer', 'otomatik_sepet_guncelleme');
function otomatik_sepet_guncelleme(){
	if(is_cart()){
		?>
		<script type="text/javascript">
			jQuery('div.woocommerce').on('click', 'input.qty', function()){
				jQuery("[name='update_cart']").trigger("click");
			}
		</script>
		<?php
	}
}

/*Ödeme Ekranı Düzenlemeleri*/
add_filter('woocommerce_checkout_fields', 'odeme_alani_ozelleştirmeleri');
function odeme_alani_ozelleştirmeleri($fields){

	unset($fields['billing']['billing_postcode']);
	unset($fields['order']['billing_postcode']);
	return $fields;
}
 /*Ekstra Sipriş Alanı Ekleme*/
 add_action('woocommerce_after_checkout_billing_form', 'ekstra_alan');
 function ekstra_alan($checkout){

 	woocommerce_form_field('tckimlikno', array(
 			'type' => 'text',
 			'class' => array('my-field-class form-row-wide'),
 			'label' => __('TC Kimlik Numaranız'),
 			'placeholder' => __('TC Kimlik Numaranız'),
 			'required' => "true" //gerekli olup olmadığı
 			),
 	$checkout->get_value('tckimlikno') );
 }

 add_action('woocommerce_checkout_process', 'ozel_alan_uyari');

 function ozel_alan_uyari(){
 	if(!$_POST['tckimlikno']) wc_add_notice(__('Lütfen 11 Haneli TC Kimlik Numaranızı Giriniz'), 'error');
 }

 add_action('woocommerce_checkout_update_order_meta', 'ozel_alan_sipariste_guncelleme');

 function ozel_alan_sipariste_guncelleme($order_id){
 	if($_POST['tckimlikno']) update_post_meta($order_id, '_tckimlikno', sanitize_text_field($_POST['tckimlikno']) );
 }


add_action('woocommerce_admin_order_data_after_billing_address', 'ozel_alan_siparis_gosterme');
function ozel_alan_siparis_gosterme($order){
	echo '<p><strong>'.__('müşteri TC Kimlik Numarası').':</strong>'. get_post_meta($order->id, '_tckimlikno', true), '</p>';
}

/*
İşleniyor Sipariş Durumu Değiştirme*/
add_filter('wc_order_statuses', 'siparis_durumu_degistirme');
function siparis_durumu_degistirme($order_statuses){
	foreach ($order_statuses as $key => $status) {
		if('wc-completed' === $key)
			$order_statuses['wc_processing'] = _x('Sipariş Hazırlanıyor', 'Order status', 'woocommerce');
	}
	return $order_statuses;
}
/*Yeni Sipariş Durumu Ekleme*/

add_filter('woocommerce_register_shop_order_post_statuses', 'yeni_siparis_durumu');
function yeni_siparis_durumu($order_statuses){

	$order_statuses['wc-siparis-kargolandi'] = array(
		'label'                     => _x('Sipariş Kargolandı', 'Order status', 'woocommerce'),
		'public'                    => false,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop('Sipariş Kargolandı <span class="count">(%s)</span>', 'Sipariş Kargolandı <span class="count">(%s)</span>', 'woocommerce'),
		);
	return $order_statuses;
}

add_filter('wc_order_statuses', 'yeni_siparis_durumu_1');
function yeni_siparis_durumu_1($order_statuses){
	$order_statuses['wc-siparis-kargolandi'] = _x('Sipariş Kargolandı', 'Order, status', 'woocommerce');
	return $order_statuses;
}

add_filter('bulk_actions-edit-shop_order', 'yeni_siparis_durumu_2');
function yeni_siparis_durumu_2($bulk_actions){
	$bulk_actions['mark_custom-status'] = 'Sipariş Kargolandı Olarak Değiştir';
	return $bulk_actions;
}
