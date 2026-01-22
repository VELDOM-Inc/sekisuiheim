<?php

function my_scripts() {
  wp_enqueue_style( 'base', get_stylesheet_uri() );
}

if ( ! function_exists( 'my_page_templates' ) ) {
    function my_page_templates( $templates ) {
        $template  = get_page_template_slug();
        $pagename  = get_query_var( 'pagename' );

        if ( $pagename && ! $template ) {
            $pagename = str_replace( '/', '__', $pagename );
            $decoded  = urldecode( $pagename );

            if ( $decoded === $pagename ) {
                array_unshift( $templates, "page-{$pagename}.php" );
            }
        }
        return $templates;
    }
}
add_filter( 'page_template_hierarchy', 'my_page_templates' );


/* ---------------------------
 不要なwp_head削除
--------------------------- */
//jQuery
function my_delete_local_jquery() {wp_deregister_script('jquery');}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

//DNSプリフェッチ設定
add_filter( 'emoji_svg_url', '__return_false' );

//絵文字
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles',     'print_emoji_styles' );
remove_action( 'admin_print_styles',  'print_emoji_styles' );

//wp-json削除
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');

//外部投稿ツール設定削除
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

//WPのバージョン削除
remove_action('wp_head', 'wp_generator');

//自動整形を停止
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

/* ---------------------------
 CSS+JS
--------------------------- */
function add_link_files() {
  // CSSの読み込み
	wp_enqueue_style( 'reset', get_template_directory_uri().'/common/css/common.css' );

  if ( is_front_page() ) {
    wp_enqueue_style( 'slick', get_template_directory_uri().'/common/css/slick.css' );
    wp_enqueue_style( 'slick-theme', get_template_directory_uri().'/common/css/slick-theme.min.css' );
  }

  if ( !is_admin() ) {
    wp_deregister_script( 'jquery' );
  }
  // JavaScriptの読み込み
  wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), NULL, false );
  wp_enqueue_script( 'common-js', get_template_directory_uri().'/common/js/common.js', array('jquery'), false, true );
  wp_enqueue_script( 'inview-js', get_template_directory_uri().'/common/js/jquery.inview.min.js', array('jquery'), false, true );

  if ( is_front_page() ) {
    wp_enqueue_script( 'slick', get_template_directory_uri().'/common/js/slick.min.js', array('jquery'), false, true );
  }

  if ( is_page('contact') ) {
    wp_enqueue_script( 'yubinbango-js', '//yubinbango.github.io/yubinbango/yubinbango.js', array('jquery'), false, true );
  }
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );

/* ---------------------------
 画像パスを省略
--------------------------- */
function imdir( $file_name = NULL ) {
  if( $file_name ){
    $url = esc_url( get_template_directory_uri().'/common/img/'.slug().'/'.$file_name );
    $path = get_template_directory().'/common/img/'.slug().'/'.$file_name;

    return $url.'?v='.date( "YmdHis", filemtime( $path ));
  }
  else{
    return esc_url( get_template_directory_uri().'/common/img' );
  }
}

/* ---------------------------
 アイキャッチ画像
--------------------------- */
function setup_theme() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_theme');

/* ---------------------------
 contactform7 pタグ削除
--------------------------- */
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 

/* ---------------------------
 contactform7 にバリデーション追加
--------------------------- */
function custom_wpcf7_validate_kana($result,$tag)
{
    $tag   = new WPCF7_Shortcode($tag);
    $name  = $tag->name;
    $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";

    // 全角カタカナのみ
    if ($name === "furigana") {
      if(!preg_match("/^[ア-ヶー]+$/u", $value)) {
        $result->invalidate( $tag,"全角カタカナで入力してください。");
      }
    }

    return $result;
}
add_filter('wpcf7_validate_text', 'custom_wpcf7_validate_kana', 11, 2);
add_filter('wpcf7_validate_text*', 'custom_wpcf7_validate_kana', 11, 2);

?>
