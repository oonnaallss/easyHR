<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_kehadiran extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_kehadiran');
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
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1")
		{
			$this->load->view('dashboard/administrator/transaksi/v_kehadiran',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$this->load->view('dashboard/superadmin/transaksi/v_kehadiran',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/admin/transaksi/v_kehadiran',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			$this->load->view('dashboard/user/transaksi/v_kehadiran',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function simpan_kehadiran(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$bo=$this->input->post('bo');
		$ket=$this->input->post('ket');
		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_kehadiran->simpan_kehadiran($gol,$es,$ga,$bo,$ket);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			header('location:'.base_url().'');
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_kehadiran->simpan_kehadiran($gol,$es,$ga,$bo,$ket);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}

	function get_kehadiran(){
		$kobar=$this->input->get('id');
		$data=$this->t_kehadiran->kehadiran_by_kode($kobar);
		echo json_encode($data);
	}

	function get_kehadiran_json() { 
		$a1=$this->input->post('id_search');
		$b1=$this->input->post('extra_search');
	    header('Content-Type: application/json');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
		    echo $this->t_kehadiran->kehadiran_list($a1,$b1);
		} else {
		    echo $this->t_kehadiran->kehadiranuser_list($a1,$b1);
		}
	}
	

	function update_kehadiran(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$tanggal=$this->input->post('tanggal');
		$kode=$this->input->post('kode');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
			$data=$this->t_kehadiran->update_kehadiran($gol,$es,$ga,$tanggal,$kode);
			echo json_encode($data);
		}
	}

	function hapus_kehadiran(){
		$kobar=$this->input->post('kode');
		$data=$this->t_kehadiran->hapus_kehadiran($kobar);
		echo json_encode($data);
	}
}

/* End of file transaksi_kehadiran.php */
/* Location: ./application/controllers/transaksi_kehadiran.php */