<?php
class T_hukuman extends CI_Model{
	private $master = 'tbl_hukuman';   // blog table

    function __construct() {
        parent::__construct();
        $this->load->helper('status_helper');
    }

	function hukuman_list(){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_buat, "%d-%m-%Y") as tgl_buat,cost,a.keterangan,a.status');
            $this->datatables->from('tbl_hukuman a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasi(status,id)');
            return $this->datatables->generate();
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_buat, "%d-%m-%Y") as tgl_buat,cost,a.keterangan,a.status');
            $this->datatables->from('tbl_hukuman a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('a.status =', '2');
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasisupper(status,id)');
            return $this->datatables->generate();
        } else {
            return 'Session Habis';
        }
		
	}

    function get_hukuman_by_kode($kobar){
        $hsl=$this->db->query("SELECT * FROM tbl_hukuman WHERE id='$kobar'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'a1' => $data->id_pegawai,
                    'b1' => $data->cost,
                    'c1' => $data->keterangan,
                    'kode' => $data->id,
                    );
            }
        }
        return $hasil;
    }

	function simpan_hukuman($gol,$es,$ga,$bo,$cu,$ket){
        $user = $this->session->userdata('id_user');

        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_buat,dibuat,status,cost,keterangan)"
                    . " VALUES(?,?,?,?,?,?)";
            $hasil = $this->db->query($sql, array($gol,date('Y-m-d H:i:s'),$user,2,$es,$ga));
    		return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_buat,dibuat,status,cost,keterangan)"
                    . " VALUES(?,?,?,?,?,?)";
            $hasil = $this->db->query($sql, array($gol,date('Y-m-d H:i:s'),$user,3,$es,$ga));
            return $hasil;
        } else {
            return 'Session Habis';
        } 
	}

	function update_hukuman($gol,$es,$ga,$kode){
        $user = $this->session->userdata('id_user');
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $sql = $sql = "UPDATE " . $this->master . " SET id_pegawai=?,dibuat=?,cost=?,keterangan=? where id=?";
            $hasil = $this->db->query($sql, array($gol,$user,$es,$ga,$kode));
            return $hasil;
        } else {
            return 'Session Habis';
        } 
	}

    function approve_hukuman($a2,$kode){
        $tanggal = date('Y-m-d H:i:s');
        $user = $this->session->userdata('id_user');
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $hasil=$this->db->query("UPDATE tbl_hukuman SET approve_ket='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }

    function tolak_hukuman($a2,$kode){
        $tanggal = date('Y-m-d H:i:s');
        $user = $this->session->userdata('id_user');
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $hasil=$this->db->query("UPDATE tbl_hukuman SET tolak='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
            return $hasil;
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $hasil=$this->db->query("UPDATE tbl_hukuman SET tolak='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }

    function hapus_hukuman($kobar){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $hasil=$this->db->query("DELETE FROM tbl_hukuman WHERE id='$kobar' AND status = 2");
            return $hasil;
        } else {
            return 'Session Habis';
        }
    }
	
}