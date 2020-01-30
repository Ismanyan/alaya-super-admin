<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    var $API = "";
    var $TOKEN = "";

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->logged_in_super) {
            redirect(base_url('login'));
        }

        $this->TOKEN = $this->session->token_super;
        $this->API = getenv('REST_URL');
    }

    //  Index Page
    public function index()
    {
        // Data for send to view
        $data['title'] = 'Users Management | Alaya Spa';
        $data['branch'] = request_get($this->API.'get/all/branch');
        $data['users'] = request_get($this->API.'get/all/user');
        
        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('page/users');
        $this->load->view('layouts/footer');
    }

    // ADD NEW USER
    public function addNewUser() 
    {
        $query = $this->input->post();
        $response = request_post($this->API.'register',$query);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Added', 'New user successfully added','users');
        } else {
            notif('error', 'Add New User Failed', 'Check User Field & Try Again', 'users');
        }
    }

    // SOFT DELETE USER
    public function DeleteUser($id = null)
    {
        $response = request_delete($this->API.'delete/user/'. $id, NULL);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Deleted', 'User successfully Deleted', 'users');
        } else {
            notif('error', 'Delete User Failed', 'Something is wrong, Please try again', 'users');
        }
    }

    // EDIT USER
    public function editUser()
    {
        $query = $this->input->post();
        
        $url = $this->API.'update/user';
        $url .= '?id=' . $query['id'];
        $url .= '&user_id=' . $query['user_id'];
        $url .= '&fullname=' . $query['fullname'];
        $url .= '&phone=' . $query['phone'];
        $url .= '&pin=' . $query['pin'];
        $url .= '&password=' . $query['password'];
        $url .= '&address=' . $query['address'];
        $url .= '&position_id=' . $query['position_id'];
        $url .= '&branch_id=' . $query['branch_id'];
        
        $response = request_put($url, NULL);

        if ($response['code'] == 200) {
            notif('success', 'Edited successfully', 'Edit User successfully', 'users');
        } else {
            // var_dump($response);
            notif('error', 'Failed to edit', 'Something is wrong, Please try again', 'users');
        }
    }

}
