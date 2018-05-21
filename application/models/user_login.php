<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Login extends CI_Model {

	public function getLoginData($data)
	{
		$login['username'] = $data['username'];
		$login['password'] = md5($data['password'].'AppSimpeg32');
		$cek = $this->db->get_where('tbl_user_pegawai', $login);
		if($cek->num_rows()>0)
		{
			foreach($cek->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['id_user'] = $qad->id;
				$sess_data['username'] = $qad->username;
				$sess_data['nama'] = $qad->nama_lengkap;
				$sess_data['stts'] = $qad->roles;
				$this->session->set_userdata($sess_data);
			}
			$id_user = $this->session->userdata('id_user');
			$tanggal = date('Y-m-d H:i:s');
			$this->db->query("INSERT INTO tbl_histori (id_pegawai,activitas,status,updated)VALUES('$id_user','Login', 'Login','$tanggal')");
			header('location:'.base_url().'');
		}
		else
		{
			$this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.");
			header('location:'.base_url().'');
		}
	}
}

/* End of file User_Login.php */
/* Location: ./application/models/User_Login.php */