<?php
class Absen extends CI_Model{

	private $master = 'tbl_kehadiran'; 
	function masuk(){
        $user = $this->session->userdata('id_user');
        $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_masuk,diupdate)"
                . " VALUES(?,?,?)";
        $hasil = $this->db->query($sql, array($user,date('Y-m-d H:i:s'),$user));
        $sess_data['absen'] = md5('Sudah Absen');
        $this->session->set_userdata('absen', md5('Sudah Absen'));
		return 'Anda absen masuk';
	}

	function keluar(){
        $user = $this->session->userdata('id_user');
        $keterangan ='Pekerjaan Harian';
        $sql = $sql = "UPDATE " . $this->master . " SET tgl_keluar=?, keterangan='Pekerjaan Harian' where id_pegawai=? and DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=?;";
        $hasil = $this->db->query($sql, array(date('Y-m-d H:i:s'),$user,date('Y-m-d')));
		return $hasil;
	}

	function getKalender(){
		$data = $this->db->query("select 'Kehadiran' nama,'bg-success' class, date_format(a.tgl_masuk, '%Y-%m-%d') startdate, date_format(a.tgl_keluar, '%Y-%m-%d') enddate from tbl_kehadiran a where a.id_pegawai = '".$this->session->userdata('id_user')."'
				union select 'SPPD' nama,'bg-warning' class, date_format(b.dari, '%Y-%m-%d') startdate, date_format(b.ke , '%Y-%m-%d') enddate from tbl_sppd b where b.status = 3 and b.id_pegawai = '".$this->session->userdata('id_user')."'
				union select 'Cuti' nama,'bg-pink' class, date_format(c.dari, '%Y-%m-%d') startdate, date_format(c.ke , '%Y-%m-%d') enddate from tbl_cuti c where c.status = 3 and c.id_pegawai = '".$this->session->userdata('id_user')."'")->result();
		echo json_encode($data);
	}
	
}