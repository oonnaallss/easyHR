<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	/*
		***	Controller : dashboard_admin.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/
	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('m_golongan');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');


			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
			$this->load->view('dashboard/administrator/master/v_golongan',$d);
		} else {
			header('location:'.base_url().'');
		}
	}

	function simpan_golongan(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$bo=$this->input->post('bo');
		$cu=$this->input->post('cu');
		$ket=$this->input->post('ket');
		$data=$this->m_golongan->simpan_golongan($gol,$es,$ga,$bo,$cu,$ket);
		echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}

	function get_golongan(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
		$kobar=$this->input->get('id');
		$data=$this->m_golongan->get_golongan_by_kode($kobar);
		echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}

	function get_golongan_json() { 
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
	    header('Content-Type: application/json');
	    echo $this->m_golongan->golongan_list();
		} else {
			header('location:'.base_url().'');
		}
	}
	

	function update_golongan(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$gol=$this->input->post('gol');
			$es=$this->input->post('es');
			$ga=$this->input->post('ga');
			$bo=$this->input->post('bo');
			$cu=$this->input->post('cu');
			$ket=$this->input->post('ket');
			$kode=$this->input->post('kode');
			$data=$this->m_golongan->update_golongan($gol,$es,$ga,$bo,$cu,$ket,$kode);
			echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}

	function hapus_golongan(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
		$kobar=$this->input->post('kode');
		$data=$this->m_golongan->hapus_golongan($kobar);
		echo json_encode($data);
		} else {
			header('location:'.base_url().'');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */