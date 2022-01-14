<?php

class Model_barang extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function total_barang(){
    	return $this->db->count_all('tb_barang');
    }

    public function total_customer(){
    	return $this->db->where('role_id',2)->from("customer")->count_all_results();
    }

    public function total_feed(){
    	return $this->db->count_all('tb_feed');
    }


    public function getSewa($datafor = null, $where = null)
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_detail_sewa', 'tb_sewa.id_sewa = tb_detail_sewa.id_sewa');
        $this->db->join('tb_detail_bayar', 'tb_sewa.id_sewa = tb_detail_bayar.id_sewa');
        $this->db->join('tb_barang', 'tb_barang.id_brg = tb_detail_sewa.id_brg');
        $this->db->join('customer', 'tb_sewa.id_customer = customer.id_customer');
        $this->db->group_by('kode');
        if ($where != null && $datafor == 'permintaan') {
            $this->db->where($where);
        } elseif ($where != null && $datafor == 'riwayat') {
            $this->db->where($where);
            $this->db->or_where('status_pembayaran', 'paid');
            $this->db->or_where('status_pembayaran', 'cancel');
        }
        return $this->db->get()->result_array();
    }

    public function getBarang()
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_detail_sewa', 'tb_sewa.id_sewa = tb_detail_sewa.id_sewa');
        $this->db->join('tb_detail_bayar', 'tb_sewa.id_sewa = tb_detail_bayar.id_sewa');
        $this->db->join('tb_barang', 'tb_barang.id_brg = tb_detail_sewa.id_brg');
        $this->db->join('customer', 'tb_sewa.id_customer = customer.id_customer');
        return $this->db->get()->result_array();
    }

    public function cari_barang($nama_brg)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->like('nama_brg', $nama_brg, 'both'); 
        //$query = $this->db->query('SELECT * FROM tb_barang WHERE nama_brg LIKE %Rei%');
        return $this->db->get();
    }


    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tampil_feed()
    {
        return $this->db->get('tb_feed');
    }

    public function tampil()
    {
        return $this->db->get('tb_barang', 9);
    }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ambil_id_barang($id)
    {
        $hasil = $this->db->where('id_brg', $id)->get('tb_barang');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function ambil_id_customer($id)
    {
        $hasil = $this->db->where('id_customer', $id)->get('customer');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function edit_customer($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function detail_customer($id_customer)
    {
        $result = $this->db->where('id_customer', $id_customer)->get('customer');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function data_promo()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'promo'));
        return $query->result();
    }

    public function data_bundle()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'bundle'));
        return $query->result();
    }

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db
            ->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('customer');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function data_customer()
    {
        $query = $this->db->get_where("customer", array('role_id' => '2'));
        return $query->result();
    }

    public function update_password($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tambah_sewa($data)
    {
        $this->db->insert('tb_sewa', $data);
    }

    public function insertDetailBayar($data)
    {
        $this->db->insert('tb_detail_bayar', $data);
    }

    public function insertFeed($data)
    {
        $this->db->insert('tb_feed', $data);
    }
    
    public function hapusFeed($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insertDetail($data)
    {
        $this->db->insert_batch('tb_detail_sewa', $data);
    }

    public function getReport($where, $type)
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_detail_sewa', 'tb_sewa.id_sewa = tb_detail_sewa.id_sewa');
        $this->db->join('tb_detail_bayar', 'tb_sewa.id_sewa = tb_detail_bayar.id_sewa');
        $this->db->join('tb_barang', 'tb_barang.id_brg = tb_detail_sewa.id_brg');
        $this->db->join('customer', 'tb_sewa.id_customer = customer.id_customer');
        if ($type == 'items') {
            $this->db->where('tb_detail_sewa.id_brg', $where);
        } else if($type == 'tanggal') {
            $this->db->where('tanggal_sewa', $where);
        }else if($type == 'bulan'){
            $this->db->where("MONTH(tanggal_sewa) = '12'  and YEAR(tanggal_sewa) = '2021'");
        }
        return $this->db->get()->result_array();
    }

    public function setAvailable($data)
    {
        $this->db->update_batch('tb_barang', $data, 'id_brg');
    }
}
