<?php

class Hasil extends CI_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->model('Model_barang');
        $this->load->library('cart', 'session');
        $this->load->helper('text');
	}
	function index(){
		redirect('blog');
	}

	function cari(){
		$query = strip_tags(htmlspecialchars($this->input->get('search_query',TRUE),ENT_QUOTES));
		$result = $this->Model_barang->cari_barang($query);
		if ($result->num_rows() > 0) {
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian :'.' "'.$query.'"';
		}else{
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian : "Tidak Temukan"';
		}
		//$x['populer_post'] = $this->blog_model->get_popular_post();
		//$site_info = $this->db->get('tbl_site', 1)->row();
		//$v['logo'] =  $site_info->site_logo_header;
		//$x['icon'] = $site_info->site_favicon;
		//$x['header'] = $this->load->view('header',$v,TRUE);
		//$x['footer'] = $this->load->view('footer','',TRUE);
        $this->load->view('user/header');
        $this->load->view('user/produk_cari',$x);
        $this->load->view('user/footer');
	}
}