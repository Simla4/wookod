<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title> 
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); //Anasayfanın gözükeceği şekilde bilgilr alıyor.?>">
<?php wp_head(); ?>

</head>   

<body <?php body_class(''); ?>>


<div class="container-fluid header-bolumu">
<div class="container">
    <div class="row">

    <?php //the_field('ornek_text_alani', 'option'); // Daha basit alanları çağırıyoruz. ?>        
    <?php $site_logosu = get_field('site_logosu','option'); //Daha karmaşık alanları çağırıyoruz. ?>


    <div class="col-md-3 logo-alani">
    <a href="<?php echo bloginfo('url'); ?>"><img class="site-logosu img-fluid" src="<?php echo $site_logosu['url']; ?>" alt=""/></a>
        
    
    <span class="mobil-menu-icon"><svg class="bi bi-justify" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2 12.5a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h11a.5.5 0 010 1h-11a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
    </svg>
    <span class="mobil-menu-yazi">Menü</span>
    </span>
    <ul class="mobil-menu">
    <li class="page_item page-item-119 current_page_item"><a href="kategori.html" aria-current="page">Dekor</a></li>
    <li class="page_item page-item-9"><a href="kategori.html">Giyim</a></li>
    <li class="page_item page-item-6"><a href="kategori.html">Aksesuar</a></li>
    <li class="page_item page-item-8"><a href="kategori.html">Kapşonlular</a></li>
    <li class="page_item page-item-2"><a href="kategori.html">T-Shirtler</a></li>
    <li class="page_item page-item-7"><a href="kategori.html">Müzik</a></li>
    </ul>    
    </div>
    
    <div class="col-md-6 header-arama">
       

    <?php 

    if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat'])){

        $secili_kategori = $_REQUEST['product_cat'];
    }
    else{

        $secili_kategori = 0;
    }

    $args= array(

        'show_option_all' => esc_html__('Tüm Kategoriler'),
        'class' => 'cat',
        'hide_empty' => 0,
        'value_field' => 'slug',
        'hierarchical' => 1,
        'depth' => 1,
        'echo' => 1,
        'selected' => $secili_kategori,

        );

    $args['taxonomy'] = 'product_cat';
    $args['name'] = 'product_cat';
    $args['class'] = 'header-arama-kategori';

    wp_dropdown_categories($args); ?>

    <input type="hidden" value="product" name="post_type">
    <input type="text" name="s" class="arama-input" required maxlength="128" value="" placeholder="Ürün Ara | Ör. iPhone XS Max...">
    <button type="submit" title="Ara" class="header-arama-buton">Ara</button>
    </form>
        
    </div>
        
    


<div class="col-md-3 sepet-alani">
    <a href="<?php echo wc_get_cart_url(); ?>"> 
    <span class="sepet-baslik">Sepetiniz</span>
    
    <span class="sepet-guncel"></span>
    <span class="sepet-urun"><?php echo WC()->cart->cart_contents_count; ?></span>
    <span class="sepet-fiyat"><?php echo WC()->cart->get_cart_total(); ?></span>
    
    <i class="fas fa-shopping-cart"></i> 
    </a>     
    </div>    
         
    </div>
</div>

</div>
    

    
<div class="container-fluid header-menu">

    <div class="container">

    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'header-menu', 'menu_id' => 'header-menu')); ?>

    </div>
    
</div> 
    <?php //echo"<pre>"; print_r($site_logosu); echo"</pre>"; ?>

