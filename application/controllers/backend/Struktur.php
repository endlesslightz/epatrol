<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Struktur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'session'));
        $this->load->helper(array('text', 'url'));
        $this->load->model(array('PetugasModel'));
        if ($this->session->userdata('nama') == '') {
            redirect(site_url());
        }
        $this->output->set_header('X-Frame-Options: deny');
        $this->output->set_header('X-Content-Type-Options: nosniff');
        $this->output->set_header("X-Powered-By:-");
    }

    public function index()
    {
        $data['link'] = 'struktur';
        // $data['galeri']=$this->GaleriModel->get_foto();
        $this->load->view('backend/struktur/Organisasi', $data);
    }
}
