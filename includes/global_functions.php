<?php
if (!function_exists('users_ratings_table_name')) {
    function users_ratings_table_name()
    {
        return 'asl_users_ratings_table';
    }
}

if (!function_exists('users_ratings_admin_role')) {
    function users_ratings_admin_role()
    {
        if (current_user_can('administrator')) {
            return 'administrator';
        }
        $roles = apply_filters('users_ratings_admin_role', array('administrator'));
        if (is_string($roles)) {
            $roles = array($roles);
        }
        foreach ($roles as $role) {
            if (current_user_can($role)) {
                return $role;
            }
        }
        return false;
    }
}