<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Post
{

    const DEFAULT_PARENT_POST_ID = 0;

    var $post_id        = 0;
    var $message        = "";
    var $stamp          = 0;
    var $user_id        = 0;
    var $parent_post_id = 0;

    function __construct()
    {
        
    }

    function get_post_id()
    {
        return $this->post_id;
    }

    function set_post_id($post_id)
    {
        $this->post_id = $post_id;
    }

    function get_message()
    {
        return $this->message;
    }

    function set_message($message)
    {
        $this->message = $message;
    }

    function get_stamp()
    {
        return $this->stamp;
    }

    function set_stamp($stamp)
    {
        $this->stamp = $stamp;
    }

    function get_user_id()
    {
        return $this->user_id;
    }

    function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function get_parent_post_id()
    {
        return $this->parent_post_id;
    }

    function set_parent_post_id($parent_post_id)
    {
        $this->parent_post_id = $parent_post_id;
    }

}

/* End of file Post.php */
/* Location ./system/application/libraries/Post.php */