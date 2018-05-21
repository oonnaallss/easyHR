<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('app/login',$d);
			}
			else
			{
				$dt['username'] = $this->input->post('username');
				$dt['password'] = $this->input->post('password');
				$this->load->model('user_login');
				$this->user_login->getLoginData($dt);
			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="1")
		{
			header('location:'.base_url().'dashboard_administrator');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="2")
		{
			header('location:'.base_url().'dashboard_superadmin');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="4")
		{
			header('location:'.base_url().'dashboard_user');
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('stts')=="3")
		{
			header('location:'.base_url().'dashboard_admin');
		}
	}
}