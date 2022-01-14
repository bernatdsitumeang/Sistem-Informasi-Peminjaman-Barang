<?php

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kategori');
        $this->load->library('cart');
    }

    public function tenda_dome()
    {
        $data['tenda_dome'] = $this->Model_kategori->data_tenda_dome();
        $this->load->view('user/header');
        $this->load->view('user/tenda_dome', $data);
        $this->load->view('user/footer');
    }

    public function tas_punggung()
    {
        $data['tas_punggung'] = $this->Model_kategori->data_tas_punggung();
        $this->load->view('user/header');
        $this->load->view('user/tas_punggung', $data);
        $this->load->view('user/footer');
    }

    public function pakaian_hangat()
    {
        $data['pakaian_hangat'] = $this->Model_kategori->data_pakaian_hangat();
        $this->load->view('user/header');
        $this->load->view('user/pakaian_hangat', $data);
        $this->load->view('user/footer');
    }

    public function peralatan_masak()
    {
        $data['peralatan_masak'] = $this->Model_kategori->data_peralatan_masak();
        $this->load->view('user/header');
        $this->load->view('user/peralatan_masak', $data);
        $this->load->view('user/footer');
    }

    public function perlengkapan_trecking()
    {
        $data['perlengkapan_trecking'] = $this->Model_kategori->data_perlengkapan_trecking();
        $this->load->view('user/header');
        $this->load->view('user/perlengkapan_trecking', $data);
        $this->load->view('user/footer');
    }

    public function accesories()
    {
        // $data['promo'] = $this->Model_kategori->data_promo();
        $data['accesories'] = $this->Model_kategori->data_accesories();
        $this->load->view('user/header');
        $this->load->view('user/accesories', $data);
        $this->load->view('user/footer');
    }
}
