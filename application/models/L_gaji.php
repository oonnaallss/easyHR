<?php
class L_gaji extends CI_Model{
    private $master = 'tbl_gaji';   // blog table

    function __construct() {
        parent::__construct();
        $this->load->helper('status_helper');
    }

    function gaji_list($a1,$b1){
        if($b1 != ''){
            $bulan = $b1;
        } else {
            $bulan = date('M-Y');
        }
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
            $this->datatables->select('id, nama_lengkap, status, email, gaji,penghargaan,sppd,hukuman');
            $this->datatables->from('(select a.id id, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3  and date_format(d.tgl_buat, "%M-%Y") = "'.$bulan.'" left join tbl_hukuman e on a.id = e.id_pegawai and date_format(e.tgl_buat, "%M-%Y") = "'.$bulan.'" and e.`status` = 3 left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 and date_format(f.dari, "%M-%Y") = "'.$bulan.'" where a.id = '.$this->session->userdata('id_user').' group by a.id) ok');
            $this->datatables->add_column('view', '$1','ubah_laporan(id)');
            return $this->datatables->generate();
        } else {
            if($a1){
                $this->datatables->select('id, nama_lengkap, status, email, gaji,penghargaan,sppd,hukuman');
                $this->datatables->from('(select a.id id, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3  and date_format(d.tgl_buat, "%M-%Y") = "'.$bulan.'" left join tbl_hukuman e on a.id = e.id_pegawai and date_format(e.tgl_buat, "%M-%Y") = "'.$bulan.'" and e.`status` = 3 left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 and date_format(f.dari, "%M-%Y") = "'.$bulan.'" where a.id = '.$a1.' group by a.id) ok');
                $this->datatables->add_column('view', '$1','ubah_laporan(id)');
                return $this->datatables->generate();
            } else {
                $this->datatables->select('id, nama_lengkap, status, email, gaji,penghargaan,sppd,hukuman');
                $this->datatables->from('(select a.id id, a.nama_lengkap nama_lengkap, IFNULL(b.status,"Belum") as status, IFNULL(b.email,"Belum") as email, IFnull(c.gaji, 0) as gaji, IFNULL(SUM(d.cost),0) as penghargaan, IFNULL(SUM(e.cost),0) as hukuman, IFNULL(SUM(f.cost),0) as sppd from tbl_user_pegawai a left join tbl_gaji b on a.id = b.id_pegawai left join master_golongan c on a.golongan = c.id left join tbl_penghargaan d on a.id = d.id_pegawai and d.`status` = 3  and date_format(d.tgl_buat, "%M-%Y") = "'.$bulan.'" left join tbl_hukuman e on a.id = e.id_pegawai and date_format(e.tgl_buat, "%M-%Y") = "'.$bulan.'" and e.`status` = 3 left join tbl_sppd f on a.id = f.id_pegawai and f.`status` = 3 and date_format(f.dari, "%M-%Y") = "'.$bulan.'" group by a.id) ok');
                $this->datatables->add_column('view', '$1','ubah_laporan(id)');
                return $this->datatables->generate();
            }
        }
        
    }

    function simpan_transaksi($kobar,$nabar){
        $tot_keh = $this->db->query("select * from tbl_gaji where id_pegawai = '".$kobar."' and date_format(updated, '%M-%Y') = '".$nabar."'");
        $jml = $tot_keh->num_rows();
        $tanggal = date_format(date_create('01-'.$nabar),'Y-m-d H:i:s');
        if($jml == 0){
            $hasil=$this->db->query("INSERT INTO tbl_gaji (id_pegawai,email,updated)VALUES('$kobar','Sudah','$tanggal')");
            return $hasil;
        } else {
            $hasil=$this->db->query("UPDATE tbl_gaji SET email='Sudah' WHERE id_pegawai='$kobar' and date_format(updated, '%M-%Y') = '$nabar'");
            return $hasil;
        }
    }

    function simpan_print($kobar,$nabar){
        $tot_keh = $this->db->query("select * from tbl_gaji where id_pegawai = '".$kobar."' and date_format(updated, '%M-%Y') = '".$nabar."'");
        $jml = $tot_keh->num_rows();
        $tanggal = date_format(date_create('01-'.$nabar),'Y-m-d H:i:s');
        if($jml == 0){
            $hasil=$this->db->query("INSERT INTO tbl_gaji (id_pegawai,status,updated)VALUES('$kobar','Sudah','$tanggal')");
            return $hasil;
        } else {
            $hasil=$this->db->query("UPDATE tbl_gaji SET status='Sudah' WHERE id_pegawai='$kobar' and date_format(updated, '%M-%Y') = '$nabar'");
            return $hasil;
        }
    }
    
}