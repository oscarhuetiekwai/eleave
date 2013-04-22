<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Permission {

	private $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	public function is_logged_in_admin()
	{
		$is_logged_in = $this->_ci->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login/index');
		}
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->_ci->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login/index');
		}
	}

	public function allowed_function($description)
	{
		$this->_ci->load->model('role_model');

		$role_id = $this->_ci->session->userdata('role_id');

		$search_param = array('role'=>$role_id, 'description'=> $description );

		if($this->_ci->role_model->search_user_role($search_param))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function superadmin_superior_only()
	{
		if(($this->_ci->session->userdata('role_id')!=SUPERIOR)&&($this->_ci->session->userdata('role_id')!=ADMIN))
		{
			$this->_ci->session->set_flashdata('error_login', 'Error. You dont have permission to access that page.');
			redirect('login/logout');
		}
	}

	public function admin_only()
	{
		if($this->_ci->session->userdata('role_id')!=ADMIN)
		{
			$this->_ci->session->set_flashdata('error_login', 'Error. You dont have permission to access that page.');
			redirect('login/logout');
		}
	}

	public function staff_only()
	{
		if($this->_ci->session->userdata('role_id')!=STAFF)
		{
			$this->_ci->session->set_flashdata('error_login', 'Error. You dont have permission to access that page.');
			redirect('login/logout');
		}
	}


}

// END Reply Class

/* End of file Reply.php */
/* Location: ./application/libraries/Reply.php */