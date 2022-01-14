<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->library('cart', 'session');
    }

    public function index()
    {
        $data['barang']     = $this->Model_barang->tampil()->result();
        $data['promo']      = $this->Model_barang->data_promo();
        $data['bundle']     = $this->Model_barang->data_bundle();
        $this->load->view('user/header');
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/footer');
    }

    public function produk()
    {
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $this->load->view('user/header');
        $this->load->view('user/produk', $data);
        $this->load->view('user/footer');
    }

    public function produk_cari()
    {
        $data['barang'] = $this->Model_barang->cari_barang($this->uri->segment(3))->result();
        $this->load->view('user/header');
        $this->load->view('user/produk', $data);
        $this->load->view('user/footer');
    }

    public function tambah_ke_keranjang()
    {
        $id = $this->input->post('id');
        $barang = $this->Model_barang->find($id);

        $data = array(
            'id'                    => $barang->id_brg,
            'qty'                   => 1,
            'price'                 => $barang->harga,
            'name'                  => $barang->nama_brg
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('asd');
        redirect('dashboard/welcome');
    }

    public function tambah_ke_promo()
    {
        $id = $this->input->post('id');
        $barang = $this->Model_barang->find($id);


        $data = array(
            'id'                    => $barang->id_brg,
            'qty'                   => 1,
            'price'                 => $barang->promo,
            'name'                  => $barang->nama_brg
        );

        $this->cart->insert($data);
        $this->session->set_flashdata('asd');
        redirect('dashboard/welcome');
    }

    public function detail($id_brg)
    {
        $data['promo']      = $this->Model_barang->data_promo();
        $data['barang']     = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('user/header');
        $this->load->view('user/detail_barang', $data);
        $this->load->view('user/footer');
    }

    public function detail_promo($id_brg)
    {
        $data['bundle']     = $this->Model_barang->data_bundle();
        $data['barang']     = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('user/header');
        $this->load->view('user/detail_promo', $data);
        $this->load->view('user/footer');
    }

    public function detail_keranjang()
    {
        $this->load->view('user/header');
        $this->load->view('user/keranjang');
        $this->load->view('user/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard/welcome');
    }

    public function pembayaran()
    {
        $this->load->view('user/header');
        $this->load->view('user/pembayaran');
        $this->load->view('user/footer');
    }

    public function proses_pesanan()
    {

        $config['upload_path']          = 'uploads/payment/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'pay' . date('ymd') .  $this->session->userdata('id_customer');

        $this->upload->initialize($config);
        $this->upload->do_upload('bukti_bayar');
        $nama = $this->upload->data('file_name');
        $kode = 'TR-O' . strtoupper(random_string('alnum', 8));

        $data['id_customer'] = $this->session->userdata('id_customer');
        $data['kode'] = $kode;
        $data['tanggal_sewa'] = $this->input->post('tanggal_sewa');
        $data['tanggal_kembali'] = $this->input->post('tanggal_kembali');
        $data['status_sewa'] = '0';
        $data['status_pembayaran'] = 'pending';
        $data['jns_pengambilan'] = $this->input->post('jns_ambil');
        $this->Model_barang->tambah_sewa($data);

        $idsewa = $this->db->insert_id();
        $bayar['id_sewa'] = $idsewa;
        $bayar['total_bayar'] = substr($this->input->post('total'), 4);
        $bayar['sudah_bayar'] = substr($this->input->post('bayar'), 4);
        $bayar['bukti_bayar'] = $nama;
        $bayar['jns_pembayaran'] = $this->input->post('jns_bayar');
        $bayar['total_denda'] = 0;
        $this->Model_barang->insertDetailBayar($bayar);

        $barang = $this->input->post('brg');
        $res = array();
        $brg = array();
        for ($i = 0; $i < sizeof($barang['id_brg']); $i++) {
            $res[] = array(
                'id_sewa' => $idsewa,
                'id_brg' => $barang['id_brg'][$i],
                'denda_perhari' => $barang['denda_perhari'][$i]
            );
            $brg[] = array(
                'id_brg' => $barang['id_brg'][$i],
                'status' => 0
            );
        };
        $this->Model_barang->insertDetail($res);
        $this->Model_barang->setAvailable($brg);

        $this->cart->destroy();
        redirect(base_url('dashboard/sukses_sewa'));
    }

    public function sukses_sewa()
    {
        $this->load->view('user/header');
        $this->load->view('user/proses_pesanan');
        $this->load->view('user/footer');
    }

    public function about_renting()
    {
        $this->load->view('user/header');
        $this->load->view('user/about_renting');
        $this->load->view('user/footer');
    }

    public function about_us()
    {
        $this->load->view('user/header');
        $this->load->view('user/about_us');
        $this->load->view('user/footer');
    }

    public function welcome()
    {
        $data['barang']     = $this->Model_barang->tampil()->result();
        $data['promo']      = $this->Model_barang->data_promo();
        $data['bundle']     = $this->Model_barang->data_bundle();
        $this->load->view('user/header');
        $this->load->view('user/welcome', $data);
        $this->load->view('user/footer');
    }

    public function privacy_policy()
    {
        $this->load->view('user/header');
        $this->load->view('user/privacy_policy');
        $this->load->view('user/footer');
    }

    public function terms_condition()
    {
        $this->load->view('user/header');
        $this->load->view('user/terms_condition');
        $this->load->view('user/footer');
    }

    public function profile()
    {
        $id = $this->session->userdata('id_customer');
        $data['detail'] = $this->Model_barang->detail_customer($id);
        $this->load->view('user/header');
        $this->load->view('user/sidebar');
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer');
    }

    public function permintaan_sewa()
    {
        $id = $this->session->userdata('id_customer');
        $where = [
            'tb_sewa.id_customer' => $id,
            'status_pembayaran' => 'pending',
        ];
        $data['transaksi'] = $this->Model_barang->getSewa('permintaan', $where);
        $data['barang'] = $this->Model_barang->getBarang();
        $this->load->view('user/header');
        $this->load->view('user/sidebar');
        $this->load->view('user/permintaan_sewa', $data);
        $this->load->view('user/footer');
    }

    public function feedback()
    {
        if ($this->session->userdata('nama') == '') {
            $user = 'guest' . random_string('numeric', 3);
        } else {
            $user = $this->session->userdata('nama');
            $iduser = $this->session->userdata('id_customer');
        }
        $feed = $this->input->post('feed');
        $data = [
            'namauser'  => $user,
            'feedback'  => $feed,
            'id_customer'  => $iduser
        ];

        $this->Model_barang->insertFeed($data);
        return redirect(base_url('dashboard'));
    }

    public function riwayat_sewa()
    {
        $id = $this->session->userdata('id_customer');
        $where = [
            'tb_sewa.id_customer' => $id,
            'status_pembayaran' => 'confirm'
        ];
        $data['transaksi'] = $this->Model_barang->getSewa('riwayat', $where);
        $data['barang'] = $this->Model_barang->getBarang();
        $this->load->view('user/header');
        $this->load->view('user/sidebar');
        $this->load->view('user/riwayat_sewa', $data);
        $this->load->view('user/footer');
    }

    public function detail_customer($id)
    {
        $data['detail'] = $this->model_barang->ambil_id_customer($id);
        $this->load->view('user/header');
        $this->load->view('user/sidebar');
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer');
    }

    // private function _uploadpay()
    // {
    //     $brg = $this->input->post('id_brg');
    //     $config['upload_path']          = './uploads/payment/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['file_name']            = 'pay' . date('ymd') .  $this->session->userdata('id_customer') . $brg;
    //     $config['overwrite']            = true;
    //     $config['max_size']             = 2048; // 2MB
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload', $config);
    //     if (!$this->upload->do_upload('bukti_bayar')) {
    //         $nama = $this->upload->data("file_name") . $this->upload->data("file_type");
    //         return $nama;
    //     }
    // }
}
