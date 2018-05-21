<?php
class T_cuti extends CI_Model{
	private $master = 'tbl_cuti';   // blog table

    function __construct() {
        parent::__construct();
        $this->load->helper('status_helper');
    }

	function cuti_list(){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_pengajuan, "%d-%m-%Y") as tgl_pengajuan,a.keterangan,a.status');
            $this->datatables->from('tbl_cuti a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where_in('a.status', array('1','2','3','4'));
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasi(status,id)');
            return $this->datatables->generate();
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_pengajuan, "%d-%m-%Y") as tgl_pengajuan,a.keterangan,a.status');
            $this->datatables->from('tbl_cuti a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where_in('a.status', array('2'));
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasisupper(status,id)');
            return $this->datatables->generate();
        } else {
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_pengajuan, "%d-%m-%Y") as tgl_pengajuan,a.keterangan,a.status');
            $this->datatables->from('tbl_cuti a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('a.id=', $this->session->userdata('id_user'));
            $this->datatables->where_in('a.status', array('1','2','3','4'));
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasi(status,id)');
            return $this->datatables->generate();

        }
	}

    function get_cuti_by_kode($kobar){
        $hsl=$this->db->query("SELECT * FROM tbl_cuti WHERE id='$kobar'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'a1' => $data->dari,
                    'b1' => $data->ke,
                    'c1' => $data->keterangan,
                    'kode' => $data->id,
                    );
            }
        }
        return $hasil;
    }

	function simpan_cuti($gol,$es,$ga){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $user = $this->session->userdata('id_user');
            $dari = DateTime::createFromFormat('d/m/Y', $gol);
            $ke = DateTime::createFromFormat('d/m/Y', $es);
            $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_pengajuan,tgl_approval,status,buat,approve,keterangan,dari,ke)"
                    . " VALUES(?,?,?,?,?,?,?,?,?)";
            $hasil = $this->db->query($sql, array($user,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),2,$user,$user,$ga,date_format($dari,'Y-m-d H:i:s'),date_format($ke,'Y-m-d H:i:s')));
    		return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $user = $this->session->userdata('id_user');
            $dari = DateTime::createFromFormat('d/m/Y', $gol);
            $ke = DateTime::createFromFormat('d/m/Y', $es);
            $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_pengajuan,tgl_approval,status,buat,approve,keterangan,dari,ke,setujui)"
                    . " VALUES(?,?,?,?,?,?,?,?,?)";
            $hasil = $this->db->query($sql, array($user,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),3,$user,$user,$ga,date_format($dari,'Y-m-d H:i:s'),date_format($ke,'Y-m-d H:i:s'),$user));
            return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
            $user = $this->session->userdata('id_user');
            $dari = DateTime::createFromFormat('d/m/Y', $gol);
            $ke = DateTime::createFromFormat('d/m/Y', $es);
            $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_pengajuan,tgl_approval,status,buat,approve,keterangan,dari,ke)"
                    . " VALUES(?,?,?,?,?,?,?,?,?)";
            $hasil = $this->db->query($sql, array($user,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),1,$user,$user,$ga,date_format($dari,'Y-m-d H:i:s'),date_format($ke,'Y-m-d H:i:s')));
            return $hasil;
        } else {
            return 'Session Habis';
        }
	}

	function update_cuti($a2,$b2,$c2,$kode){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $dari = date_format(DateTime::createFromFormat('d/m/Y', $a2),'Y-m-d H:i:s');
            $ke = date_format(DateTime::createFromFormat('d/m/Y', $b2),'Y-m-d H:i:s');
    		$hasil=$this->db->query("UPDATE tbl_cuti SET keterangan='$c2', dari='$dari',ke='$ke' WHERE id='$kode'");
    		return $hasil;
        } else {
            return 'Session Habis';
        }
	}

    function approve_cuti($a2,$kode){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET approve_ket='$a2',tgl_approval='$tanggal',status=2, approve = $user WHERE id='$kode'");
            return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET setujui_ket='$a2',tgl_disetujui='$tanggal',status=3, setujui = $user WHERE id='$kode'");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }

    function setujui_cuti($a2,$kode){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET setujui_ket='$a2',tgl_disetujui='$tanggal',status=3, setujui = $user WHERE id='$kode'");
            return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET setujui_ket='$a2',tgl_disetujui='$tanggal',status=3, setujui = $user WHERE id='$kode'");
        return $hasil;
        } else {
            return 'Session Habis';
        }
    }

    function tolak_cuti($a2,$kode){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET tolak='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
            return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $tanggal = date('Y-m-d H:i:s');
            $user = $this->session->userdata('id_user');
            $hasil=$this->db->query("UPDATE tbl_cuti SET tolak='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }

    function hapus_cuti($kobar){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $hasil=$this->db->query("DELETE FROM tbl_cuti WHERE id='$kobar'");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }
	
}