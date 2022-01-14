<?php

class Model_kategori extends CI_Model
{
    public function data_tenda_dome()
    {
        // return $this->db->get_where("tb_barang", array('kategori' => 'Tenda Dome'))->result();
        $query = $this->db->get_where("tb_barang", array('kategori' => 'tenda dome'));
        return $query->result();
    }

    public function data_tas_punggung()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'tas punggung'));
        return $query->result();
    }

    public function data_pakaian_hangat()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'pakaian hangat'));
        return $query->result();
    }

    public function data_peralatan_masak()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'peralatan masak'));
        return $query->result();
    }

    public function data_perlengkapan_trecking()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'perlengkapan trecking'));
        return $query->result();
    }

    public function data_accesories()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'accesories'));
        return $query->result();
    }

    public function data_promo()
    {
        $query = $this->db->get_where("tb_barang", array('kategori' => 'promo'));
        return $query->result();
    }
}
