<?php

class Data_customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->library('session');
    }

    public function index()
    {
        $data['customer']       = $this->model_barang->data_customer();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/data_customer', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_customer_aksi()
    {
        $nama           = $this->input->post('nama');
        $username       = $this->input->post('username');
        $alamat         = $this->input->post('alamat');
        $gender         = $this->input->post('harga');
        $no_telepon     = $this->input->post('no_telepon');
        $no_ktp         = $this->input->post('no_ktp');
        $password       = $this->input->post('password');
        $data = array(
            'nama'          => $nama,
            'username'      => $username,
            'alamat'        => $alamat,
            'gender'        => $gender,
            'no_telepon'    => $no_telepon,
            'no_ktp'        => $no_ktp,
            'password'      => $password
        );

        $this->model_barang->tambah_customer($data, 'customer');
        redirect('admin/data_customer/index');
    }

    public function edit($id)
    {
        // $where = array('id_customer => $id');
        $data['customer'] = $this->model_barang->edit_customer('id_customer = ' . $id, 'customer')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_customer', $data);
        $this->load->view('admin/footer');
    }

    public function update()
    {
        $id                 = $this->input->post('id_customer');
        $nama               = $this->input->post('nama');
        $username           = $this->input->post('username');
        $alamat             = $this->input->post('alamat');
        $gender             = $this->input->post('gender');
        $no_telepon         = $this->input->post('no_telepon');
        $no_ktp             = $this->input->post('no_ktp');
        $password           = $this->input->post('password');

        $data = array(
            'nama'          => $nama,
            'username'      => $username,
            'alamat'        => $alamat,
            'gender'        => $gender,
            'no_telepon'    => $no_telepon,
            'no_ktp'        => $no_ktp,
            'password'      => $password,
        );

        $where = array(
            'id_customer'        => $id
        );

        $this->model_barang->update_data($where, $data, 'customer');
        redirect('admin/data_customer');
    }

    public function hapus($id)
    {
        $where = array('id_customer' => $id);
        $this->model_barang->hapus_data($where, 'customer');
        redirect('admin/data_customer');
    }

    public function detail_customer($id)
    {
        $data['detail'] = $this->model_barang->ambil_id_customer($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/detail_customer', $data);
        $this->load->view('admin/footer');
    }
}
