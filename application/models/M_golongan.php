<?php
class M_golongan extends CI_Model{
	private $master = 'master_golongan';   // blog table

    function __construct() {
        parent::__construct();
    }

	function golongan_list(){
        $this->datatables->select('id,golongan,eselon,gaji,bonus,cuti,keterangan');
        $this->datatables->from('master_golongan');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
        return $this->datatables->generate();
	}

	function simpan_golongan($gol,$es,$ga,$bo,$cu,$ket){

        $sql = $sql = "INSERT INTO " . $this->master . "(golongan,eselon,gaji,bonus,cuti,keterangan,buat)"
                . " VALUES(?,?,?,?,?,?,?)";
        $hasil = $this->db->query($sql, array($gol,$es,$ga,$bo,$cu,$ket, date('Y-m-d H:i:s')));
		return $hasil;
	}

	function get_golongan_by_kode($kobar){
		$hsl=$this->db->query("SELECT * FROM master_golongan WHERE id='$kobar'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'gol' => $data->golongan,
					'ese' => $data->eselon,
					'gaji' => $data->gaji,
					'bonus' => $data->bonus,
					'cuti' => $data->cuti,
					'keterangan' => $data->keterangan,
					);
			}
		}
		return $hasil;
	}

	function update_golongan($gol,$es,$ga,$bo,$cu,$ket,$kode){
		$hasil=$this->db->query("UPDATE master_golongan SET golongan='$gol',eselon='$es',gaji='$ga',bonus='$bo',cuti='$cu',keterangan='$ket' WHERE id='$kode'");
		return $hasil;
	}

	function hapus_golongan($kobar){
		$hasil=$this->db->query("DELETE FROM master_golongan WHERE id='$kobar'");
		return $hasil;
	}
	
}