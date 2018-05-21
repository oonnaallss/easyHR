<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	function ubah_status($data){
		if($data==1){$output='<span class="label label-table label-warning">Pengajuan</span>';}
	    if($data==2){$output='<span class="label label-table label-warning">Belum Di Setujui</span>';}
	  	if($data==3){$output='<span class="label label-table label-success">Di Setujui</span>';}
	  	if($data==4){$output='<span class="label label-table label-danger">Di Tolak</span>';}
	  	return $output;
	}
	function ubah_navigasi($data,$kode){
		if($data==1){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default approve-row" style="color:green;margin-right:15px;"><i class="fa fa-check-circle"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default reject-row" style="color:red;margin-right:15px;"><i class="fa fa-times"></i></a>';}
	    if($data==2){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	if($data==3){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	if($data==4){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	return $output;
	}
	function ubah_navigasisupper($data,$kode){
		if($data==2){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default approve-row" style="color:green;margin-right:15px;"><i class="fa fa-check-circle"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default reject-row" style="color:red;margin-right:15px;"><i class="fa fa-times"></i></a>';}
	    if($data==1){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	if($data==3){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	if($data==4){$output='<a href="javascript:void(0);" data="'.$kode.'" class="on-default lihat-row" style="color:blue;margin-right:15px;"><i class="fa fa-eye"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default edit-row" style="color:orange;margin-right:15px;"><i class="fa fa-pencil"></i></a><a href="javascript:void(0);" data="'.$kode.'" class="on-default hapus-row" style="color:red;margin-right:15px;"><i class="fa fa-trash-o"></i></a>';}
	  	return $output;
	}
	function ubah_laporan($data){
		$output='<a href="laporan_gaji/print/'.$data.'" data="" class="on-default approve-row" style="color:blue;margin-right:15px;"><i class="fa fa-print"></i></a>';
	  	return $output;
	}

	function viewDashboard($data){
		$CI =& get_instance();
		$query = $CI->db->query("select * from tbl_user_pegawai where id = '".$data."'");

		while ($row = $query->unbuffered_row())
		{
		        $html = $row->nama_lengkap;
		}
	  	return $html;
	}