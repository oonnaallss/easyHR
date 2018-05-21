<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_sppd extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('t_sppd');
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
			$this->load->view('dashboard/administrator/transaksi/v_sppd',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$this->load->view('dashboard/superadmin/transaksi/v_sppd',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/admin/transaksi/v_sppd',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			$this->load->view('dashboard/user/transaksi/v_sppd',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function simpan_sppd(){
		$a2=$this->input->post('a2');
		$b2=$this->input->post('b2');
		$c2=$this->input->post('c2');
		$d2=$this->input->post('d2');
		$e2=$this->input->post('e2');
		$f2=$this->input->post('f2');
		$data=$this->t_sppd->simpan_sppd($a2,$b2,$c2,$d2,$e2,$f2);
		echo json_encode($data);
	}

	function get_sppd(){
		$kobar=$this->input->get('id');
		$data=$this->t_sppd->get_sppd_by_kode($kobar);
		echo json_encode($data);
	}

	function get_sppd_json() { 
	    header('Content-Type: application/json');
	    echo $this->t_sppd->sppd_list();
	}
	

	function update_sppd(){
		$a2=$this->input->post('a2');
		$b2=$this->input->post('b2');
		$c2=$this->input->post('c2');
		$d2=$this->input->post('d2');
		$e2=$this->input->post('e2');
		$f2=$this->input->post('f2');
		$kode=$this->input->post('kode');
		$data=$this->t_sppd->update_sppd($a2,$b2,$c2,$d2,$e2,$f2,$kode);
		echo json_encode($data);
	}
	

	function approve_cuti(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$a2=$this->input->post('ket');
			$kode=$this->input->post('kode');
			$data=$this->t_sppd->approve_cuti($a2,$kode);
			echo json_encode($data);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	

	function tolak_cuti(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			$a2=$this->input->post('ket');
			$kode=$this->input->post('kode');
			$data=$this->t_sppd->tolak_cuti($a2,$kode);
			echo json_encode($data);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	function hapus_sppd(){
		$kobar=$this->input->post('kode');
		$data=$this->t_sppd->hapus_sppd($kobar);
		echo json_encode($data);
	}
}

/* End of file transaksi_sppd.php */
/* Location: ./application/controllers/transaksi_sppd.php */