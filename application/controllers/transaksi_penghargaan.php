<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_penghargaan extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_penghargaan');
	}

	public function index()
	{
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		$d['alamat'] = $this->config->item('alamat_instansi');
		$d['mst_pegawai'] = $this->db->get('tbl_user_pegawai');

			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$this->load->view('dashboard/administrator/transaksi/v_penghargaan',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$this->load->view('dashboard/superadmin/transaksi/v_penghargaan',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$this->load->view('dashboard/admin/transaksi/v_penghargaan',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			$this->load->view('dashboard/user/transaksi/v_penghargaan',$d);
		} else {
			header('location:'.base_url().'');
		}
	}

	function simpan_penghargaan(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$data=$this->t_penghargaan->simpan_penghargaan($gol,$es,$ga);
		echo json_encode($data);
	}

	function get_penghargaan(){
		$kobar=$this->input->get('id');
		$data=$this->t_penghargaan->get_penghargaan_by_kode($kobar);
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
		$kode=$this->input->post('kode');
		$data=$this->t_penghargaan->update_penghargaan($gol,$es,$ga,$kode);
		echo json_encode($data);
	}

	function hapus_penghargaan(){
		$kobar=$this->input->post('kode');
		$data=$this->t_penghargaan->hapus_penghargaan($kobar);
		echo json_encode($data);
	}

	function approve_penghargaan(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_penghargaan->approve_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_penghargaan->approve_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_penghargaan->approve_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
	

	function tolak_penghargaan(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_penghargaan->tolak_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_penghargaan->tolak_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_penghargaan->tolak_penghargaan($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
}

/* End of file transaksi_penghargaan.php */
/* Location: ./application/controllers/transaksi_penghargaan.php */