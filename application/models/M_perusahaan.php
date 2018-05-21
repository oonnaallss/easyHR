<?php
class M_perusahaan extends CI_Model{

	private $master = 'master_kantor';   // blog table

    function __construct() {
        parent::__construct();
    }

	function perusahaan_list(){
        $this->datatables->select('id,nama,email,alamat');
        $this->datatables->from('master_kantor');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a>','id');
        return $this->datatables->generate();
	}

	/*function simpan_perusahaan($gol,$es,$ga){

        $sql = $sql = "INSERT INTO " . $this->master . "(nama,jam_masuk,jam_keluar)"
                . " VALUES(?,?,?)";
        $hasil = $this->db->query($sql, array($gol,$es,$ga));
		return $hasil;
	}*/

	function get_perusahaan_by_kode($kobar){
		$hsl=$this->db->query("SELECT id,nama,photo,email,alamat FROM master_kantor WHERE id='$kobar'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'a1' => $data->nama,
					'b1' => $data->email,
					'c1' => $data->alamat,
					'd1' => isset($data->photo) ? $data->photo : 'no-img.jpg',
					'ko' => $data->id,
					);
			}
		}
		return $hasil;
	}

	function update_perusahaan($a2,$b2,$c2,$d2,$kode){
		$upd['foto']='';
		if(!empty($_FILES['d2']['name']))
		{
			$acak=mt_rand(00000000000,mt_getrandmax());
			$bersih=$_FILES['d2']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
			$nama_murni=date('Ymd-His');
			$ekstensi_kotor = $pisah[1];
			
			$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
			$file_type_baru = strtolower($file_type);
			
			$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
			$n_baru = $ubah.'.'.$file_type_baru;
			
			$config['upload_path']	= "./assets/kantor/";
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['file_name'] = $n_baru;
			$config['max_size']     = '2500';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
	 
			$this->load->library('upload', $config);
	 
			if ($this->upload->do_upload("d2")) {
				$data	 	= $this->upload->data();
	 
				/* PATH */
				$source             = "./assets/kantor/".$data['file_name'] ;
				$destination_thumb	= "./assets/kantor/thumb/" ;
				$destination_medium	= "./assets/kantor/medium/" ;
	 
				// Permission Configuration
				chmod($source, 0777) ;
	 
				/* Resizing Processing */
				// Configuration Of Image Manipulation :: Static
				$this->load->library('image_lib') ;
				$img['image_library'] = 'GD2';
				$img['create_thumb']  = TRUE;
				$img['maintain_ratio']= TRUE;
	 
				/// Limit Width Resize
				$limit_medium   = 425 ;
				$limit_thumb    = 220 ;
	 
				// Size Image Limit was using (LIMIT TOP)
				$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
	 
				// Percentase Resize
				if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
					$percent_medium = $limit_medium/$limit_use ;
					$percent_thumb  = $limit_thumb/$limit_use ;
				}
	 
				//// Making THUMBNAIL ///////
				$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
				$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
	 
				// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_thumb ;
	 
				// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;
	 
				////// Making MEDIUM /////////////
				$img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
				$img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
	 
				// Configuration Of Image Manipulation :: Dynamic
				$img['thumb_marker'] = '';
				$img['quality']      = '100%' ;
				$img['source_image'] = $source ;
				$img['new_image']    = $destination_medium ;
				
				$upd['foto'] = $data['file_name'];
	 
				// Do Resizing
				$this->image_lib->initialize($img);
				$this->image_lib->resize();
				$this->image_lib->clear() ;
			}
		}
        $sql = $sql = "UPDATE master_kantor SET nama=?,email=?,alamat=?, photo=? WHERE id=?";
        $hasil = $this->db->query($sql, array($a2,$b2,$c2,$upd['foto'],$kode));
		return $hasil;
	}

	/*function hapus_perusahaan($kobar){
		$hasil=$this->db->query("DELETE FROM master_kantor WHERE id='$kobar'");
		return $hasil;
	}*/
	
}