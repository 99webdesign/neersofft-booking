<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
global $wpdb;
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}nsb_appointments, {$wpdb->prefix}nsb_services, {$wpdb->prefix}nsb_agents, {$wpdb->prefix}nsb_customers, {$wpdb->prefix}nsb_payments" );
delete_option( 'nsb_settings' );
