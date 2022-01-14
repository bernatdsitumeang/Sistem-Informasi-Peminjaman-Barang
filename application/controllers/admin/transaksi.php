<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_transaksi');
        $this->load->library('cart', 'session');
    }

    public function index()
    {
        $where = ['status_pembayaran' => 'confirm'];
        $data['transaksi'] = $this->model_transaksi->getSewa('transaksi', $where);
        $data['barang'] = $this->model_transaksi->getBarang();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/data_transaksi', $data);
        $this->load->view('admin/footer');
    }

    public function pesanan_sewa()
    {
        $where = ['status_pembayaran' => 'pending'];
        $data['transaksi'] = $this->model_transaksi->getSewa('permintaan', $where);
        $data['barang'] = $this->model_transaksi->getBarang();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/data_sewa', $data);
        $this->load->view('admin/footer');
    }

    public function batalSewa()
    {
        $id = base64_decode($this->input->get('q'));
        $data = [
            'status_pembayaran' => 'cancel'
        ];
        $barang = $this->input->post('barang');
        echo $barang;
        $res = array();
        for ($i = 0; $i < sizeof($barang['id_brg']); $i++) {
            $res[] = array(
                'status' => '1',
                'id_brg' => $barang['id_brg'][$i]
            );
        };
        $this->model_transaksi->setStatus($id, $data);
        $this->model_transaksi->setAvailable($res);
        redirect(base_url('admin/transaksi'));
    }

    public function konfirmasiBayar()
    {
        $id = base64_decode($this->input->get('q'));
        $data = [
            'status_pembayaran' => 'confirm'
        ];
        $this->model_transaksi->setStatus($id, $data);
        redirect(base_url('admin/transaksi'));
    }

    public function konfirmasiAmbil()
    {
        $id = base64_decode($this->input->get('q'));
        $data = [
            'status_sewa' => '1'
        ];
        $this->model_transaksi->setStatus($id, $data);
        redirect(base_url('admin/transaksi'));
    }

    public function kembali()
    {
        $stssewa = '2';
        $stsbayar = 'paid';
        $id = base64_decode($this->input->get('q'));
        $sudahbayar = $this->input->post('sudah_bayar');
        $barang = $this->input->post('barang');
        $totalbayar = $this->input->post('total_bayar');
        $bayar = $this->input->post('bayar');
        $terlambat = $this->input->post('terlambat');
        $totaldenda = $this->input->post('total_denda');

        // $tbayar = $tot
        $tgl = date('Y-m-d');

        $datasewa = [
            'status_sewa' => $stssewa,
            'keterlambatan' => $terlambat,
            'tanggal_pengembalian' => $tgl,
            'status_pembayaran' => $stsbayar
        ];


        $databayar = [
            'total_bayar'   => $totalbayar,
            'sudah_bayar'   => $sudahbayar + $bayar + $totaldenda,
            'total_denda'   => $totaldenda
        ];
        $res = array();
        for ($i = 0; $i < sizeof($barang['id_brg']); $i++) {
            $res[] = array(
                'status' => '1',
                'id_brg' => $barang['id_brg'][$i]
            );
        };
        $this->model_transaksi->setKembali($id, $datasewa);
        $this->model_transaksi->setBayar($id, $databayar);
        $this->model_transaksi->setAvailable($res);
        redirect(base_url('admin/transaksi'));
    }
    public function detail()
    {
        $id = base64_decode($this->input->get('q'));
        $data = [
            'detail' => $this->model_transaksi->getDetail($id)
        ];
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/detail_transaksi', $data);
        $this->load->view('admin/footer');
    }

    public function hapusTransaksi($id)
    {
        $where = array('id_sewa' => $id);
        $this->model_transaksi->hapusTransaksi($where, 'tb_sewa');
        $alert = array('teks'=>'Inilah contoh penggunaan alert');
        $this->session->set_flashdata($alert);
        echo $this->session->flashdata('teks');
        redirect('admin/transaksi');
    }
}
