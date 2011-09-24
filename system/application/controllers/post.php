<?php

class Post extends Controller
{

    function Post()
    {
        parent::Controller();
    }

    function index($post_id_hex)
    {
        $this->load->model('Post_model');

        $this->load->vars(
            array(
                'post' => $this->Post_model->get($post_id_hex)
            )
        );

        $this->template->render('post');
    }

    function add()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[140]|xss_clean');

        if ($this->form_validation->run())
        {
            $this->load->model('Post_model');
            $post_id_hex = $this->Post_model->add($this->input->post('message'));

            redirect('sign/'.$post_id_hex);
        }
        else
        {	

        
            redirect('home');
        }
    }

}

/* End of file post.php */
/* Location ./system/application/controllers/post.php */