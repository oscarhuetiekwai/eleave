<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Holiday extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->permission->superadmin_superior_only();
		//load model
		$this->load->helper('url');
		//$this->load->model('home_model');
		//$this->load->model('user_model');
		$this->load->model('leave_model');
		$this->load->model('holiday_model');
	}

	
	###############  Holiday ###################
	//leave type index page
	function holiday_list()
	{
		$data = array();
		$data['page'] = 'holiday_list';
		if($query = $this->holiday_model->get_all())
		{
			$data['data_records'] = $query;
		}
		if($query = $this->leave_model->leave_type())
		{
			$data['leave_records'] = $query;
		}
		$data['main'] = 'holiday/holiday_list';
		$data['js_function'] = array('holiday');
		$this->load->view('template/template',$data);
	}

	## json for checkbox user list ##
	function checkbox_holiday_delete()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$date = $this->input->post('date');

		foreach($date as $value){

			if($query = $this->holiday_model->delete_by( array('date'=>$value)))
			{
				$data['data_records'] = $query;
			}
		}
		$data['page'] = 'checkbox_holiday_delete';

		redirect('holiday/holiday_list', $data);
	}

	## Delete holiday ##
	function ajax_delete_holiday()
	{
		$date = $this->input->post('date');

		//	$query = $this->user_model->view_valid_department()->get_all();

		//	if($query){

			if($this->holiday_model->delete_by( array('date'=>$date)))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else
			{
				$msg = "error";
				echo json_encode($msg);
			}
		//	}else{
		//	$msg = "error, the department you chosen was in use in staff records";
		//	echo json_encode($msg);
		//}
	}

	//add holiday page
	function add_holiday()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('holiday', 'Holiday Name', 'required|trim');
		$this->form_validation->set_rules('holiday_date', 'Holiday Date', 'required|trim|is_unique[tb_public_holiday.date]');
		$this->form_validation->set_message('is_unique', 'The %s already exist.');
		if ($this->form_validation->run() == TRUE)
		{
			$holiday = $this->input->post('holiday');
			$date = $this->input->post('holiday_date');			

			$data = array (
				'holiday'=>$holiday,
				'date'=>$date
			);

			if ($this->holiday_model->insert($data))
			{
				$this->session->set_flashdata('success', 'The Holiday have been successfully added');
				redirect('holiday/add_holiday');
			}
			else
			{
				$this->session->set_flashdata('success', 'The Holiday have been successfully added');
				redirect('holiday/add_holiday');
			}
		}
		else
		{
			$data = array();
			$data['page'] = 'add_holiday';
			$data['main'] = 'holiday/add_holiday';
			$data['js_function'] = array('holiday');
			$this->load->view('template/template',$data);
		}
	}

	## edit user position ##
	function edit_holiday()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('holiday', 'Holiday Name', 'required|trim');
		$this->form_validation->set_rules('holiday_date', 'Holiday Date', 'required|trim');
		if ($this->form_validation->run() == TRUE)
		{
			$holiday = $this->input->post('holiday');
			$date = $this->input->post('holiday_date');			
			$hash = md5($date.SECRETTOKEN);
			$data = array (
				'holiday'=>$holiday,
				'date'=>$date
			);
			if ($this->holiday_model->update_by(array('date'=>$date),$data))
			{
				$this->session->set_flashdata('success', 'The Holiday have been successfully updated');
				redirect("holiday/edit_holiday/$date/$hash");
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect("holiday/edit_holiday/$date/$hash");
			}
		}
		else
		{
			if($this->uri->segment(3))
	    	{
				$date = $this->uri->segment(3);
			}
			else
			{
				$date = $this->input->post('date');
			}
			$data = array();
			if($query = $this->holiday_model->get_by('date',$date))
			{
				$data['data_records'] = $query;
			}
			$data['page'] = 'edit_holiday';
			$data['main'] = 'holiday/edit_holiday';
			$data['js_function'] = array('holiday');
			$this->load->view('template/template',$data);
		}
	}
	############### END Holiday ###################
	
	

}//end of class
?>