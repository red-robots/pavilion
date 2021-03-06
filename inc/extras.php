<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bellaworks
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

define('THEMEURI',get_template_directory_uri() . '/');

function bellaworks_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_front_page() || is_home() ) {
        $classes[] = 'homepage';
    } else {
        $classes[] = 'subpage';
    }

    $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));

    return $classes;
}
add_filter( 'body_class', 'bellaworks_body_classes' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


function shortenText($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

/* Fixed Gravity Form Conflict Js */
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}

function get_page_id_by_template($fileName) {
    $page_id = 0;
    if($fileName) {
        $pages = get_pages(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => $fileName.'.php'
        ));

        if($pages) {
            $row = $pages[0];
            $page_id = $row->ID;
        }
    }
    return $page_id;
}

function string_cleaner($str) {
    if($str) {
        $str = str_replace(' ', '', $str); 
        $str = preg_replace('/\s+/', '', $str);
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = strtolower($str);
        $str = trim($str);
        return $str;
    }
}

function format_phone_number($string) {
    if(empty($string)) return '';
    $append = '';
    if (strpos($string, '+') !== false) {
        $append = '+';
    }
    $string = preg_replace("/[^0-9]/", "", $string );
    $string = preg_replace('/\s+/', '', $string);
    return $append.$string;
}

function get_instagram_setup() {
    global $wpdb;
    $result = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'sb_instagram_settings'" );
    if($result) {
        $option = ($result->option_value) ? @unserialize($result->option_value) : false;
    } else {
        $option = '';
    }
    return $option;
}

function get_social_links() {
    $social_types = social_icons();
    $social = array();
    foreach($social_types as $k=>$icon) {
        $value = get_field($k,'option');
        if($value) {
            $social[$k] = array('link'=>$value,'icon'=>$icon);
        }
    }
    return $social;
}

function social_icons() {
    $social_types = array(
        'facebook'  => 'fab fa-facebook-f',
        'twitter'   => 'fab fa-twitter',
        'linkedin'  => 'fab fa-linkedin-in',
        'instagram' => 'fab fa-instagram',
        'youtube'   => 'fab fa-youtube',
        'snapchat'  => 'fab fa-snapchat-ghost',
    );
    return $social_types;
}

function parse_external_url( $url = '', $internal_class = 'internal-link', $external_class = 'external-link') {

    $url = trim($url);

    // Abort if parameter URL is empty
    if( empty($url) ) {
        return false;
    }

    //$home_url = parse_url( $_SERVER['HTTP_HOST'] );     
    $home_url = parse_url( home_url() );  // Works for WordPress

    $target = '_self';
    $class = $internal_class;

    if( $url!='#' ) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {

            $link_url = parse_url( $url );

            // Decide on target
            if( empty($link_url['host']) ) {
                // Is an internal link
                $target = '_self';
                $class = $internal_class;

            } elseif( $link_url['host'] == $home_url['host'] ) {
                // Is an internal link
                $target = '_self';
                $class = $internal_class;

            } else {
                // Is an external link
                $target = '_blank';
                $class = $external_class;
            }
        } 
    }

    // Return array
    $output = array(
        'class'     => $class,
        'target'    => $target,
        'url'       => $url
    );

    return $output;
}


add_action( 'load-page.php', 'hide_tinyeditor_wp' );
function hide_tinyeditor_wp() {
    if( !isset( $_GET['post'] ) )
        return;

    $pages = get_field("hide_default_wp_editor","option");
    if($pages) {
        if( in_array($_GET['post'], $pages) ) {
            remove_post_type_support('page', 'editor');
        }
    }
}

/* ACF Custom Style for Text Editor */
add_action('acf/input/admin_head', 'my_acf_custom_css');
function my_acf_custom_css() { ?>
    <style type="text/css">
        .acf-field[data-name="section_1_description"] .mce-edit-area iframe,
        .acf-field[data-name="banner_description"] .mce-edit-area iframe{
            height: 200px !important;
        }
        /* Gallery ACF with Website URL field */
        .acf-field-5f6efd2db01b1 tr[data-name="caption"],
        .acf-field-5f6efd2db01b1 tr[data-name="description"],
        .acf-field-5f6efd2db01b1 .media-types.media-types-required-info {
            display: none!important;
        }
    </style>
    <?php    
}


