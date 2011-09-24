<?php
class User extends Controller
{

    function User()
    {
        parent::Controller();
    }

    function index($username)
    {
//        if (get_user_id() == NULL)
//        {
//            $this->template->render('index');
//            return;
//        }

        $this->load->model('Post_model');
        $this->load->model('User_model');

        $this->load->vars(
            array(
                'posts' => $this->Post_model->get_all(),
                'bio'   => $this->User_model->get_bio($username)
            )
        );

        $this->template->render('home');
    }

    function signup()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name',               'Name',             'trim|max_length[100]');
        $this->form_validation->set_rules('username',           'Username',         'trim|required|alpha_dash|max_length[10]');
        $this->form_validation->set_rules('email',              'Email',            'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('password',           'Password',         'trim|required|sha1|max_length[50]');
        $this->form_validation->set_rules('retype_password',    'Retype Password',  'trim|required|matches[password]');
        $this->form_validation->set_rules('captcha',            'Captcha',          'trim|required|callback_captcha_check');

        if ($this->form_validation->run())
        {
            $this->load->model('User_model');

            $this->User_model->add(
                $this->input->post('name'),
                $this->input->post('username'),
                $this->input->post('email'),
                $this->input->post('password')
            );

//            $this->load->library('email');
//
//            $this->email->from('pet02@randell.ph', 'Pet 02 Admin');
//            $this->email->to($this->input->post('email'));
//
//            $this->email->subject('Email Test');
//            $this->email->message('Testing the email class.');
//
//            $this->email->send();
//
            $this->load->view('signup_success');
        }
        else
        {
            $this->load->view('signup_form');
        }
    }

    /**
     * 
     */
    function username_exists()
    {
        $this->load->model('User_model');

        if ($this->User_model->username_exists($this->input->post('username')))
        {
            echo Constants::USERNAME_ALREADY_EXISTS;
        }
        else
        {
            echo Constants::BLANK;
        }
    }

    /**
     *
     */
    function email_exists()
    {
        $this->load->model('User_model');

        if ($this->User_model->email_exists($this->input->post('email')))
        {
            echo Constants::EMAIL_ALREADY_EXISTS;
        }
        else
        {
            echo Constants::BLANK;
        }
    }

    /**
     * Used as a callback to verify if the captcha entered by the user is
     * correct
     *
     * @param   string      $captcha
     * @return  boolean
     */
    function captcha_check($captcha)
    {
        if ($captcha == $this->session->flashdata('captcha'))
        {
            return TRUE;
        }
        
        $this->form_validation->set_message('captcha_check', 'Invalid captcha code.');
        return FALSE;
    }

    function subscribe($user_id)
    {
        $this->load->model('Subscription_model');
        $this->Subscription_model->subscribe($user_id, get_user_id());
        $this->load->view('unsubscribe');
    }

    /**
     *
     */
    function settings()
    {
        $this->template->render('settings');
    }
    
}

/* End of file user.php */
/* Location ./system/application/controllers/user.php */