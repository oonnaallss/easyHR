<?php
class T_sppd extends CI_Model{
    private $master = 'tbl_sppd';   // blog table

    function __construct() {
        parent::__construct();
        $this->load->helper('status_helper');
    }

    function sppd_list(){
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="3"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_buat, "%d-%m-%Y") as tgl_pengajuan,cost,a.keterangan,a.status');
            $this->datatables->from('tbl_sppd a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasi(status,id)');
            return $this->datatables->generate();
        } else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_buat, "%d-%m-%Y") as tgl_pengajuan,cost,a.keterangan,a.status');
            $this->datatables->from('tbl_sppd a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('a.status =', '2');
            $this->datatables->add_column('ubah_status', '$1', 'ubah_status(status)');
            $this->datatables->add_column('view', '$1','ubah_navigasisupper(status,id)');
            return $this->datatables->generate();
        } else {
            return 'Session Habis';
        }
    }

    function get_sppd_by_kode($kobar){
        $hsl=$this->db->query("SELECT * FROM " . $this->master . " WHERE id='$kobar'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'a1' => $data->id_pegawai,
                    'b1' => $data->cost,
                    'c1' => $data->keterangan,
                    'd1' => $data->dari,
                    'e1' => $data->ke,
                    'f1' => $data->kota,
                    'kode' => $data->id,
                    );
            }
        }
        return $hasil;
    }

    function simpan_sppd($a2,$b2,$c2,$d2,$e2,$f2){
        $user = $this->session->userdata('id_user');
        $dari = date_format(DateTime::createFromFormat('d/m/Y', $e2),'Y-m-d H:i:s');
        $ke = date_format(DateTime::createFromFormat('d/m/Y', $f2),'Y-m-d H:i:s');
        $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_buat,dibuat,status,cost,keterangan,kota,dari,ke)"
                . " VALUES(?,?,?,?,?,?,?,?,?)";
        $hasil = $this->db->query($sql, array($a2,date('Y-m-d H:i:s'),$user,2,$b2,$c2,$d2,$dari,$ke));
        return $hasil;
    }

    function update_sppd($a2,$b2,$c2,$d2,$e2,$f2,$kode){
        $user = $this->session->userdata('id_user');
        $dari = date_format(DateTime::createFromFormat('d/m/Y', $e2),'Y-m-d H:i:s');
        $ke = date_format(DateTime::createFromFormat('d/m/Y', $f2),'Y-m-d H:i:s');
        $sql = $sql = "UPDATE " . $this->master . " SET id_pegawai=?,dibuat=?,cost=?,keterangan=?,kota=?,dari=?,ke=? where id=?";
        $hasil = $this->db->query($sql, array($a2,$b2,$c2,$d2,$dari,$ke,$kode));
        return $hasil;
    }

    function approve_sppd($a2,$kode){
        $tanggal = date('Y-m-d H:i:s');
        $user = $this->session->userdata('id_user');
        $hasil=$this->db->query("UPDATE " . $this->master . " SET approve_ket='$a2',tgl_approval='$tanggal',status=3, approve = $user WHERE id='$kode'");
        return $hasil;
    }

    function tolak_sppd($a2,$kode){
        $tanggal = date('Y-m-d H:i:s');
        $user = $this->session->userdata('id_user');
        $hasil=$this->db->query("UPDATE " . $this->master . " SET tolak='$a2',tgl_approval='$tanggal',status=4, approve = $user WHERE id='$kode'");
        return $hasil;
    }

    function hapus_sppd($kobar){
        $hasil=$this->db->query("DELETE FROM " . $this->master . " WHERE id='$kobar'");
        return $hasil;
    }
    
}