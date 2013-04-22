<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->model('dashboard_model');
		$this->load->model('leave_model');
		
	}

	function index()
	{
		$data = array();
		$data['page'] = 'dashboard';
		if($query = $this->dashboard_model->sort_date()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'dashboard/index';
		$data['js_function'] = array('home');
		$this->load->view('template/template',$data);
	}



	function add_announcement()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('announcement_title', 'Announcement Title', 'required|trim');
		$this->form_validation->set_rules('announcement_content', 'Announcement Content', 'required|trim');
		//$this->form_validation->set_rules('start_date', 'News Date', 'required|trim');
		
		$this->form_validation->set_message('is_unique', 'The %s already exist.');

		if ($this->form_validation->run() === TRUE)
		{
			$title = $this->input->post('announcement_title');
			$content = $this->input->post('announcement_content');

			$datetime = date('Y-m-d h:i:s');
			$data = array (

					'notification_title'=>$title,
					'notification_description'=>$content,
					'date_created'=>$datetime,
			);

			if ($this->dashboard_model->insert($data))
			{
				$this->session->set_flashdata('success', 'The Announcement have been successfully added');
				redirect('dashboard/add_announcement');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect('dashboard/add_announcement');
			}
		}
		else
		{
		
			$data = array();
			$data['page'] = 'add_announcement';
			$data['main'] = 'dashboard/add_announcement';
			$data['js_function'] = array('home');
			$this->load->view('template/template',$data);
			
		}
	}

	## Delete notification ##
	function ajax_delete_notification()
	{
			//$this->permission->superadmin_admin_only();
		$notification_id = $this->input->post('notification_id');

		if($this->dashboard_model->delete($notification_id))
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


	## checkbox for apps list under view ##
	function checkbox_news_delete()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$id = $this->input->post('news_id');

		foreach($id as $value){

			if($query = $this->dashboard_model->delete($value))
			{
				$data['data_records'] = $query;
			}

		}
		$data['page'] = 'checkbox_tab_delete';

		redirect('home/index', $data);
	}



	## edit_announcement ##
	function edit_announcement()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('announcement_title', 'Announcement Title', 'required|trim');
		$this->form_validation->set_rules('announcement_content', 'Announcement Content', 'required|trim');

		$this->form_validation->set_message('is_unique', 'The %s already exist.');
	

			if ($this->form_validation->run() === TRUE)
			{
				$announcement_id = $this->input->post('notification_id');
				$title = $this->input->post('announcement_title');
				$content = $this->input->post('announcement_content');
				//$image = $this->input->post('image');
				$old_date = $this->input->post('start_date');
				$old_date_timestamp = strtotime($old_date);
				$news_date = date('Y-m-d', $old_date_timestamp);
				$news_slug = url_title($title, '_', TRUE);
				$datetime = date('Y-m-d h:i:s');
				$data = array (
					'notification_title'=>$title,
					'notification_description'=>$content,

				);

				if ($this->dashboard_model->update($announcement_id,$data))
				{
					$this->session->set_flashdata('success', 'Your Announcement have been successfully updated');
					redirect("dashboard/edit_announcement/$announcement_id");
				}
				else
				{
					$this->session->set_flashdata('error', 'Error. Please try again.');
					redirect("dashboard/edit_announcement/$announcement_id");
				}
		
	
			}
			else
			{
				$announcement_id = $this->uri->segment(3);

				$data = array();
				if($query = $this->dashboard_model->get_by('notification_id',$announcement_id))
				{
					$data['data_records'] = $query;
				}
				$data['js_function'] = array('home');
				$data['page'] = 'edit_announcement';
				$data['main'] = 'dashboard/edit_announcement';
				$this->load->view('template/template', $data);
			}

	}

	function ajax_read_contact_file()
	{
		$contact_filename = $this->input->post('contact_filename');

		$contact_file_path = './uploads/'.$contact_filename;

		echo json_encode($contact_file_path);
	}

}//end of class
?>