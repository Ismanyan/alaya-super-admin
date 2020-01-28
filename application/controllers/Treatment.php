<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
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

    public function index()
    {
        // Data for send to view
        $data['title'] = 'Treatment Management | Alaya Spa';
        $data['treatment'] = request_get($this->API.'get/all/treatment', $this->TOKEN);

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('page/treatment');
        $this->load->view('layouts/footer');
    }

    // ADD Treatment
    public function addNewTreatment()
    {
        $query = $this->input->post();
        $response = request_post($this->API.'add/treatment', $query, $this->TOKEN);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Added', 'New Treatment successfully added', 'treatment');
        } else {
            notif('error', 'Add Treatment Failed', 'Something is wrong, Please try again', 'treatment');
        }
    }


    // ADD Treatment Pice
    public function addNewTreatmentPrice()
    {
        $query = $this->input->post();
        $response = request_post($this->API.'add/treatment/price', $query, $this->TOKEN);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Added', 'New Price successfully added', 'treatment');
        } else {
            notif('error', 'Add Price Failed', 'Something is wrong, Please try again', 'treatment');
        }
    }

    // DELETE TREATMENT PRICE
    public function DeleteTreatment($id = null)
    {
        $response = request_delete($this->API.'delete/treatment/' . $id, NULL, $this->TOKEN);

        if ($response['code'] == 200) {
            notif('success', 'Successfully Deleted Price', 'successfully Deleted Price', 'treatment');
        } else {
            notif('error', 'Delete Price Failed', 'Something is wrong, Please try again', 'treatment');
        }

    }


}
