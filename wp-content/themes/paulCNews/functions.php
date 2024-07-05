<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
 wp_enqueue_style( 'normalize-styles',
"https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
add_action('wp_enqueue_scripts', 'add_normalize_CSS');

// ####  THEME FILES  #####
function theme_files()
{
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), true, true );
  
    // registering custom script
    wp_enqueue_script('print-button', get_template_directory_uri() . '/js/print_button.js', array('jquery'), '1.0', true);
    wp_enqueue_script('progress-bar', get_template_directory_uri() . '/js/progress-bar.js', array('jquery'), '1.0', true);
    wp_enqueue_script('toggle-font-size', get_template_directory_uri() . '/js/toggle-font-size.js', array('jquery'), '1.0', true);
    wp_enqueue_script('toggle-background', get_template_directory_uri() . '/js/toggle-background.js', array('jquery'), '1.0', true);
}

add_action( 'wp_enqueue_scripts', 'theme_files' );



// ####  REGISTER / ADDING SUPPORT  #####
// Register a custom logo
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

// Hook the post/page Featured Images 
add_theme_support( 'post-thumbnails' ); 

// Hook the post/page Meta Title Tag Support (auto generates)
add_theme_support( 'title-tag' );

// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_widget_support' );

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');


//Register search form + HTML5 support
function wpdocs_after_setup_theme() {
   add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );   


// ####  WIDGETS/BANNERS  #####
// Register a new banner simply named 'home_banner_slider'
function custom_widgets() {
  register_sidebar( array(
    'name' => 'Nav Bar - Top Menu',
    'id' => 'nav_bar_top_nav',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'Header Banner (advertising) 1240x155px',
    'id' => 'header_banner',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );


  register_sidebar( array(
    'name' => 'Top Nav (advertising) 728x90px',
    'id' => 'top_nav_banner',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ) );  

  register_sidebar( array(
    'name' => 'Post Body (advertising) 728x90px',
    'id' => 'post_body_banner',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ) );  

    register_sidebar( array(
      'name' => 'Post Sidebar (advertising) 300x600px',
      'id' => 'post_skyscraper_banner',
      'before_widget' => '<div class="sidebar pb-5">',
      'after_widget' => '</div>',
      'before_title' => '',
      'after_title' => '',
    ) );

  register_sidebar( array(
    'name' => 'NBA Latest Video (Youtube link)',
    'id' => 'nba_latest_video',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'UFC Latest Video (Youtube link)',
    'id' => 'ufc_latest_video',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
    ) );

  register_sidebar( array(
    'name' => 'Footer Usefull Links',
    'id' => 'footer_isefull_links',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'Footer Partners Logos 150xAutopx',
    'id' => 'footer_partners_logo',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'Advertise Form',
    'id' => 'advertise_form',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'Subscribe Form',
    'id' => 'subscribe_form',
    'before_widget' => '<div style="height: 600px;" class=" sticky-md-top">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
  ) );

  register_sidebar( array(
    'name' => 'Contact Form',
    'id' => 'contact_form',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ) );
   }
   

  //  Register video to thumbnail
  function get_youtube_video_id($url) {
    // Match the video ID using a regular expression
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    
    // Attempt to match the pattern in the given URL
    preg_match($pattern, $url, $matches);

    // If a match is found, return the video ID
    return isset($matches[1]) ? $matches[1] : '';
}

// Add custom image size
if (function_exists('add_image_size')) {
  add_image_size('custom_size', 850, 500, true); // 'true' enables hard cropping
}


// Register a new sidebar simply named 'sidebar'
function add_widget_support() {
register_sidebar( array(
'name' => 'Website Sidebar 300x600px',
'id' => 'sidebar',
'before_widget' => '<div class="sidebar sticky-lg-top pt-5 pb-5 pb-lg-3">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
) );
}


// Hook the widget initiation and run our function
add_action( 'widgets_init', 'custom_widgets' );   



// Author,date,tags archives register "post types"
function include_partner_videos_in_archives( $query ) {
  if ( $query->is_main_query() && ( $query->is_author || $query->is_date || $query->is_tag ) ) {
      $query->set( 'post_type', array( 'post', 'partner-videos' ) );
  }
}
add_action( 'pre_get_posts', 'include_partner_videos_in_archives' );




// Pagination 
function custom_pagination($paged = '', $max_page = '') {
  global $wp_query;
  
  if (!$paged) {
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  }
  if (!$max_page) {
      $max_page = $wp_query->max_num_pages;
  }

  $big = 999999999; // need an unlikely integer

  echo paginate_links(array(
      'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format'    => '?paged=%#%',
      'current'   => max(1, $paged),
      'total'     => $max_page,
      'prev_text' => __('« Previous', 'textdomain'),
      'next_text' => __('Next »', 'textdomain'),
      'type'      => 'list',
  ));
}






// Function to limit excerpt length by characters
function custom_excerpt_length($text, $length = 170) {
  $excerpt = wp_strip_all_tags($text); // Remove HTML tags from the text
  $excerpt = mb_substr($excerpt, 0, $length); // Limit the excerpt length
  $excerpt = rtrim($excerpt, " \t\n\r\0\x0B.,;"); // Remove trailing whitespace and punctuation
  $excerpt = $excerpt . '...'; // Add an ellipsis to indicate continuation

  return $excerpt;
}





// Filter the excerpt
add_filter('get_the_excerpt', 'custom_excerpt_length');