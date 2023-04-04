<?php
add_action( 'after_setup_theme', 'mary_theme_setup' );
function mary_theme_setup() {
load_theme_textdomain( 'mary_theme', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'mary_theme' ) ) );
}
add_action( 'admin_notices', 'mary_theme_notice' );
function mary_theme_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'mary_theme_notice_dismissed_7' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'mary_theme' ) . '</big></a>' . wp_kses_post( __( '<big><strong>📝 Thank you for using mary_theme!</strong></big>', 'mary_theme' ) ) . '<br /><br /><a href="https://wordpress.org/support/theme/mary_theme/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__( 'Review', 'mary_theme' ) . '</a> <a href="https://github.com/tidythemes/mary_theme/issues" class="button-primary" target="_blank">' . esc_html__( 'Feature Requests & Support', 'mary_theme' ) . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__( 'Donate', 'mary_theme' ) . '</a></p></div>';
}
add_action( 'admin_init', 'mary_theme_notice_dismissed' );
function mary_theme_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'mary_theme_notice_dismissed_7', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'mary_theme_enqueue' );
function mary_theme_enqueue() {
wp_enqueue_style( 'mary_theme-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'mary_theme_footer' );
function mary_theme_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'mary_theme_document_title_separator' );
function mary_theme_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'mary_theme_title' );
function mary_theme_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function mary_theme_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'mary_theme_schema_url', 10 );
function mary_theme_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'mary_theme_wp_body_open' ) ) {
function mary_theme_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'mary_theme_skip_link', 5 );
function mary_theme_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'mary_theme' ) . '</a>';
}
add_filter( 'the_content_more_link', 'mary_theme_read_more_link' );
function mary_theme_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'mary_theme' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'mary_theme_excerpt_read_more_link' );
function mary_theme_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'mary_theme' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'mary_theme_image_insert_override' );
function mary_theme_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'mary_theme_widgets_init' );
function mary_theme_widgets_init() {
    register_sidebar( array(
    'name' => esc_html__( 'Sidebar Widget Area', 'mary_theme' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Logo', 'mary_theme' ),
        'id' => 'logo-area',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 1', 'mary_theme' ),
        'id' => 'footer-widget-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 2', 'mary_theme' ),
        'id' => 'footer-widget-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 3', 'mary_theme' ),
        'id' => 'footer-widget-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 4', 'mary_theme' ),
        'id' => 'footer-widget-4',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Footer Widget 5', 'mary_theme' ),
        'id' => 'footer-widget-5',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
    ) );    
}
add_action( 'wp_head', 'mary_theme_pingback_header' );
function mary_theme_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'mary_theme_enqueue_comment_reply_script' );
function mary_theme_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function mary_theme_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'mary_theme_comment_count', 0 );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


function mary_theme_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// Woocomerce Cart code
add_shortcode ('woo_cart_but', 'woo_cart_but' );

function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <li class="cart-action-item"><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
        <i class="bi bi-cart"></i>
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
	        
    return ob_get_clean();
 
}

// YITH Wishlist code

if ( function_exists( 'YITH_WCWL' ) ) {
	if ( ! function_exists( 'yith_wcwl_add_counter_shortcode' )  ) {
		function yith_wcwl_add_counter_shortcode() {
			add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_print_counter_shortcode' );
		}
	}

	if ( ! function_exists( 'yith_wcwl_print_counter_shortcode' )  ) {
		function yith_wcwl_print_counter_shortcode() {
			?>
			<div class="yith-wcwl-counter">
        <a href="/wishlist">
				<i class="yith-wcwl-icon fa fa-heart"></i>
				<span class="count"><?php // echo esc_html( yith_wcwl_count_all_products() ); ?></span>
    </a>
			</div>
			<?php
		}
	}
	add_action( 'init', 'yith_wcwl_add_counter_shortcode' );
}