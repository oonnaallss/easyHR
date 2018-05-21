<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_Hukuman extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_hukuman');
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
			$this->load->view('dashboard/administrator/transaksi/v_hukuman',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$this->load->view('dashboard/superadmin/transaksi/v_hukuman',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/admin/transaksi/v_hukuman',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			$this->load->view('dashboard/user/transaksi/v_hukuman',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function simpan_hukuman(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$data=$this->t_hukuman->simpan_hukuman($gol,$es,$ga);
		echo json_encode($data);
	}

	function get_hukuman(){
		$kobar=$this->input->get('id');
		$data=$this->t_hukuman->get_hukuman_by_kode($kobar);
		echo json_encode($data);
	}

	function get_hukuman_json() { 
	    header('Content-Type: application/json');
	    echo $this->t_hukuman->hukuman_list();
	}
	

	function update_hukuman(){
		$gol=$this->input->post('gol');
		$es=$this->input->post('es');
		$ga=$this->input->post('ga');
		$kode=$this->input->post('kode');
		$data=$this->t_hukuman->update_hukuman($gol,$es,$ga,$kode);
		echo json_encode($data);
	}

	function hapus_hukuman(){
		$kobar=$this->input->post('kode');
		$data=$this->t_hukuman->hapus_hukuman($kobar);
		echo json_encode($data);
	}

	function approve_hukuman(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_hukuman->approve_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_hukuman->approve_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_hukuman->approve_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
	

	function tolak_hukuman(){
		$a2=$this->input->post('ket');
		$kode=$this->input->post('kode');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
			$data=$this->t_hukuman->tolak_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$data=$this->t_hukuman->tolak_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
			$data=$this->t_hukuman->tolak_hukuman($a2,$kode);
			echo json_encode($data);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			header('location:'.base_url().'');
		} else {
			header('location:'.base_url().'');
		}
	}
}

/* End of file transaksi_hukuman.php */
/* Location: ./application/controllers/transaksi_hukuman.php */