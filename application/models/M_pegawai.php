<?php
class M_Pegawai extends CI_Model{
	private $master = 'tbl_user_pegawai';

	function pegawai_list(){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
	        $this->datatables->select('a.id,a.username,a.email,CONCAT(b.golongan, " ", b.eselon) as golongan,c.nama as roles');
	        $this->datatables->from('tbl_user_pegawai a');
	        $this->datatables->join('master_golongan b', 'a.golongan=b.id');
	        $this->datatables->join('master_roles c', 'a.roles=c.id');
	        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
	        return $this->datatables->generate();
    	} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2"){
	        $this->datatables->select('a.id,a.username,a.email,CONCAT(b.golongan, " ", b.eselon) as golongan,c.nama as roles');
	        $this->datatables->from('tbl_user_pegawai a');
	        $this->datatables->join('master_golongan b', 'a.golongan=b.id');
	        $this->datatables->join('master_roles c', 'a.roles=c.id');
	        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
	        return $this->datatables->generate();
    	} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3"){
	        $this->datatables->select('a.id,a.username,a.email,CONCAT(b.golongan, " ", b.eselon) as golongan,c.nama as roles');
	        $this->datatables->from('tbl_user_pegawai a');
	        $this->datatables->join('master_golongan b', 'a.golongan=b.id');
	        $this->datatables->join('master_roles c', 'a.roles=c.id');
	        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
	        return $this->datatables->generate();
    	} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4"){
	        $this->datatables->select('a.id,a.username,a.email,CONCAT(b.golongan, " ", b.eselon) as golongan,c.nama as roles');
	        $this->datatables->from('tbl_user_pegawai a');
	        $this->datatables->join('master_golongan b', 'a.golongan=b.id');
	        $this->datatables->join('master_roles c', 'a.roles=c.id');
	        $this->datatables->where('a.id = ', $this->session->userdata('id_user'));
	        $this->datatables->add_column('view', '<a href="javascript:void(0);" data="$1" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="$1" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="$1" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>','id');
	        return $this->datatables->generate();
    	} else {
			return 'Session Habis';
		}
	}

	function get_pegawai_by_kode($kobar){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1" || $this->session->userdata('stts')=="2" || $this->session->userdata('stts')=="3"){
			$hsl=$this->db->query("SELECT * FROM tbl_user_pegawai WHERE id='$kobar'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil=array(
						'a1' => $data->nama_lengkap,
						'b1' => $data->username,
						'c1' => $data->email,
						'd1' => isset($data->nip) ? $data->nip : '',
						'e1' => $data->roles,
						'f1' => $data->golongan,
						'g1' => $data->jam,
						'h1' => isset($data->bank) ? $data->bank : '',
						'i1' => isset($data->nama_bank) ? $data->nama_bank : '',
						'j1' => isset($data->no_bank) ? $data->no_bank : '',
						'k1' => isset($data->photo) ? $data->photo : 'no-img.jpg',
						'ko' => $data->id,
						);
				}
			}
			return $hasil;
		} else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4") {
			$kode = $this->session->userdata('id_user');
			$hsl=$this->db->query("SELECT * FROM tbl_user_pegawai WHERE id='$kode'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil=array(
						'a1' => $data->nama_lengkap,
						'b1' => $data->username,
						'c1' => $data->email,
						'd1' => isset($data->nip) ? $data->nip : '',
						'e1' => $data->roles,
						'f1' => $data->golongan,
						'g1' => $data->jam,
						'h1' => isset($data->bank) ? $data->bank : '',
						'i1' => isset($data->nama_bank) ? $data->nama_bank : '',
						'j1' => isset($data->no_bank) ? $data->no_bank : '',
						'k1' => isset($data->photo) ? $data->photo : 'no-img.jpg',
						'ko' => $data->id,
						);
				}
			}
			return $hasil;
		} else {
			return 'Session Habis';
		}
	}

	function simpan_pegawai($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$k2,$l2){
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1"){
		$upd['foto']='';
		if(!empty($_FILES['k2']['name']))
		{
			$acak=mt_rand(00000000000,mt_getrandmax());
			$bersih=$_FILES['k2']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
			$nama_murni=date('Ymd-His');
			$ekstensi_kotor = $pisah[1];
			
			$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
			$file_type_baru = strtolower($file_type);
			
			$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
			$n_baru = $ubah.'.'.$file_type_baru;
			
			$config['upload_path']	= "./assets/foto_pegawai/";
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['file_name'] = $n_baru;
			$config['max_size']     = '2500';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
	 
			$this->load->library('upload', $config);
	 
			if ($this->upload->do_upload("k2")) {
				$data	 	= $this->upload->data();
	 
				/* PATH */
				$source             = "./assets/foto_pegawai/".$data['file_name'] ;
				$destination_thumb	= "./assets/foto_pegawai/thumb/" ;
				$destination_medium	= "./assets/foto_pegawai/medium/" ;
	 
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
		$password =  md5($l1.'AppSimpeg32');
        $sql = $sql = "INSERT INTO " . $this->master . "(nama_lengkap,username,email,nip,roles,golongan,jam,bank,nama_bank,no_bank,photo,password)"
                . " VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $hasil = $this->db->query($sql, array($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$upd['foto'],$password));
		return $hasil;
		} else {
			return 'Session Habis';
		}
	}

	function update_pegawai($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$k2,$ko){
		$upd['foto'] = '';
		if(!empty($_FILES['k2']['name']))
		{
			$acak=mt_rand(00000000000,mt_getrandmax());
			$bersih=$_FILES['k2']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
			$nama_murni=date('Ymd-His');
			$ekstensi_kotor = $pisah[1];
			
			$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
			$file_type_baru = strtolower($file_type);
			
			$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
			$n_baru = $ubah.'.'.$file_type_baru;
			
			$config['upload_path']	= "./assets/foto_pegawai/";
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['file_name'] = $n_baru;
			$config['max_size']     = '2500';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
	 
			$this->load->library('upload', $config);
	 
			if ($this->upload->do_upload("k2")) {
				$data	 	= $this->upload->data();
	 
				/* PATH */
				$source             = "./assets/foto_pegawai/".$data['file_name'] ;
				$destination_thumb	= "./assets/foto_pegawai/thumb/" ;
				$destination_medium	= "./assets/foto_pegawai/medium/" ;
	 
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
        $sql = $sql = "UPDATE " . $this->master . " set nama_lengkap=?,username=?,email=?,nip=?,roles=?,golongan=?,jam=?,bank=?,nama_bank=?,no_bank=?,photo=? where id=?";
        $hasil = $this->db->query($sql, array($a2,$b2,$c2,$d2,$e2,$f2,$g2,$h2,$i2,$j2,$upd['foto'],$ko));
		return $hasil;
	}

	function hapus_pegawai($kobar){
		if($kobar != $this->session->userdata('id_user')){
			$hasil=$this->db->query("DELETE FROM " . $this->master . "  WHERE id='$kobar'");
			return $hasil;
		} else {
			$arr = array('msg' => 'Tidak dapat Menghapus data', 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5); 
    		header('Content-Type: application/json');
			return json_encode($arr);
		}
	}

	function ubah_password($a1,$b1,$c1){
		if($b1 != $c1){
			$hasil= array('msg', 'Konfirmasi Password tidak Sesuai');
			return $hasil;
		} else {
			$id_user = $this->session->userdata('id_user');
			$login['id'] = $id_user;
			$login['password'] = md5($a1.'AppSimpeg32');
			$password =  md5($b1.'AppSimpeg32');
			$cek = $this->db->get_where('tbl_user_pegawai', $login);
			if($cek->num_rows()>0)
			{
				if($b1==$c1)
				{
					$this->db->query("UPDATE " . $this->master . " SET password = '$password'  WHERE id='$id_user'");
					$hasil= array('msg', 'Berhasil Mengubah Password');
					return $hasil;
				}
			}
			else
			{
				$hasil= array('msg', 'Password lama salah');
				return $hasil;
			}
		}
	}
	
}