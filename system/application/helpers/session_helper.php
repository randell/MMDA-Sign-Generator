<?php
/**
 * Returns the user_id of the logged-in user
 *
 * @return  integer
 */
function get_user_id()
{
    return get_instance()->session->userdata('user_id');
}

/**
 * Returns the username of the logged-in user
 *
 * @return  string
 */
function get_username()
{
    return get_instance()->session->userdata('username');
}

/* End of file session_helper.php */
/* Location ./system/application/helpers/session_helper.php */