<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://vk.com/aslundin
 * @since      1.0.0
 *
 * @package    Asl_Users_Ratings
 * @subpackage Asl_Users_Ratings/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Asl_Users_Ratings
 * @subpackage Asl_Users_Ratings/admin
 * @author     Alexandr Lundin <aslundin@ya.ru>
 */
class Asl_Users_Ratings_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private string $plugin_name;


    /**
     * Custom Post Type Name
     *
     * @var string
     */
    private string $cpt_name;


    /**
     * Custom Taxonomy name
     *
     * @var string
     */
    private string $ct_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private string $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name = 'asl-users-ratings', $version = ASL_USERS_RATINGS_VERSION)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->cpt_name = 'asl-ratings';
        $this->ct_name = 'rating-category';

    }

    public function register_post_type()
    {
        $args = array(
            'label' => __('Users Ratings', 'asl-users-ratings'),
            'public' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'capability_type' => 'post',
            'hierarchical' => false,
            'query_var' => false,
            'supports' => array('title'),
            'labels' => array(
                'name' => __('Users Ratings', 'asl-users-ratings'),
                'singular_name' => __('Rating', 'asl-users-ratings'),
                'menu_name' => __('Users Ratings', 'asl-users-ratings'),
                'add_new' => __('Add Rating', 'asl-users-ratings'),
                'add_new_item' => __('Add New Rating', 'asl-users-ratings'),
                'edit' => __('Edit', 'asl-users-ratings'),
                'edit_item' => __('Edit Rating', 'asl-users-ratings'),
                'new_item' => __('New Rating', 'asl-users-ratings'),
                'view' => __('View Rating', 'asl-users-ratings'),
                'view_item' => __('View Rating', 'asl-users-ratings'),
                'search_items' => __('Search Rating', 'asl-users-ratings'),
                'not_found' => __('No Rating Found', 'asl-users-ratings'),
                'not_found_in_trash' => __('No Rating Found in Trash', 'asl-users-ratings'),
                'parent' => __('Parent Rating', 'asl-users-ratings'),
            ),
        );
        register_post_type($this->cpt_name, $args);
    }

    public function create_rating_taxonomy()
    {
        $args = array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Category Rating', 'asl-users-ratings'),
                'singular_name' => __('Category Rating', 'asl-users-ratings'),
                'search_items' => __('Search Category'),
                'all_items' => __('All Categories'),
                'parent_item' => __('Parent Category'),
                'parent_item_colon' => __('Parent Category:'),
                'edit_item' => __('Edit Category'),
                'update_item' => __('Update Category'),
                'add_new_item' => __('Add New Category'),
                'new_item_name' => __('New Category Name'),
                'menu_name' => __('Category'),
            ),
            'show_ui' => true,
            'show_in_menu' => false,
            'query_var' => true,
        );
        register_taxonomy($this->ct_name, $this->cpt_name, $args);
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Asl_Users_Ratings_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Asl_Users_Ratings_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/asl-users-ratings-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Asl_Users_Ratings_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Asl_Users_Ratings_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/asl-users-ratings-admin.js', array('jquery'), $this->version, false);

    }

}
