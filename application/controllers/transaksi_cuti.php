<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_Cuti extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_cuti');
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
			$this->load->view('dashboard/administrator/transaksi/v_cuti',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$this->load->view('dashboard/superadmin/transaksi/v_cuti',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/admin/transaksi/v_cuti',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			$this->load->view('dashboard/user/transaksi/v_cuti',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function simpan_cuti(){
		if($this->session->userdata('logged_in')!="")
		{
			$gol=$this->input->post('a1');
			$es=$this->input->post('b1');
			$ga=$this->input->post('c1');
			$data=$this->t_cuti->simpan_cuti($gol,$es,$ga);
			echo json_encode($data);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function get_cuti(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="2"|| $this->session->userdata('stts')=="3")
		{
		$kobar=$this->input->get('id');
		$data=$this->t_cuti->get_cuti_by_kode($kobar);
		echo json_encode($data);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function get_cuti_json() { 
		if($this->session->userdata('logged_in')!="")
		{
	    header('Content-Type: application/json');
	    echo $this->t_cuti->cuti_list();
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	

	function update_cuti(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3")
		{
			$a2=$this->input->post('a2');
			$b2=$this->input->post('b2');
			$c2=$this->input->post('c2');
			$kode=$this->input->post('kode');
			$data=$this->t_cuti->update_cuti($a2,$b2,$c2,$kode);
			echo json_encode($data);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	

	function approve_cuti(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_cuti->approve_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_cuti->approve_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_cuti->approve_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
	

	function tolak_cuti(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_cuti->tolak_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_cuti->tolak_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_cuti->tolak_cuti($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}

	function hapus_cuti(){
		$kobar=$this->input->post('kode');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_cuti->hapus_cuti($kobar);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_cuti->hapus_cuti($kobar);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			header('location:'.base_url().'');
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
}

/* End of file transaksi_cuti.php */
/* Location: ./application/controllers/transaksi_cuti.php */