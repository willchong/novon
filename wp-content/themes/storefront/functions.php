<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

function woocommerce_maybe_add_multiple_products_to_cart( $url = false ) {
    // Make sure WC is installed, and add-to-cart qauery arg exists, and contains at least one comma.
    if ( ! class_exists( 'WC_Form_Handler' ) || empty( $_REQUEST['add-to-cart'] ) || false === strpos( $_REQUEST['add-to-cart'], ',' ) ) {
        return;
    }

    // Remove WooCommerce's hook, as it's useless (doesn't handle multiple products).
    remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );

    $product_ids = explode( ',', $_REQUEST['add-to-cart'] );
    $count       = count( $product_ids );
    $number      = 0;

    foreach ( $product_ids as $id_and_quantity ) {
        // Check for quantities defined in curie notation (<product_id>:<product_quantity>)
        // https://dsgnwrks.pro/snippets/woocommerce-allow-adding-multiple-products-to-the-cart-via-the-add-to-cart-query-string/#comment-12236
        $id_and_quantity = explode( ':', $id_and_quantity );
        $product_id = $id_and_quantity[0];

        $_REQUEST['quantity'] = ! empty( $id_and_quantity[1] ) ? absint( $id_and_quantity[1] ) : 1;

        if ( ++$number === $count ) {
            // Ok, final item, let's send it back to woocommerce's add_to_cart_action method for handling.
            $_REQUEST['add-to-cart'] = $product_id;

            return WC_Form_Handler::add_to_cart_action( $url );
        }

        $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_id ) );
        $was_added_to_cart = false;
        $adding_to_cart    = wc_get_product( $product_id );

        if ( ! $adding_to_cart ) {
            continue;
        }

        $add_to_cart_handler = apply_filters( 'woocommerce_add_to_cart_handler', $adding_to_cart->get_type(), $adding_to_cart );

        // Variable product handling
        if ( 'variable' === $add_to_cart_handler ) {
            woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_variable', $product_id );

        // Grouped Products
        } elseif ( 'grouped' === $add_to_cart_handler ) {
            woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_grouped', $product_id );

        // Custom Handler
        } elseif ( has_action( 'woocommerce_add_to_cart_handler_' . $add_to_cart_handler ) ){
            do_action( 'woocommerce_add_to_cart_handler_' . $add_to_cart_handler, $url );

        // Simple Products
        } else {
        woo_hack_invoke_private_method( 'WC_Form_Handler', 'add_to_cart_handler_simple', $product_id );
            // WC()->cart->add_to_cart($product_id, $_REQUEST['quantity']);
        }
    }
}

// Fire before the WC_Form_Handler::add_to_cart_action callback.
add_action( 'wp_loaded', 'woocommerce_maybe_add_multiple_products_to_cart', 15 );


/**
* Invoke class private method
*
* @since 0.1.0
*
* @param string $class_name
* @param string $methodName
*
* @return mixed
*/
function woo_hack_invoke_private_method( $class_name, $methodName ) {
if ( version_compare( phpversion(), '5.3', '<' ) ) {
throw new Exception( 'PHP version does not support ReflectionClass::setAccessible()' );
}
$args = func_get_args();
unset( $args[0], $args[1] );
$reflection = new ReflectionClass( $class_name );
$method = $reflection->getMethod( $methodName );
$method->setAccessible( true );
$args = array_merge( array( $reflection ), $args );
return call_user_func_array( array( $method, 'invoke' ), $args );
}

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');


function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
        array(
            'id' => '_configurator1',
            'placeholder' => '',
            'label' => __('Configurator Image', 'woocommerce')
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_configurator2',
            'placeholder' => '',
            'label' => __('Configurator Image Turned', 'woocommerce')
        )
    );
    echo '</div>';

}

function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $woocommerce_custom_product_text_field = $_POST['_configurator1'];
    if (!empty($woocommerce_custom_product_text_field))
        update_post_meta($post_id, '_configurator1', esc_attr($woocommerce_custom_product_text_field));
    $woocommerce_custom_product_number_field = $_POST['_configurator2'];
    if (!empty($woocommerce_custom_product_number_field))
        update_post_meta($post_id, '_configurator2', esc_attr($woocommerce_custom_product_number_field));


}


