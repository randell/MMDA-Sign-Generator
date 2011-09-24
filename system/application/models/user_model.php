<?php
class User_model extends Model
{

    /**
     * User_model constructor
     */
    function User_model()
    {
        parent::Model();
    }

    /**
     * Checks if the username-password combination exists.  Sets the relevant
     * userdata in session.
     *
     * @param   string  $username
     * @param   string  $password
     * @return  boolean
     */
    function is_valid_username_and_password($username, $password)
    {
        $query = $this->db->query("
            SELECT
                user_id,
                username,
                name,
                registration_stamp
            FROM
                users
            WHERE
                username = ? AND
                password = ?",
            array($username, $password)
        );

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            $this->session->set_userdata(
                array(
                    'user_id'               => $row->user_id,
                    'username'              => $row->username,
                    'name'                  => $row->name,
                    'registration_stamp'    => $row->registration_stamp
                )
            );

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Checks if a given username exists in the database
     *
     * @param   string  $username
     * @return  boolean
     */
    function username_exists($username)
    {
        $query = $this->db->query("
            SELECT
                username
            FROM
                users
            WHERE
                username = ? AND
                status_id = ?",
            array($username, Constants::STATUSES_ACTIVE)
        );

        if ($query->num_rows() > 0)
        {
            $row = $query->row();

            return TRUE;
        }

        return FALSE;
    }

    /**
     * Checks if a given email exists in the database
     *
     * @param   string  $email
     * @return  boolean
     */
    function email_exists($email)
    {
        $query = $this->db->query("
            SELECT
                email
            FROM
                users
            WHERE
                email = ? AND
                status_id = ?",
            array($email, Constants::STATUSES_ACTIVE)
        );

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Inserts a new user to the 'users' table
     *
     * @param   string  $name
     * @param   string  $username
     * @param   string  $email
     * @param   string  $password
     */
    function add($name, $username, $email, $password)
    {
        $user = array(
            'name'      => $name,
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
            'status_id' => Constants::STATUSES_ACTIVE
        );

        $this->db->insert('users', $user);
    }

    function get_bio($username)
    {
        $query = $this->db->query("
            SELECT
                user_id, 
                name
            FROM
                users
            WHERE
                username = ?",
            array($username)
        );

        if ($query->num_rows() > 0)
        {
            return $query->row();
        }

        return NULL;
    }

}

/* End of file user_model.php */
/* Location: ./system/application/models/user_model.php */