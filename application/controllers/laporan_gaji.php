<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_gaji extends CI_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->library('datatables');
		$this->load->model('l_gaji');
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
			$this->load->view('dashboard/administrator/laporan/v_gaji',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{

			$this->load->view('dashboard/superadmin/laporan/v_gaji',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			$d['mst_pegawai'] = $this->db->get_where('tbl_user_pegawai', array('id' => $this->session->userdata('id_user')));
			$this->load->view('dashboard/user/laporan/v_gaji',$d);
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			$this->load->view('dashboard/admin/laporan/v_gaji',$d);
		} else{
			header('location:'.base_url().'');
		}
	}

	public function setbulan(){
		$a1=$this->input->post('value');
        $this->session->set_userdata('bulan', $a1);
	}
	public function print()
	{

			$query = $this->db->query("select * from master_kantor");

			$row = $query->row();

			if (isset($row))
			{
				$d['logo'] = $row->photo; 
				$d['company'] = $row->nama; 
			}
			$id = $this->uri->segment(3);
			$id_user = $this->session->userdata('id_user');
			$bulan = $this->uri->segment(4);
			if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
				$q = $this->db->query('select a.id id, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3 left join tbl_hukuman e on a.id = e.id_pegawai and e.`status` = 3 left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 where a.id = '.$id_user.' group by a.id');
			} else {
				$q = $this->db->query('select a.id id, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3 left join tbl_hukuman e on a.id = e.id_pegawai and e.`status` = 3 left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 where a.id = '.$id.' group by a.id');
			}
			
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['nama_lengkap'] = $dt->nama_lengkap;
				$d['gaji'] = $dt->gaji; 
				$d['hukuman'] = $dt->hukuman; 
				$d['sppd'] = $dt->sppd; 
				$d['penghargaan'] = $dt->penghargaan; 
			}
				$d['kode'] = $id; 
			
			$kantor = $this->db->get('master_kantor');
			foreach($kantor->result() as $dt)
			{
				$d['kantor'] = $dt->nama;
				$d['photo'] = $dt->photo; 
				$d['telp'] = $dt->telp; 
				$d['alamat'] = $dt->alamat; 
				$d['email'] = $dt->email; 
			}

			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1")
			{
				$this->load->view('dashboard/administrator/laporan/v_print_gaji',$d);
			}
			else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
			{

				$this->load->view('dashboard/superadmin/laporan/v_print_gaji',$d);
			}
			else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
			{
				$this->load->view('dashboard/user/laporan/v_print_gaji',$d);
			}
			else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
			{
				$this->load->view('dashboard/admin/laporan/v_print_gaji',$d);
			} else{
				header('location:'.base_url().'');
			}
	}

	function get_gaji_json() { 
		$a1=$this->input->post('id_search');
		$b1=$this->input->post('extra_search');
	    header('Content-Type: application/json');
	    echo $this->l_gaji->gaji_list($a1,$b1);
	}

	function simpan_print(){
		$b1 = $this->session->userdata('bulan');
        if($b1 != ''){
            $bulan = $b1;
        } else {
            $bulan = date('M-Y');
        }
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="2"||$this->session->userdata('stts')=="3"){
			$id_user = $this->input->post('kode');
		} else {
			$id_user = $this->session->userdata('id_user');
		}
	    header('Content-Type: application/json');
		echo $this->l_gaji->simpan_print($id_user,$bulan);
	}
	function email(){

		   $this->load->library('email');
			$b1 = $this->session->userdata('bulan');
	        if($b1 != ''){
	            $bulan = $b1;
	        } else {
	            $bulan = date('M-Y');
	        }
			if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="2"||$this->session->userdata('stts')=="3"){
				$id_user = $this->input->post('kode');
			} else {
				$id_user = $this->session->userdata('id_user');
			}
			$this->l_gaji->simpan_transaksi($id_user,$bulan);
			$query = $this->db->query('select a.id id,a.email emailadd,a.nip nip, a.nama_bank nama_bank, a.no_bank no_bank, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3 and date_format(d.tgl_buat, "%M-%Y") = "'.$bulan.'"  left join tbl_hukuman e on a.id = e.id_pegawai and e.`status` = 3 and date_format(e.tgl_buat, "%M-%Y") = "'.$bulan.'" left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 and date_format(f.dari, "%M-%Y") = "'.$bulan.'" where a.id = '.$id_user.' group by a.id');
			$html = '';
			$emailsub = '';
			while ($row = $query->unbuffered_row())
			{
				   $emailsub = $row->emailadd;
			       $html .= '<tr>
						<td>Pembayaran kepada</td>
                        <td>:</td>
						<td>'.$row->nama_lengkap.'</td>
					</tr>
					<tr>
						<td>NIP</td>
                        <td>:</td>
						<td>'.$row->nip.'</td>
					</tr>
					<tr>
						<td>Gaji Pokok</td>
                        <td>:</td>
						<td align="right">'.number_format($row->gaji).'</td>
					</tr>
					<tr>
						<td>Sppd</td>
                        <td>:</td>
						<td align="right">'.number_format($row->sppd).'</td>
					</tr>
                    <tr>
                        <td>Penghargaan</td>
                        <td>:</td>
                        <td align="right">'.number_format($row->penghargaan).'</td>
                    </tr>
                    <tr>
                        <td>Potongan</td>
                        <td>:</td>
                        <td align="right">'.number_format($row->hukuman).'</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td align="right">'.number_format($row->gaji+$row->sppd+$row->penghargaan-$row->hukuman).'</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td> telah di transfer</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td> Ke rekening '.$row->nama_bank.' '.$row->no_bank.'</td>
                    </tr>';
			}

			$subject = 'Pembayaran Gaji Bulan '.$bulan;
			$message = '<p>Dari HRD </br>Kepada karyawan</p></br>';
			$message .= '<table class="table m-t-30 table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan=3>Menerangkan bahwa</td>
                                </tr>
                                <tr>
                                    <td>Tanggal/jam</td>
                                    <td>:</td>
                                    <td> '.date("d/m/Y").'</td>
                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td>:</td>
                                    <td> Pembayaran</td>
                                </tr>'.$html.'
                            </tbody>
                        </table>';

            $message .= '<p>Demikian info ini kami sampaikan</p></br></br><p>Hormat kami,</p></br><p>HRD</p>';

			// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
			    <title>' . html_escape($subject) . '</title>
			    <style type="text/css">
			        body {
			            font-family: Arial, Verdana, Helvetica, sans-serif;
			            font-size: 16px;
			        }
			    </style>
			</head>
			<body>
			' . $message . '
			</body>
			</html>';
			// Also, for getting full html you may use the following internal method:
			//$body = $this->email->full_html($subject, $message);

			$result = $this->email
			    ->from('dotaalarif@gmail.com')
			    ->reply_to('dotaalarif@gmail.com')    // Optional, an account where a human being reads.
			    ->to($emailsub)
			    ->subject($subject)
			    ->message($body)
			    ->send();

			return $result;
	}
}

/* End of file transaksi_gaji.php */
/* Location: ./application/controllers/transaksi_gaji.php */