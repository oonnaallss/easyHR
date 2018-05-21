<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('absen');
	}

	function masuk(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('absen')==""){
			$kode=$this->session->userdata('id_user');
			$data=$this->absen->masuk($kode);
			echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}

	function keluar(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('absen')!=""){
			$kode=$this->session->userdata('id_user');
			$data=$this->absen->keluar($kode);
			echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}
}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */