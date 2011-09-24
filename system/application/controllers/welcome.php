<?php
/**
 * @author  Randell Benavidez <randell@randell.ph>
 */
class Welcome extends Controller {

    /**
     * Welcome controller constructor
     */
	function Welcome()
	{
		parent::Controller();	
	}

    /**
     * 
     */
	function index()
	{
        $this->template->render('home');
	}

    /**
     * 
     */
    function login()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1|callback_is_valid_login['.$this->input->post('username').']');

        if ($this->form_validation->run())
        {
            redirect('home');
        }
        else
        {
            $this->template->render('index');
        }
    }

    /**
     *
     * @param   string  $password
     * @param   string  $username
     * @return  boolean
     */
    function is_valid_login($password, $username)
    {
        $this->load->model('User_model');

        if ($this->User_model->is_valid_username_and_password($username, $password))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('is_valid_login', 'The username or password you entered is incorrect.');
            return FALSE;
        }
    }

    /**
     * 
     */
    function home()
    {
//        if (get_user_id() == NULL)
//        {
//            redirect('welcome');
//        }

        $this->load->model('Post_model');
        $this->load->model('User_model');

        $username = $this->session->userdata('username');

        $this->load->vars(
            array(
                'posts' => $this->Post_model->get_all(),
                'bio'   => $this->User_model->get_bio($username)
            )
        );

        $this->template->render('home');
    }

    /**
     * 
     */
    function logout()
    {
        $this->session->sess_destroy();

        redirect('welcome');
    }

    function signup()
    {
        $this->template->render('signup');
    }
    
    /**
     *
     */
    function captcha()
    {
        // Load 'captcha_pi.php'
        $this->load->plugin('captcha');

        // Load 'string_helper.php'
        $this->load->helper('string');

        // Generate a random alphanumeric string
        $word = random_string('numeric', 5);

        // Save the word.  No pun intended.
        $this->session->set_flashdata('captcha', $word);

        // Set captcha configurations
        $vals = array(
            'word'       => $word,
            'img_path'   => './images/captcha/',
            'img_url'    => base_url() . 'images/captcha/',
            'img_width'  => 70,
            'img_height' => 30,
            'expiration' => 7200
        );

        // Generate the captcha
        $cap = create_captcha($vals);

        // Show the captcha
        echo $cap['image'];
    }

    /**
     * 
     */
    function about()
    {
        $this->template->render('about');
    }

    /**
     *
     */
    function contact()
    {
        $this->template->render('contact');
    }

    /**
     *
     */
    function blog()
    {
        $this->template->render('blog');
    }

    /**
     *
     */
    function terms()
    {
        $this->template->render('terms');
    }

    /**
     * 
     */
    function help()
    {
        $this->load->view('help');
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */