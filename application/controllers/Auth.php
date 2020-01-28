<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    var $API = "";

    public function __construct()
    {
        parent::__construct();

        if ($this->session->logged_in_super) {
            redirect(base_url());
        }

        $this->API = getenv('REST_URL');
    }

    // LOGIN PAGE
    public function login() 
    {
        if ($this->session->password_super) {
            redirect(base_url('pin'));
        }

        // Data for send to view
        $data['title'] = 'Login Admin | Alaya Spa';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('page/auth/login');
        $this->load->view('layouts/footer');
    }

    // LOGIN CHECK
    public function login_check()
    {
        $query = $this->input->post();
        $response = request_auth($this->API . 'login', $query);

        if ($response['code'] === 200 && $response['body']->result->position_id == 3) {
            $sessionData = array(
                'password_super'  => true,
                'role_super'      => 3,
                'fullname_super'  => $response['body']->result->fullname,
                'pin_super'       => $response['body']->result->pin,
                'token_super'     => $response['body']->result->api_token
            );

            $this->session->set_userdata($sessionData);
            
            notif('success','Login Success',$response['body']->message, 'pin');
        } else {
            notif('error','Login Failed','Check your User ID & Password', 'login');
        }
    }

    // PIN PAGE
    public function pin()
    {
        // Data for send to view
        $data['title'] = 'Pin Verify Admin | Alaya Spa';

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('page/auth/pin');
        $this->load->view('layouts/footer');
    }

    // PIN VERIFY
    public function pin_check()
    {
        $pin = $this->input->post('pin');

        if ($pin == $this->session->pin_super) {
            $sessionData = array(
                'logged_in_super' => true
            );

            $this->session->set_userdata($sessionData);
            notif('success', 'Pin Verify Success', "Welcome to Dashboard", 'home');
        } else {
            notif('error', 'Pin Verify Failed', 'Pin Mismatch', 'pin');
        }
    }
}
