/**
 * Change image.
 *
 * @package sample_wp_functionality
 */

document.querySelector( 'div.wp-block-cover.alignfull.has-white-background-color.hero-section > img.wp-block-cover__image-background' ).src    = image_ajax_object.random_image;
document.querySelector( 'div.wp-block-cover.alignfull.has-white-background-color.hero-section > img.wp-block-cover__image-background' ).srcset = image_ajax_object.random_image;
