<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'wookod' );

/** MySQL veritabanı kullanıcısı */
define( 'DB_USER', 'wookod' );

/** MySQL veritabanı parolası */
define( 'DB_PASSWORD', 'zg7hOQrA0HtX2lli' );

/** MySQL sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2&}S5I@mh8grlB~ _xN{G8eydMm_zZ 3$;]bd!U$3|:dp6VCdXQnI .Bc<g}%=+m' );
define( 'SECURE_AUTH_KEY',  '[Olk1P*#h[>cy82zg;>wf2`$Koi=Bj;9vfOH^9b%tXz u2]BK.+l1[0vD73fHogO' );
define( 'LOGGED_IN_KEY',    '<L%Cabci~LQ[Jv?5jvz[JgSdWz1k<<6,nf(F~:Hi4HOw1SXhs{&+&|^@zatNGJP/' );
define( 'NONCE_KEY',        '%/=OHd @,<;=AJB$3{0g2oBWKD0(ky`bu|eR2WX~8qUSnA),US= _GfUMPdUQm83' );
define( 'AUTH_SALT',        '|7=BE$3[SGn$J}r*UsX},9Di4topBMEB!VLDOuk{4*;GL,}%e<, zX3c-dzpX,a+' );
define( 'SECURE_AUTH_SALT', 'Wooo<({^a#6>su}GH`~;+ZH??Lbk~F_?3CLRAo[eaK+;4PEpzgwc~b&38H@K(X4`' );
define( 'LOGGED_IN_SALT',   'U+n?~lYxB2bdQYmwQc}Vp=c5+=^--3mQ[6HoYhs%<Qp&5uE-6b$ch~a>A{n/<AZp' );
define( 'NONCE_SALT',       '=1a?zv0oC ]jomhU[sP4}:RSP,qx+7fuT!NRbo7te!8qN;kfEkZdz]8Ml%5E>-Jm' );
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
