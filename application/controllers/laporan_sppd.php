<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_sppd extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_penghargaan');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1")
		{

			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');

			$this->load->view('dashboard/administrator/laporan/v_sppd',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function simpan_penghargaan(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$bo=$this->input->post('bo');
		$cu=$this->input->post('cu');
		$ket=$this->input->post('ket');
		$data=$this->t_penghargaan->simpan_penghargaan($gol,$es,$ga,$bo,$cu,$ket);
		echo json_encode($data);
	}

	function get_penghargaan(){
		$kobar=$this->input->get('id');
		$data=$this->t_penghargaan->penghargaan_list($kobar);
		echo json_encode($data);
	}

	function get_penghargaan_json() { 
	    header('Content-Type: application/json');
	    echo $this->t_penghargaan->penghargaan_list();
	}
	

	function update_penghargaan(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$bo=$this->input->post('bo');
		$cu=$this->input->post('cu');
		$ket=$this->input->post('ket');
		$kode=$this->input->post('kode');
		$data=$this->t_penghargaan->update_penghargaan($gol,$es,$ga,$bo,$cu,$ket,$kode);
		echo json_encode($data);
	}

	function hapus_penghargaan(){
		$kobar=$this->input->post('kode');
		$data=$this->t_penghargaan->hapus_penghargaan($kobar);
		echo json_encode($data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file transaksi_penghargaan.php */
/* Location: ./application/controllers/transaksi_penghargaan.php */