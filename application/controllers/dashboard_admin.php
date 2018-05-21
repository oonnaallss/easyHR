<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Administrator extends CI_Controller {

	/*
		***	Controller : dashboard_admin.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	function __construct(){
		parent::__construct();
		$this->load->model('absen');
        $this->load->helper('status_helper');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			$tot_hal = $this->db->query("select * from tbl_cuti where id_pegawai = '".$this->session->userdata('id_user')."'");
			$d['pegawai'] = $tot_hal->num_rows();
			$tot_keh = $this->db->query("select * from tbl_kehadiran where id_pegawai = '".$this->session->userdata('id_user')."' and date_format(tgl_masuk, '%m-%Y') = '".date('m-Y')."' and date_format(tgl_keluar, '%d-%m-%Y') is not null");
			$d['kehadiran'] = $tot_keh->num_rows();
			$d['kalender'] = $this->db->query("select 'Kehadiran' nama,'bg-success' class, date_format(a.tgl_masuk, '%Y-%m-%d') startdate, date_format(a.tgl_keluar, '%Y-%m-%d') enddate from tbl_kehadiran a where a.id_pegawai = '".$this->session->userdata('id_user')."'
				union select 'SPPD' nama,'bg-warning' class, date_format(b.dari, '%Y-%m-%d') startdate, date_format(b.ke , '%Y-%m-%d') enddate from tbl_sppd b where b.status = 3 and b.id_pegawai = '".$this->session->userdata('id_user')."'
				union select 'Cuti' nama,'bg-pink' class, date_format(c.dari, '%Y-%m-%d') startdate, date_format(c.ke , '%Y-%m-%d') enddate from tbl_cuti c where c.status = 3 and c.id_pegawai = '".$this->session->userdata('id_user')."'");
			$q = $this->db->query("select count(id) total from tbl_kehadiran where id_pegawai = '".$this->session->userdata('id_user')."' and date_format(tgl_masuk, '%d-%m-%Y') = '".date('d-m-Y')."' and tgl_keluar is not null");
			//$d['absen'] = $d['absen_det']->id;
        	$this->session->set_userdata('absen', '');
			$d['mst_pegawai'] = $this->db->get('tbl_user_pegawai');
			foreach($q->result() as $dt)
			{
				$d['absen'] = $dt->total; 
			}

			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
			$d['tgl_sekarang'] = date('d-m-Y');
			$d['status_login'] = $this->session->userdata('absen');

			$this->load->view('dashboard/administrator/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function getKalender(){
		$data = $this->absen->getKalender();
		return json_encode($data);
	}

	public function masuk(){
		$data=$this->absen->masuk();
		echo json_encode($data);
	}
	public function keluar(){
		$data=$this->absen->keluar();
		echo json_encode($data);
	}

	public function getData(){
		$html = '<table class="table table-bordered m-0">		
						<thead>
							<tr>
								<th>#</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>';
		$title=$this->input->get('title');
		$tanggal=$this->input->get('tanggal');
		if($title == 'Kehadiran'){
			$query = $this->db->query("select a.nama_lengkap, b.tgl_masuk, b.tgl_keluar, b.keterangan from tbl_user_pegawai a left join tbl_kehadiran b on a.id = b.id_pegawai and date_format(b.tgl_masuk, '%d-%m-%Y') = '".$tanggal."' where a.id = '".$this->session->userdata('id_user')."'");

			while ($row = $query->unbuffered_row())
			{
			       $html .= '<tr>
						<th scope="row">Nama Lengkap</th>
						<td>'.$row->nama_lengkap.'</td>
					</tr>
					<tr>
						<th scope="row">Tanggal Masuk</th>
						<td>'.$row->tgl_masuk.'</td>
					</tr>
					<tr>
						<th scope="row">Tanggal Keluar</th>
						<td>'.$row->tgl_keluar.'</td>
					</tr>
					<tr>
						<th scope="row">Keterangan</th>
						<td>'.$row->keterangan.'</td>
					</tr>';
			}
		} else if($title == 'Cuti'){
			$query = $this->db->query("select a.nama_lengkap, b.dari, b.ke, b.setujui, b.buat, b.status, b.keterangan from tbl_user_pegawai a left join tbl_cuti b on a.id = b.id_pegawai and date_format(b.dari, '%d-%m-%Y') = '".$tanggal."' where a.id = '".$this->session->userdata('id_user')."'");

			while ($row = $query->unbuffered_row())
			{
			       $html .= '<tr>
						<th scope="row">Nama Lengkap</th>
						<td>'.$row->nama_lengkap.'</td>
					</tr>
					<tr>
						<th scope="row">Tanggal Cuti</th>
						<td>'.$row->dari.'</td>
					</tr>
					<tr>
						<th scope="row">Sampai</th>
						<td>'.$row->ke.'</td>
					</tr>
					<tr>
						<th scope="row">Status</th>
						<td>'.ubah_status($row->status).'</td>
					</tr>
					<tr>
						<th scope="row">Di Buat Oleh</th>
						<td>'.viewDashboard($row->buat).'</td>
					</tr>
					<tr>
						<th scope="row">Di Setujui Oleh</th>
						<td>'.viewDashboard($row->setujui).'</td>
					</tr>
					<tr>
						<th scope="row">Keterangan</th>
						<td>'.$row->keterangan.'</td>
					</tr>';
			}
		} else {
			$query = $this->db->query("select a.nama_lengkap, b.dari, b.cost, b.kota, b.ke, b.approve, b.dibuat, b.status, b.keterangan from tbl_user_pegawai a left join tbl_sppd b on a.id = b.id_pegawai and date_format(b.dari, '%d-%m-%Y') = '".$tanggal."' where a.id = '".$this->session->userdata('id_user')."'");

			while ($row = $query->unbuffered_row())
			{
			       $html .= '<tr>
						<th scope="row">Nama Lengkap</th>
						<td>'.$row->nama_lengkap.'</td>
					</tr>
					<tr>
						<th scope="row">Tanggal Sppd</th>
						<td>'.$row->dari.'</td>
					</tr>
					<tr>
						<th scope="row">Sampai</th>
						<td>'.$row->ke.'</td>
					</tr>
					<tr>
						<th scope="row">Anggaran</th>
						<td clas="text-right">'.number_format($row->cost).'</td>
					</tr>
					<tr>
						<th scope="row">Status</th>
						<td>'.ubah_status($row->status).'</td>
					</tr>
					<tr>
						<th scope="row">Di Buat Oleh</th>
						<td>'.viewDashboard($row->dibuat).'</td>
					</tr>
					<tr>
						<th scope="row">Di Setujui Oleh</th>
						<td>'.viewDashboard($row->approve).'</td>
					</tr>
					<tr>
						<th scope="row">Project</th>
						<td>'.$row->kota.'</td>
					</tr>
					<tr>
						<th scope="row">Keterangan</th>
						<td>'.$row->keterangan.'</td>
					</tr>';
			}
		}
		$html .= '</tbody>
			</table>';
		$hasil=array(
			'return' => 'Html',
			'respon' => $html,
		);
		echo json_encode($hasil);
	}
	
	function logout()
	{
		$id_user = $this->session->userdata('id_user');
		$tanggal = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO tbl_histori (id_pegawai,activitas,status,updated)VALUES('$id_user','Logout', 'Logout','$tanggal')");
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */