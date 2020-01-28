<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{
    /**
     * Default controller
     *
     */

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->logged_in_super) {
            redirect(base_url('login'));
        }
    }

    //  Index Page
    public function index()
    {   
        redirect(base_url('users'));
    }

    // 404 Not Found
    public function page_not_found()
    {
        $this->load->view('errors/404');
    }

    // CLEAR SESSION
    public function logout()
    {
        $sessionData = array('password_super', 'role_super', 'fullname_super', 'pin_super', 'logged_in_super', 'token_super');

        $this->session->unset_userdata($sessionData);
        $this->session->sess_destroy();

        redirect(base_url('login'));
    }
}
