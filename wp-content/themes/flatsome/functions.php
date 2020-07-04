<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */

/* Cài Ð?t SMTP Gmail Không C?n S? D?ng Plugin */
add_action( 'phpmailer_init', function( $phpmailer ) {
    if ( !is_object( $phpmailer ) )
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->Username   = 'trungnguyenpersonal@gmail.com';
    $phpmailer->Password   = 'lbumyribnwoaaejl';
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->From       = 'trungnguyenpersonal@gmail.com';
    $phpmailer->FromName   = 'Shop Nội thất gỗ tự nhiên Chí Trung';
});