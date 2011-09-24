<?php
class Post_model extends Model
{

    function Post_model()
    {
        parent::Model();
    }

    /**
     * Adds a row to the 'posts' table
     *
     * @param   string  $message
     * @param   int     $parent_post_id
     * @return  int
     */
    function add($message)
    {
        // If message already exists, do not create another row for it
        // Instead, just return the post_id_hex
        $post_id_hex = $this->exists($message);

        if ($post_id_hex)
        {
            return $post_id_hex;
        }

        // If you got here, insert the message
        $post = array(
            'message'           => $message
        );
        $this->db->insert('posts', $post);

        // Get the insert_id
        $insert_id = $this->db->insert_id();

        // Use the insert_id and get it's hexadecimal equivalent
        $post_id_hex = array(
           'post_id_hex' => dechex($insert_id),
        );
        $this->db->where('post_id', $insert_id);
        $this->db->update('posts', $post_id_hex);

        return dechex($insert_id);
    }

    function get($post_id_hex)
    {
    	$query = $this->db->query("
            SELECT *
            FROM posts
            WHERE post_id_hex LIKE ?",
            array($post_id_hex)
        );

        return $query->row_array();
    }

    function exists($message)
    {
        $query = $this->db->query("
            SELECT post_id_hex
            FROM posts
            WHERE message LIKE ?",
            array($message)
        );

        if ($query->num_rows() > 0)
        {
            $post = $query->row_array();
            
            return $post['post_id_hex'];
        }

        return FALSE;
    }
    
}

/* End of file post_model.php */
/* Location ./system/application/models/post_model.php */