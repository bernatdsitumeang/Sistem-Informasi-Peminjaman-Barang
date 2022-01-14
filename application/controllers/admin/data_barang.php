<?php

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->library('session');
    }

    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg       = $this->input->post('nama_brg');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $promo          = $this->input->post('promo');
        $status         = $this->input->post('status');
        $gambar         = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path']          = 'uploads/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors('<p>', '</p>');
                print_r($error);
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'promo'         => $promo,
            'status'        => $status,
            'gambar'        => $this->upload->data('file_name')
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        // $where = array('id_brg => $id');
        $data['barang'] = $this->model_barang->edit_barang('id_brg = ' . $id, 'tb_barang')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('admin/footer');
    }

    public function update()
    {
        $id                 = $this->input->post('id_brg');
        $nama_brg           = $this->input->post('nama_brg');
        $keterangan         = $this->input->post('keterangan');
        $kategori           = $this->input->post('kategori');
        $harga              = $this->input->post('harga');
        $promo              = $this->input->post('promo');
        $status             = $this->input->post('status');

        $data = array(
            'nama_brg'      => $nama_brg,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'promo'         => $promo,
            'status'        => $status,
        );

        $where = array(
            'id_brg'        => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang');
    }

    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang');
    }

    public function detail_barang($id)
    {
        $data['detail'] = $this->model_barang->ambil_id_barang($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('admin/footer');
    }
}
