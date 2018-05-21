<?php
class T_kehadiran extends CI_Model{
	private $master = 'tbl_kehadiran';   // blog table

    function __construct() {
        parent::__construct();
        $this->load->helper('status_helper');
    }

	function kehadiran_list($a1,$b1){
        if($b1 != ''){
            $bulan = $b1;
        } else {
            $bulan = date('M-Y');
        }
        if($a1){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_masuk, "%d-%m-%Y %H:%i") as tgl_masuk,,DATE_FORMAT(a.tgl_keluar, "%d-%m-%Y %H:%i") as tgl_keluar,a.keterangan');
            $this->datatables->from('tbl_kehadiran a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('DATE_FORMAT(a.tgl_masuk, "%M-%Y") =', $bulan);
            $this->datatables->where('b.id =', $a1);
            $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a>','id');
            return $this->datatables->generate();
        } else {
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_masuk, "%d-%m-%Y %H:%i") as tgl_masuk,,DATE_FORMAT(a.tgl_keluar, "%d-%m-%Y %H:%i") as tgl_keluar,a.keterangan');
            $this->datatables->from('tbl_kehadiran a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('DATE_FORMAT(a.tgl_masuk, "%M-%Y") =', $bulan);
            $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a>','id');
            return $this->datatables->generate();
        }
		
	}

    function kehadiranuser_list($a1,$b1){
        if($b1 != ''){
            $bulan = $b1;
        } else {
            $bulan = date('M-Y');
        }
        if($a1){
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_masuk, "%d-%m-%Y %H:%i") as tgl_masuk,,DATE_FORMAT(a.tgl_keluar, "%d-%m-%Y %H:%i") as tgl_keluar,a.keterangan');
            $this->datatables->from('tbl_kehadiran a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('DATE_FORMAT(a.tgl_masuk, "%M-%Y") =', $bulan);
            $this->datatables->where('b.id =', $a1);
            $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a>','id');
            return $this->datatables->generate();
        } else {
            $this->datatables->select('a.id,b.nama_lengkap,DATE_FORMAT(a.tgl_masuk, "%d-%m-%Y %H:%i") as tgl_masuk,,DATE_FORMAT(a.tgl_keluar, "%d-%m-%Y %H:%i") as tgl_keluar,a.keterangan');
            $this->datatables->from('tbl_kehadiran a');
            $this->datatables->join('tbl_user_pegawai b', 'a.id_pegawai=b.id');
            $this->datatables->where('DATE_FORMAT(a.tgl_masuk, "%M-%Y") =', $bulan);
            $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a>','id');
            return $this->datatables->generate();
        }
        
    }

    function kehadiran_by_kode($kobar){
        $hsl=$this->db->query("SELECT DATE_FORMAT(tgl_masuk, '%d-%m-%Y') tanggal,DATE_FORMAT(tgl_masuk, '%H:%i') tgl_masuk, DATE_FORMAT(tgl_keluar, '%H:%i') tgl_keluar, id, keterangan FROM tbl_kehadiran WHERE id='$kobar'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'gol' => $data->tgl_masuk,
                    'es' => $data->tgl_keluar,
                    'tanggal' => $data->tanggal,
                    'keterangan' => $data->keterangan,
                    'kode' => $data->id,
                    );
            }
        }
        return $hasil;
    }

	function simpan_kehadiran($gol,$es,$ga,$bo,$ket){
        $dari = date_create($es.' '.$ga.':00');
        $dari = date_format($dari,'Y-m-d H:i:s');
        $ke = date_create($es.' '.$bo.':00');
        $ke = date_format($ke,'Y-m-d H:i:s');
        $user = $this->session->userdata('id_user');
        $sql = $sql = "INSERT INTO " . $this->master . "(id_pegawai,tgl_masuk,tgl_keluar,keterangan,diupdate)"
                . " VALUES(?,?,?,?,?)";
        $hasil = $this->db->query($sql, array($gol,$dari,$ke,$ket,$user));
		return $hasil;
	}

	function update_kehadiran($gol,$es,$ga,$tanggal,$kode){
        $dari = date_create($tanggal.' '.$gol.':00');
        $dari = date_format($dari,'Y-m-d H:i:s');
        $ke = date_create($tanggal.' '.$es.':00');
        $ke = date_format($ke,'Y-m-d H:i:s');
		$hasil=$this->db->query("UPDATE tbl_kehadiran SET tgl_masuk='$dari', tgl_keluar='$ke', keterangan='$ga' WHERE id='$kode'");
		return $hasil;
	}
	
}