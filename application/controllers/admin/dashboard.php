<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->model('model_transaksi');
        $this->load->library('cart', 'session');
    }

    public function index()
    {
        $data['total_bayar'] = $this->model_transaksi->total_bayar();
        $data['total_customer'] = $this->model_barang->total_customer();
        $data['total_barang'] = $this->model_barang->total_barang();
        $data['total_feed'] = $this->model_barang->total_feed();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard/index');
    }

    public function profile()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/profile');
        $this->load->view('admin/footer');
    }

    public function feedback()
    {
        $data['feed'] = $this->model_barang->tampil_feed()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/data_feed', $data);
        $this->load->view('admin/footer');
    }

    public function hapusFeed($id)
    {
        $where = array('id_feed' => $id);
        $this->model_barang->hapusFeed($where, 'tb_feed');
        redirect('admin/dashboard/feedback');
    }
}
