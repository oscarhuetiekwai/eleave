<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Backend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->model('apps_model');
		$this->load->model('tab_model');
		$this->load->model('user_model');
		$date = date('Y-m-d h:i:s');
	}

	function add_apps()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('application_name', 'Application Name', 'required|trim|is_unique[tb_apps.name]');
		$this->form_validation->set_rules('application_description', 'Application Description', 'required|trim');


		$this->form_validation->set_message('is_unique', 'The %s already exist.');

			if ($this->form_validation->run() == FALSE)
			{
				$data = array();
				$data['page'] = 'add_apps';
				if($query = $this->tab_model->list_all_tab())
				{
					$data['tab_records'] = $query;
				}
				$data['main'] = 'home/add_apps';
				$this->load->view('template/template',$data);
			}
			else
			{
				##1st product ##
				$application_name = $this->input->post('application_name');
				$application_description = $this->input->post('application_description');
				$application_icon = $this->input->post('application_icon');
				$application_screenshot1 = $this->input->post('application_screenshot1');
				$application_screenshot2 = $this->input->post('application_screenshot2');
				$application_screenshot3 = $this->input->post('application_screenshot3');
				$application_screenshot4 = $this->input->post('application_screenshot4');
				$application_screenshot5 = $this->input->post('application_screenshot5');
				$tab = $this->input->post('tab');

				## icon ##
					$upload_file_name = '';
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('application_icon'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data = $this->upload->data();
						$upload_file_name = $upload_data['file_name'];
					}


				## screenshot1 ##
					$upload_file_name2 = '';
					$config2['upload_path'] = './uploads/';
					$config2['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config2['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('application_screenshot1'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data2 = $this->upload->data();
						$upload_file_name2 = $upload_data2['file_name'];
					}


				## screenshot2 ##
					$upload_file_name3 = '';
					$config3['upload_path'] = './uploads/';
					$config3['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config3['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('application_screenshot2'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data3 = $this->upload->data();
						$upload_file_name3 = $upload_data3['file_name'];
					}


				## screenshot3 ##
					$upload_file_name4 = '';
					$config4['upload_path'] = './uploads/';
					$config4['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config4['max_size']	= 100000;
					$this->load->library('upload', $config4);
					if(!$this->upload->do_upload('application_screenshot3'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data4 = $this->upload->data();
						$upload_file_name4 = $upload_data4['file_name'];
					}


				## screenshot4 ##
					$upload_file_name5 = '';
					$config5['upload_path'] = './uploads/';
					$config5['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config5['max_size']	= 100000;
					$this->load->library('upload', $config5);
					if(!$this->upload->do_upload('application_screenshot4'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data5 = $this->upload->data();
						$upload_file_name5 = $upload_data5['file_name'];
					}


				## screenshot5 ##
					$upload_file_name6 = '';
					$config6['upload_path'] = './uploads/';
					$config6['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config6['max_size']	= 100000;
					$this->load->library('upload', $config6);
					if(!$this->upload->do_upload('application_screenshot5'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/add_apps');
					}else{
						$upload_data6 = $this->upload->data();
						$upload_file_name6 = $upload_data6['file_name'];
					}


					$activity = "1";
					$datetime = date('Y-m-d h:i:s');
						$data = array (
							'tab_id'=>$tab,
							'name'=>$application_name,
							'description'=>$application_description,
							'icon_image'=>$upload_file_name,
							'screenshot1'=>$upload_file_name2,
							'screenshot2'=>$upload_file_name3,
							'screenshot3'=>$upload_file_name4,
							'screenshot4'=>$upload_file_name5,
							'screenshot5'=>$upload_file_name6,
							'activity'=>$activity,
							'date_created'=>$datetime
						);

				if ($this->apps_model->insert($data))
				{
					$this->session->set_flashdata('success', 'The Application have been successfully added');
					redirect('home/add_apps');
				}
				else
				{
					$this->session->set_flashdata('error', 'Error. Please try again.');
					redirect('home/add_apps');
				}
			}
	}

	## edit apps ##
	function edit_apps()
	{
		//$this->permission->superadmin_admin_only();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('application_name', 'Application Name', 'required|trim');
		$this->form_validation->set_rules('application_description', 'Application Description', 'required|trim');

		$this->form_validation->set_message('is_unique', 'The %s already exist.');
		$apps_id = $this->input->post('apps_id');

			if ($this->form_validation->run() == FALSE)
			{
				$data = array();
				$data['page'] = 'add_apps';
				if($query = $this->apps_model->view_apps($apps_id))
				{
					$data['apps_records'] = $query;
				}
				if($query = $this->tab_model->list_all_tab())
				{
					$data['tab_records'] = $query;
				}
				$data['main'] = 'home/edit_apps';
				$this->load->view('template/template',$data);
			}
			else
			{
				$application_name = $this->input->post('application_name');
				$application_description = $this->input->post('application_description');
				$icon_image = $this->input->post('icon_image');
				$screenshot1 = $this->input->post('screenshot1');
				$screenshot2 = $this->input->post('screenshot2');
				$screenshot3 = $this->input->post('screenshot3');
				$screenshot4 = $this->input->post('screenshot4');
				$screenshot5 = $this->input->post('screenshot5');
				$tab = $this->input->post('tab');
				$activity = $this->input->post('activity');

				## icon ##
				if($this->input->post('icon_image')){
					$upload_file_name = '';
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('icon_image'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data = $this->upload->data();
						$upload_file_name = $upload_data['file_name'];
					}
				}

				## screenshot1 ##
				if($this->input->post('screenshot1')){
					$upload_file_name2 = '';
					$config2['upload_path'] = './uploads/';
					$config2['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config2['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('screenshot1'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data2 = $this->upload->data();
						$upload_file_name2 = $upload_data2['file_name'];
					}
				}

				## screenshot2 ##
				if($this->input->post('screenshot2')){
					$upload_file_name3 = '';
					$config3['upload_path'] = './uploads/';
					$config3['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config3['max_size']	= 100000;
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('screenshot2'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data3 = $this->upload->data();
						$upload_file_name3 = $upload_data3['file_name'];
					}
				}

				## screenshot3 ##
				if($this->input->post('screenshot3')){
					$upload_file_name4 = '';
					$config4['upload_path'] = './uploads/';
					$config4['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config4['max_size']	= 100000;
					$this->load->library('upload', $config4);
					if(!$this->upload->do_upload('screenshot3'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data4 = $this->upload->data();
						$upload_file_name4 = $upload_data4['file_name'];
					}
				}

				## screenshot4 ##
				if($this->input->post('screenshot4')){
					$upload_file_name5 = '';
					$config5['upload_path'] = './uploads/';
					$config5['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config5['max_size']	= 100000;
					$this->load->library('upload', $config5);
					if(!$this->upload->do_upload('screenshot4'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data5 = $this->upload->data();
						$upload_file_name5 = $upload_data5['file_name'];
					}
				}

				## screenshot5 ##
				if($this->input->post('screenshot5')){
					$upload_file_name6 = '';
					$config6['upload_path'] = './uploads/';
					$config6['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
					$config6['max_size']	= 100000;
					$this->load->library('upload', $config6);
					if(!$this->upload->do_upload('screenshot5'))
					{
						$error = array('error' => $this->upload->display_errors());
						$errormessage = $this->upload->display_errors();
						$this->session->set_flashdata('error', $errormessage);
						redirect('home/edit_apps/$apps_id');
					}else{
						$upload_data6 = $this->upload->data();
						$upload_file_name6 = $upload_data6['file_name'];
					}
				}

					$data = array (
						'tab_id'=>$tab,
						'name'=>$application_name,
						'description'=>$application_description,
						'activity'=>$activity
					);

				if(!empty($upload_file_name))
				{
					$data = array('icon_image'=>$upload_file_name) + $data;
				}

				if(!empty($upload_file_name2))
				{
					$data = array('screenshot1'=>$upload_file_name2) + $data;
				}

				if(!empty($upload_file_name3))
				{
					$data = array('screenshot2'=>$upload_file_name3) + $data;
				}

				if(!empty($upload_file_name4))
				{
					$data = array('screenshot3'=>$upload_file_name4) + $data;
				}

				if(!empty($upload_file_name5))
				{
					$data = array('screenshot4'=>$upload_file_name5) + $data;
				}

				if(!empty($upload_file_name6))
				{
					$data = array('screenshot5'=>$upload_file_name6) + $data;
				}

				if ($this->apps_model->update($apps_id,$data))
				{
					$this->session->set_flashdata('success', 'The Application have been successfully added');
					redirect("home/edit_apps/$apps_id");
				}
				else
				{
					$this->session->set_flashdata('error', 'Error. Please try again.');
					redirect("home/edit_apps/$apps_id");
				}
			}
	}

	function add_tab()
	{
		$this->load->library('form_validation');

		if($this->input->post('tab_name'))
		{
			$this->form_validation->set_rules('tab_name', 'Tab Name', 'required|trim|is_unique[tb_tab.tab_name]');
		}
		if($this->input->post('tab_name2'))
		{
			$this->form_validation->set_rules('tab_name2', 'Tab Name', 'required|trim|is_unique[tb_tab.tab_name]');
		}
		if($this->input->post('tab_name3'))
		{
			$this->form_validation->set_rules('tab_name3', 'Tab Name', 'required|trim|is_unique[tb_tab.tab_name]');
		}
		if($this->input->post('tab_name4'))
		{
			$this->form_validation->set_rules('tab_name4', 'Tab Name', 'required|trim|is_unique[tb_tab.tab_name]');
		}
		if($this->input->post('tab_name5'))
		{
			$this->form_validation->set_rules('tab_name5', 'Tab Name', 'required|trim|is_unique[tb_tab.tab_name]');
		}

		$this->form_validation->set_message('is_unique', 'The %s already exist.');

			if ($this->form_validation->run() == FALSE)
			{
				$data = array();
				$data['page'] = 'apps_list';
				if($query = $this->tab_model->list_all_tab())
				{
					$data['tab_records'] = $query;
				}
				$data['main'] = 'tab/add_tab';
				$this->load->view('template/template',$data);

			}else{

				$tab_name = $this->input->post('tab_name');
				$tab_name2 = $this->input->post('tab_name2');
				$tab_name3 = $this->input->post('tab_name3');
				$tab_name4 = $this->input->post('tab_name4');
				$tab_name5 = $this->input->post('tab_name5');
				$activity = "1";
		
				if($this->input->post('tab_name')){
						$data = array (
							'tab_name'=>$tab_name,
							'activity'=>$activity
						);
						$this->tab_model->insert($data);
				}
				
				if($this->input->post('tab_name2')){
						$data = array (
							'tab_name'=>$tab_name2,
							'activity'=>$activity
						);
						$this->tab_model->insert($data);
				}
				
				if($this->input->post('tab_name3')){
						$data = array (
							'tab_name'=>$tab_name3,
							'activity'=>$activity
						);
						$this->tab_model->insert($data);
				}
				
				if($this->input->post('tab_name4')){
						$data = array (
							'tab_name'=>$tab_name4,
							'activity'=>$activity
						);
						$this->tab_model->insert($data);
				}
				
				if($this->input->post('tab_name5')){
						$data = array (
							'tab_name'=>$tab_name5,
							'activity'=>$activity
						);
						$this->tab_model->insert($data);
				}

				$this->session->set_flashdata('success', 'Your Tab have been successfully added');
				redirect('tab/add_tab');

			}
	}
	## edit tab ##
	function edit_tab()
	{
			//$this->permission->superadmin_admin_only(); 
			$this->load->library('form_validation');
			$tab_name = $this->input->post('tab_name');
			$tab_id = $this->input->post('tab_id');
			$hash = md5($tab_id.SECRETTOKEN);
			$this->form_validation->set_rules('tab_name', 'Tab Name', 'required|trim');

			if($this->form_validation->run() == FALSE)
			{
				$data = array();
				if($query = $this->tab_model->get_by($tab_id))
				{
					$data['tab_records'] = $query;
				}

				$data['page'] = 'edit_tab';
				$data['main'] = 'tab/edit_tab';
				$this->load->view('template/template',$data);
			}
			else
			{
				//post the data to model
				$data = array (
						'tab_name'=>$tab_name
				);

				if ($this->tab_model->update($tab_id,$data))
				{
					$this->session->set_flashdata('success', 'The application have been successfully updated');
					redirect("tab/edit_tab/$tab_id/$hash");
				}
				else
				{
					$this->session->set_flashdata('error', 'Error. Please try again.');
					redirect("tab/edit_tab/$tab_id/$hash");
				}
			}

	}
	## Delete tab ##
	function ajax_delete_tab()
	{
			//$this->permission->superadmin_admin_only();
			$tab_id = $this->input->post('tab_id');

			if($this->tab_model->delete($tab_id))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else
			{
				$msg = "error";
				echo json_encode($msg);
			}
	}

	## Delete apps ##
	function ajax_delete_apps()
	{
			//$this->permission->superadmin_admin_only();
			$apps_id = $this->input->post('apps_id');

			if($this->apps_model->delete($apps_id))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else
			{
				$msg = "error";
				echo json_encode($msg);
			}
	}


	function ajax_update_user_leave_data()
	{
			$tab_id = $this->input->post('tab_id');
			$data = array();
			if($query = $this->tab_model->get_by('tab_id',$tab_id))
			{
				$data['tab_records'] = $query;
				if($query->activity == 1){
					$data = array (
					'activity'=>0
					);
				}else{
					$data = array (
					'activity'=>1
					);
				}
			}

			if($this->tab_model->update($tab_id,$data))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else{
				$msg = "error";
				echo json_encode($msg);
			}
	}

	function ajax_update_apps()
	{
			$apps_id = $this->input->post('apps_id');
			$data = array();
			if($query = $this->apps_model->get_by('apps_id',$apps_id))
			{
				$data['apps_records'] = $query;
				if($query->activity == 1){
					$data = array (
					'activity'=>0
					);
				}else{
					$data = array (
					'activity'=>1
					);
				}
			}

			if($this->apps_model->update($apps_id,$data))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else{
				$msg = "error";
				echo json_encode($msg);
			}
	}

	## profile Setting
	function update_profile()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|trim');
			if($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', 'Password', 'required|trim');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
			}
			$id = $this->session->userdata('id');
			//$id = "1";
			$hash = md5($id.SECRETTOKEN);
			if ($this->form_validation->run() == FALSE)
			{
				$data = array();

				if($query = $this->user_model->view_admin($id))
				{
					$data['admin_records'] = $query;
				}

				//$data['page'] = 'admin_profile';

				$data['main'] = 'profile/index';
				$this->load->view('template/template',$data);

			}
			else
			{
				$email_address = $this->input->post('email_address');
				$data = array('email_address'=>$email_address);

				if($this->input->post('password'))
				{
					$password = $this->input->post('password');
					$password = $this->encode($password);
					$data = array('password'=>$password) + $data ;
				}
					if ($this->user_model->edit_admin($data,$id))
					{
						$this->session->set_flashdata('success', 'Your profile setting have been successfully updated');
						redirect("profile_setting/index/$id/$hash");
					}
					else
					{
						$this->session->set_flashdata('error', 'Error. Please try again.');
						redirect("profile_setting/index/$id/$hash");
					}
			}
	}

	## checkbox for tab list under view ##
	function checkbox_tab_delete()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$post_tab_id = $this->input->post('tab_id');

		foreach($post_tab_id as $key => $value){
		
			$tab_id = $value;

			if($query = $this->tab_model->delete($tab_id))
			{
				$data['tab_records'] = $query;
			}

		}
		$data['page'] = 'checkbox_tab_delete';

		redirect('tab/index', $data);
	}
	
	## checkbox for apps list under view ##
	function checkbox_apps_delete()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$post_apps_id = $this->input->post('apps_id');

		foreach($post_apps_id as $key => $value){
		
			$apps_id = $value;

			if($query = $this->apps_model->delete($apps_id))
			{
				$data['apps_records'] = $query;
			}

		}
		$data['page'] = 'checkbox_tab_delete';

		redirect('home/home', $data);
	}
	
	function encode($text)
	{
		$result = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
		return trim(base64_encode($result));
	}

}

?>