add_shortcode( 'contact_information', 'display_contact_info' );
function display_contact_info( $atts ) {

    $atts = shortcode_atts( array(
        'class' => '',
        'show'=>'all'
    ), $atts, 'contact_information' );

    $custom_class = ($atts['class']) ? ' ' . $atts['class'] : '';
    $show = ($atts['show']) ? $atts['show'] : 'all';

    $address_line1 = get_field("address","option");
    $address_line2 = get_field("address_line2","option");
    // $addressArr = array($address_line1,$address_line2);
    // $address = ($addressArr && array_filter($addressArr)) ? implode(", ",array_filter($addressArr)) : '';
    $address = '';
    if($address_line1) {
        $address = '<span class="address1">'.$address_line1.'</span>';
    }
    if($address_line2) {
        $address .= '<span class="address2">'.$address_line2.'</span>';
    }

    $phone = get_field("phone","option");
    $fax = get_field("fax","option");
    $gmap = get_field("gmap","option");
    $emailz = get_field("email","option");
    $options = array(
      'address'=>$address,
      'phone'=>$phone,
      'fax'=>$fax,
      'map'=>$gmap,
      'email' => $emailz
    );

    $output = ''; 
    $isPhNums = array('phone','fax');
    $isEmails = array('email');
    $placeholder = THEMEURI . 'images/rectangle.png';
    include( locate_template('inc/icons-svg.php') );

    ob_start(); ?>

    <div class="contact-info-shortcode<?php echo $custom_class?>">
      <div class="inner">
        <?php if ($show=='all' || $show=='') { 

            $phNums = array('phone','fax');
            foreach($options as $k=>$v) { 
            ?>
              
              <?php if (in_array($k,$isPhNums)) { ?>
                <span class="sc-<?php echo $k?> ph">
                  <a href="tel:<?php echo format_phone_number($v); ?>">
                    <i class="customicon-<?php echo $k?>"></i><?php echo $v ?>
                  </a>
                </span>
              <?php } else { ?>

                <?php if (in_array($k, $isEmails)) { ?>
                  <span class="sc-<?php echo $k?>">
                    <a href="mailto:<?php echo antispambot($v,1); ?>">
                        <i class="customicon-email"></i> <?php echo antispambot($v); ?>
                    </a></span>
                <?php } else { ?>
                  <?php if ($k=='map') { ?>
                    <span class="sc-<?php echo $k?>">
                      <?php echo $v ?>
                      <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="mapdivHelper">
                    </span>
                  <?php } else { ?>
                    <span class="sc-<?php echo $k?>"><?php echo $v ?></span>
                  <?php } ?>
                <?php } ?>

              <?php } ?>

            <?php } ?>

        <?php } else { ?>

          <?php if ($show) {
            $args = explode(",",$show); 
            foreach($args as $k) { 
              $v = ( isset($options[$k]) && $options[$k] ) ? $options[$k] :'';
              if($v) { ?>

                  <?php if (in_array($k,$isPhNums)) { ?>
                    <span class="sc-<?php echo $k?> ph">
                      <a href="tel:<?php echo format_phone_number($v); ?>">
                        <i class="customicon-<?php echo $k?>"></i><?php echo $v ?>
                      </a>
                    </span>
                  <?php } else { ?>

                    <?php if (in_array($k, $isEmails)) { ?>
                      <span class="sc-<?php echo $k?>">
                        <a href="mailto:<?php echo antispambot($v,1); ?>">
                            <i class="fal fa-envelope"></i> <?php echo antispambot($v); ?>
                        </a>
                    </span>
                    <?php } else { ?>
                      

                      <?php if ($k=='map') { ?>
                        <span class="sc-<?php echo $k?>">
                          <?php echo $v ?>
                          <img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="mapdivHelper">
                        </span>
                      <?php } else { ?>
                        <span class="sc-<?php echo $k?>"><?php echo $v ?></span>
                      <?php } ?>

                    <?php } ?>

                  <?php } ?>

              <?php } ?>
            <?php } ?>
          <?php } ?>

        <?php } ?>
      </div>
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