add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on the page titled 'whatever'
  $post = get_post($post_id);
  $slug = $post->post_name;
  $ignorePosts = array( 
        'romance-copy-blocks',
        'about'
    );
  // $pagename = get_the_title($post_id);
  if( in_array($slug, $ignorePosts) == true) { 
    remove_post_type_support('page', 'editor');
  }
  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if($template_file == 'my-page-template.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}

function wpdocs_excerpt_more( $more ) {
    return '<br><a href="'.get_the_permalink().'" class="read-more" rel="nofollow">Read More...</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

 // Fire before the WC_Form_Handler::add_to_cart_action callback.
 // add_action( 'wp_loaded',        'woocommerce_maybe_add_multiple_products_to_cart', 15 );
/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

add_action( 'get_header', 'bbloomer_remove_storefront_sidebar' );
 
function bbloomer_remove_storefront_sidebar() {
    if ( is_product() ) {
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
    if ( is_single() ) {
        remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

// Edit WooCommerce dropdown menu item of shop page//
// Options: menu_order, popularity, rating, date, price, price-desc
 
function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["popularity"]);
    unset($orderby["rating"]);
    unset($orderby["date"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );

function acf_wysiwyg_remove_wpautop() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
    // Hide the editor on the page titled 'whatever'
    $post = get_post($post_id);
    $slug = $post->post_name;
    $ignorePosts = array( 
            'about'
        );
    // $pagename = get_the_title($post_id);
    if( in_array($slug, $ignorePosts) == false) { 
        remove_filter('acf_the_content', 'wpautop' );
        // remove_post_type_support('page', 'editor');
    }
}

add_action('acf/init', 'acf_wysiwyg_remove_wpautop', 15);


add_action( 'woocommerce_before_shop_loop', 'add_romance_copy_here', 35 );
 
 function add_romance_copy_here() {

    if ( is_shop() ) {

        $pa_stone = $_GET['pa_stone'];
        $pa_element = $_GET['pa_element'];
        $pa_make = $_GET['pa_make'];
        $pa_shape = $_GET['pa_shape'];
        $pa_link = $_GET['pa_link'];

        $custom_query = new WP_Query('page_id=902');
        while($custom_query->have_posts()) : $custom_query->the_post();
            $fields = get_fields();
        endwhile;
        wp_reset_postdata();

        $stone_copy = null;
        $element_copy = null;
        $make_copy = null;
        $shape_copy = null;
        $link_copy = null;
        foreach($fields['repeater'] as $copy) {
            if ($pa_stone == $copy['id']) {
                $stone_copy = $copy;
                break;
            } elseif ($pa_element == $copy['id']) {
                $element_copy = $copy;
                break;
            } elseif ($pa_make == $copy['id']) {
                $make_copy = $copy;
                break;
            } elseif ($pa_shape == $copy['id']) {
                $shape_copy = $copy;
                break;
            } elseif ($pa_link == $copy['id']) {
                $link_copy = $copy;
                break;
            }
        }

        if ($pa_stone != '' && strpos($pa_stone, ',') == false 
            && $stone_copy['copy'] != '' 
            && $pa_element == ''
            && $pa_make == ''
            && $pa_link == ''
            && $pa_shape == '') 
        {
            //only stone selected
            // echo $_GET['pa_stone'];
            echo '<div class="romance-copy">';
            echo '<p>';
            echo $stone_copy['copy'];
            echo '</p>';
            echo '</div>';
            
        } elseif ($pa_element != '' && strpos($pa_element, ',') == false 
            && $element_copy['copy'] != '' 
            && $pa_stone == ''
            && $pa_make == ''
            && $pa_link == ''
            && $pa_shape == '') {

            echo '<div class="romance-copy">';
            echo '<p>';
            echo $element_copy['copy'];
            echo '</p>';
            echo '</div>';

        } elseif ($pa_make != '' && strpos($pa_make, ',') == false 
            && $make_copy['copy'] != '' 
            && $pa_stone == ''
            && $pa_element == ''
            && $pa_link == ''
            && $pa_shape == '') {

            echo '<div class="romance-copy">';
            echo '<p>';
            echo $make_copy['copy'];
            echo '</p>';
            echo '</div>';

        } elseif ($pa_shape != '' && strpos($pa_shape, ',') == false 
            && $shape_copy['copy'] != '' 
            && $pa_stone == ''
            && $pa_element == ''
            && $pa_link == ''
            && $pa_make == '') {

            echo '<div class="romance-copy">';
            echo '<p>';
            echo $shape_copy['copy'];
            echo '</p>';
            echo '</div>';

        } elseif ($pa_link != '' && strpos($pa_link, ',') == false 
            && $link_copy['copy'] != '' 
            && $pa_stone == ''
            && $pa_element == ''
            && $pa_shape == ''
            && $pa_make == '') {

            echo '<div class="romance-copy">';
            echo '<p>';
            echo $link_copy['copy'];
            echo '</p>';
            echo '</div>';

        }


    }
 }

add_action( 'woocommerce_after_single_product_summary', 'add_config_teaser', 5 );
 
function add_config_teaser() {
    echo '<div class="config-teaser">';
    echo '<div class="column">Choose an earring<br>or necklace top.</div>';
    echo '<div class="column">Add a stone,<br>crystal or coin.</div>';
    echo '<div class="column">Add something else<br>to create a totally new<br>piece of jewelry.</div>';
    echo '<div class="wrapper">';
    echo '<a href="'.get_site_url().'/design-your-own/" class="cta">Design your own</a>';
    echo '</div>';
    echo '</div>';
}


/** Remove short description if product tabs are not displayed */
function dot_reorder_product_page() {
    if ( get_option('woocommerce_product_tabs') == false ) {
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    }
}

/** Display product description the_content */
function dot_do_product_desc() {

    global $woocommerce, $post;

    if ( $post->post_content ) : ?>
        <div itemprop="description" class="woocommerce-product-details__long-description">
            <?php $heading = apply_filters('woocommerce_product_description_heading', __('Product Description', 'woocommerce')); ?>

            <!-- <h2><?php echo $heading; ?></h2> -->
            <?php the_content(); ?>

        </div>
    <?php endif;
}
// add_action( 'woocommerce_before_main_content', 'dot_reorder_product_page' );
// add_action( 'woocommerce_single_product_summary', 'dot_do_product_desc', 20 );