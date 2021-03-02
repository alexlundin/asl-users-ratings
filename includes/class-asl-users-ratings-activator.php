<?php

/**
 * Fired during plugin activation
 *
 * @link       https://vk.com/aslundin
 * @since      1.0.0
 *
 * @package    Asl_Users_Ratings
 * @subpackage Asl_Users_Ratings/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Asl_Users_Ratings
 * @subpackage Asl_Users_Ratings/includes
 * @author     Alexandr Lundin <aslundin@ya.ru>
 */
class Asl_Users_Ratings_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        self::create_db_tables();
    }


    public static function create_db_tables()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . users_ratings_table_name();
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $sql
                = "CREATE TABLE $table_name (
                id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                rating_id int(11) NOT NULL,
                status varchar(255) NOT NULL,
                num_column int(2),
                value longtext,
                created_at timestamp NULL,
				updated_at timestamp NULL
                ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
}