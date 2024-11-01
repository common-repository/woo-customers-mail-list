<?php 
/*
 * @since             1.0.0
 * @package           woo customers Mail List wordpress plugin
 *
 *
 * woo sub menu page for woo customerss mail list
 *
 *
*/
add_action('admin_menu', 'woo_customers_mail_list_page');

function woo_customers_mail_list_page() {
    add_submenu_page( 'woocommerce', 'customers mail list', 'customers mail list', 'manage_options', 'woo-customers-mail-list', 'woo_customers_mail_list_callback' );
}

function woo_customers_mail_list_callback() {
?>
    <div class="wrap"><div id="icon-tools" class="wcml-page"></div>
        <h1><?php esc_html_e( 'Customers Email list', 'woo-customers-mail-list' ); ?></h1>
    </div>
    <div id="primary" class="content-area full-width">
		<main id="main" class="site-main">
		    <div class="container">
<?php if(is_user_logged_in()): ?>
		<table class="widefat">
            <thead>
                <tr>
                    <th class="row-title"><?php esc_html_e( 'Number', 'woo-customers-mail-list' ) ?></th>
                    <th><?php esc_html_e( 'customers ID', 'woo-customers-mail-list' ) ?></th>
                    <th><?php esc_html_e( 'customers Name', 'woo-customers-mail-list' ) ?></th>
                    <th><?php esc_html_e( 'customers Email', 'woo-customers-mail-list' ) ?></th>
               </tr>
            </thead>

             <tbody>
<?php
    global $woocommerce;
		$wcmlc_filters = array(
		    'post_status' => 'completed',
		    'post_type' => 'shop_order',
		    'posts_per_page' => -1,
		    'paged' => 1,
		    'orderby' => 'modified',
		    'order' => 'DESC'
		);


                            $wcmlc_loop = new WP_Query($wcmlc_filters);
                            $number = 0;
                            while ($wcmlc_loop->have_posts()) {
                                $wcmlc_loop->the_post();
                                $order = new WC_Order($wcmlc_loop->post->ID);
                                $items = $order->get_items();
                                $number++;
                                ?>

                                    <tr class="">
                                       
                                        <td class="row-title"><?php echo esc_html($number); ?></td>
                                        <td><?php echo esc_html($order->get_customer_id()); ?></td>
                                        <td><?php echo esc_html($order->get_billing_first_name()); ?> <?php echo esc_html($order->get_billing_last_name()); ?></td>
                                        <td><?php echo esc_html($order->get_billing_email()); ?></td>
                                       
                                        
                                    </tr>

                                    <?php

                             }
                             ?>
                         </tbody>

                     </table>
        <?php else: ?>
       <h1 class="text-center">404 Not Found</h1>
        <?php endif; ?>
                     </div>
		</main><!-- #main -->

	</div><!-- #primary -->
<?php

}