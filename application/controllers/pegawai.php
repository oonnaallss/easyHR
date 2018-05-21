<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	/*
		***	Controller : dashboard_admin.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/
	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		$d['alamat'] = $this->config->item('alamat_instansi');
		$d['mst_golongan'] = $this->db->get('master_golongan');
		$d['mst_role'] = $this->db->get('master_roles');
		$d['mst_jam'] = $this->db->get('master_jam_kerja');

			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/administrator/v_pegawai',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			$this->load->view('dashboard/user/v_pegawai',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$this->load->view('dashboard/superadmin/v_pegawai',$d);
		} else {
			header('location:'.base_url().'');
		}
	}

	public function change_password(){
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
		$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
		$d['instansi'] = $this->config->item('nama_instansi');
		$d['credit'] = $this->config->item('credit_aplikasi');
		$d['alamat'] = $this->config->item('alamat_instansi');
		$d['mst_golongan'] = $this->db->get('master_golongan');
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/administrator/v_ubah',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
			$this->load->view('dashboard/user/v_ubah',$d);
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
			$this->load->view('dashboard/superadmin/v_ubah',$d);
		} else {
			header('location:'.base_url().'');
		}
	}

	function ubah_password(){
		$a1=$this->input->post('a2');
		$b1=$this->input->post('b2');
		$c1=$this->input->post('c2');
		$data=$this->m_pegawai->ubah_password($a1,$b1,$c1);
		echo json_encode($data);
	}

	function get_pegawai(){
		$kobar=$this->input->get('id');
		$data=$this->m_pegawai->get_pegawai_by_kode($kobar);
		echo json_encode($data);
	}

	function hapus_pegawai(){
		$kobar=$this->input->post('kode');
		$data=$this->m_pegawai->hapus_pegawai($kobar);
		echo json_encode($data);
	}

	function update_pegawai(){
		$a2=$this->input->post('a2');
		$b2=$this->input->post('b2');
		$c2=$this->input->post('c2');
		$d2=$this->input->post('d2');
		$e2=$this->input->post('e2');
		$f2=$this->input->post('f2');
		$g2=$this->input->post('g2');
		$h2=$this->input->post('h2');
		$i2=$this->input->post('i2');
		$j2=$this->input->post('j2');
		$k2=$this->input->post('k2');
		$ko=$this->input->post('ko');
		$data=$this->m_pegawai->update_pegawai($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$k2,$ko);
		echo json_encode($data);
	}

	function simpan_pegawai(){
		$a2=$this->input->post('a2');
		$b2=$this->input->post('b2');
		$c2=$this->input->post('c2');
		$d2=$this->input->post('d2');
		$e2=$this->input->post('e2');
		$f2=$this->input->post('f2');
		$g2=$this->input->post('g2');
		$h2=$this->input->post('h2');
		$i2=$this->input->post('i2');
		$j2=$this->input->post('j2');
		$k2=$this->input->post('k2');
		$l2=$this->input->post('l2');
		$ko=$this->input->post('ko');
		$data=$this->m_pegawai->simpan_pegawai($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$k2,$l2);
		echo json_encode($data);
	}

	function get_guest_json() { //data data produk by JSON object
	    header('Content-Type: application/json');
	    echo $this->m_pegawai->pegawai_list();
	}
}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */