<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
{

    var $API = "";

    public function __construct()
    {
        parent::__construct();
        
        if (!$this->session->logged_in_super) {
            redirect(base_url('login'));
        }

        $this->API = getenv('REST_URL');
    }

    public function index()
    {
        // Data for send to view
        $data['title'] = 'Branch Management | Alaya Spa';
        $data['branch'] = request_get($this->API.'get/all/branch');
        // $data['users'] = request_get($this->API.'get/all/user');

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('page/branch');
        $this->load->view('layouts/footer');
    }

    // DELETE BRANCH
    public function DeleteBranch($id = null)
    {
        $response = request_delete($this->API.'delete/branch/' . $id, NULL);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Deleted Branch', 'successfully Deleted Branch', 'branch');
        } else {
            var_dump($this->TOKEN);
            var_dump($response);
            // notif('error', 'Delete Branch Failed', 'Something is wrong, Please try again', 'branch');
        }
    }

    // ADD NEW BRANCH
    public function addNewBranch()
    {
        $query = $this->input->post();
        $response = request_post($this->API.'add/branch', $query);
        
        if ($response['code'] == 200) {
            notif('success', 'Successfully Added', 'New Branch successfully added', 'branch');
        } else {
            var_dump($response);
            // notif('error', 'Add Branch Failed', 'Something is wrong, Please try again', 'branch');
        }
    }

    // EDIT BRANCH
    public function editBranch()
    {
        $query = $this->input->post();

        $url = $this->API.'update/branch';
        $url .= '?id=' . $query['id'];
        $url .= '&branch_name=' . $query['branch_name'];
        $url .= '&phone=' . $query['phone'];
        $url .= '&map_url=' . $query['map_url'];
        $url .= '&latitude=' . $query['latitude'];
        $url .= '&longitude=' . $query['longitude'];
        $url .= '&open_hour=' . $query['open_hour'];
        $url .= '&closing_time=' . $query['closing_time'];
        $url .= '&address=' . $query['address'];

        $response = request_put($url,NULL);

        if ($response['code'] == 200) {
            notif('success', 'Branch Edited successfully', 'Edit User successfully', 'branch');
        } else {
            var_dump($this->TOKEN);
            var_dump($response);
            // notif('error', 'Failed to edit', 'Something is wrong, Please try again', 'branch');
        }
    }
}