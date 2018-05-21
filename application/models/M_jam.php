<?php
class M_jam extends CI_Model{
	private $master = 'master_jam_kerja';   // blog table

    function __construct() {
        parent::__construct();
    }

	function jam_list(){
        $this->datatables->select('id,nama,TIME_FORMAT(jam_masuk, "%H:%i") jam_masuk,TIME_FORMAT(jam_keluar, "%H:%i") as jam_keluar');
        $this->datatables->from('master_jam_kerja');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
        return $this->datatables->generate();
	}

	function simpan_jam($gol,$es,$ga){

        $sql = $sql = "INSERT INTO " . $this->master . "(nama,jam_masuk,jam_keluar)"
                . " VALUES(?,?,?)";
        $hasil = $this->db->query($sql, array($gol,$es,$ga));
		return $hasil;
	}

	function get_jam_by_kode($kobar){
		$hsl=$this->db->query("SELECT nama,TIME_FORMAT(jam_masuk, '%H:%i') jam_masuk,TIME_FORMAT(jam_keluar, '%H:%i') as jam_keluar FROM master_jam_kerja WHERE id='$kobar'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'gol' => $data->nama,
					'ese' => $data->jam_masuk,
					'gaji' => $data->jam_keluar,
					);
			}
		}
		return $hasil;
	}

	function update_jam($gol,$es,$ga,$kode){
		$hasil=$this->db->query("UPDATE master_jam_kerja SET nama='$gol',jam_masuk='$es',jam_keluar='$ga' WHERE id='$kode'");
		return $hasil;
	}

	function hapus_jam($kobar){
		$hasil=$this->db->query("DELETE FROM master_jam_kerja WHERE id='$kobar'");
		return $hasil;
	}
	
}