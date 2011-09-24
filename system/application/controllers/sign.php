<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Sign extends Controller
{

    function Sign()
    {
        parent::Controller();
    }

    function index($post_id_hex = 0)
    {
        $this->load->model('Post_model');

        $this->load->vars(
            array(
                'post' => $this->Post_model->get($post_id_hex)
            )
        );

        $this->template->render('post');
    }

}

/* End of file post.php */
/* Location ./system/application/controllers/post.php */