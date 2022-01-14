<?php

class Model_transaksi extends CI_Model
{

    public function total_bayar(){
    	return $this->db->count_all('tb_detail_bayar');
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
            $this->db->or_where('status_pembayaran', 'confirm');
        } elseif ($where != null && $datafor == 'transaksi') {
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

    public function getDetail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_sewa');
        $this->db->join('tb_detail_sewa', 'tb_sewa.id_sewa = tb_detail_sewa.id_sewa');
        $this->db->join('tb_detail_bayar', 'tb_sewa.id_sewa = tb_detail_bayar.id_sewa');
        $this->db->join('tb_barang', 'tb_barang.id_brg = tb_detail_sewa.id_brg');
        $this->db->join('customer', 'tb_sewa.id_customer = customer.id_customer');
        $this->db->where('tb_sewa.id_sewa', $id);
        return $this->db->get()->result_array();
    }

    public function setStatus($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_sewa', $id);
        $this->db->update('tb_sewa');
    }

    public function setKembali($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_sewa', $id);
        $this->db->update('tb_sewa');
    }

    public function setBayar($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_sewa', $id);
        $this->db->update('tb_detail_bayar');
    }

    public function setAvailable($data)
    {
        $this->db->update_batch('tb_barang', $data, 'id_brg');
    }

    public function hapusTransaksi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
