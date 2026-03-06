<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function travolo_core_essential_scripts( ) {
    wp_enqueue_script('travolo-ajax',TRAVOLO_PLUGDIRURI.'assets/js/travolo.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'travolo-ajax',
    'travoloajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'travolo-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','travolo_core_essential_scripts');


// travolo Section subscribe ajax callback function
add_action( 'wp_ajax_travolo_subscribe_ajax', 'travolo_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_travolo_subscribe_ajax', 'travolo_subscribe_ajax' );

function travolo_subscribe_ajax( ){
  $apiKey = travolo_opt('travolo_subscribe_apikey');
  $listid = travolo_opt('travolo_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'travolo-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'travolo').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'travolo').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'travolo').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'travolo').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'travolo').'</div>';
        }
   }

   wp_die();

}