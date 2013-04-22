<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Leave extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		//$this->load->model('home_model');
		//$this->load->model('user_model');
		$this->load->model('dashboard_model');
		$this->load->model('leave_model');
		$this->load->model('leave_type_model');
		$this->load->model('leave_data_model');
		$date = date('Y-m-d h:i:s');
	}

	//leave type index page
	function apply_leave_list()
	{
		$data = array();
		$data['page'] = 'apply_leave_list';
		$staff_id = $this->session->userdata('staff_id');
		if($query = $this->leave_model->get_staff_detail($staff_id)->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'leave/apply_leave_list';
		$data['js_function'] = array('leave');
		$this->load->view('template/template',$data);
	}

	function apply_leave()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('chosen_a', 'Leave Type', 'required|trim');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required|trim');
		$this->form_validation->set_rules('end_date', 'End Date', 'required|trim');
		$this->form_validation->set_rules('reason', 'Reason', 'required|trim');
		$this->form_validation->set_rules('no_of_days', 'No of Days', 'required|trim');


		if ($this->form_validation->run() === TRUE)
		{
			$leave_type_id = $this->input->post('chosen_a');
			$staff_id = $this->input->post('staff_id');
			$content = $this->input->post('announcement_content');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$start_date_data = date("Y-m-d", strtotime($start_date));
			$end_date_data = date("Y-m-d", strtotime($end_date));
			$no_of_day = $this->input->post('no_of_days');

			$reason = $this->input->post('reason');
			$datetime = date('Y-m-d h:i:s');
			$status = 'p';
			$reject_reason = '';
			$approval_id = '';

			if($no_of_day < 0){
				$this->session->set_flashdata('error', 'No of day cannot less than zero');
				redirect('leave/apply_leave');
			}
			## check if leave not medical ##
			if($leave_type_id != "5"){
				## check user leave balance ##
				$query = $this->leave_data_model->get_staff_data($staff_id)->get_all();
				$annual_leave = $query[0]->annual_leave_balance;
				if($no_of_day > $annual_leave){

					$this->session->set_flashdata('error', 'You have not enough annual leave, Please try Again!');
					redirect('leave/apply_leave');
				}else{
					$total_leave = $annual_leave - $no_of_day;
					$this->leave_data_model->update_by(array('staff_id'=>$staff_id), array('annual_leave_balance'=>$total_leave));
				}
			}else{
				## check user leave balance ##
				$query2 = $this->leave_data_model->get_staff_data($staff_id)->get_all();
				$sick_leave = $query2[0]->sick_leave_balance;

				if($no_of_day > $sick_leave){

					$this->session->set_flashdata('error', 'You have not enough sick leave, Please try Again!');
					redirect('leave/apply_leave');
				}else{
					$total_leave = $sick_leave - $no_of_day;
					$this->leave_data_model->update_by(array('staff_id'=>$staff_id), array('sick_leave_balance'=>$total_leave));
				}
			}

			$data = array (
					'staff_id'=>$staff_id,
					'leave_type_id'=>$leave_type_id,
					'start_date'=>$start_date_data,
					'end_date'=>$end_date_data,
					'no_of_day'=>$no_of_day,
					'reason'=>$reason,
					'leave_status'=>$status,
					'reject_reason'=>$reject_reason,
					'date_apply'=>$datetime,
					'approval_id'=>$approval_id
			);

			if ($this->leave_model->insert($data))
			{


				$this->session->set_flashdata('success', 'Your Leave have been successfully added');
				redirect('leave/apply_leave');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect('leave/apply_leave');
			}
		}
		else
		{
			$data = array();
			$data['page'] = 'apply_leave_list';
			if($query = $this->leave_type_model->get_active_leave_type()->get_all())
			{
				$data['leave_records'] = $query;
			}
			$staff_id = $this->session->userdata('staff_id');

			$data['staff_id'] = $staff_id;

			$data['main'] = 'leave/apply_leave';
			//$data['js_function'] = array('leave');
			$data['js_function'] = array('leave','business_days');
			$this->load->view('template/template',$data);
		}
	}

	// count number of day of taking
	function count_no_leave_day()
	{
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$period = $this->input->post('period');
		$start_date = strtotime($start_date);
		$end_date = strtotime($end_date);
		$datediff = $end_date - $start_date;

		## if date same, mean only half day
		if(empty($start_date) && empty($end_date)){
			$date = 0.0;
			echo json_encode($date);
			exit;
		}

		## get full day
		if($period == "f"){
			$date = floor($datediff/(60*60*24));
			$date = $date + 1;
		}else{
			$date = 0.5;
		}
		echo json_encode($date);
	}

	## edit apply leave ##
	function edit_apply_leave()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('leave_type', 'Leave Type Name', 'required|trim');
		$this->form_validation->set_message('is_unique', 'The %s already exist.');
		if ($this->form_validation->run() == TRUE)
		{
			$leave_type = $this->input->post('leave_type');
			$leave_type_id = $this->input->post('leave_type_id');
			$hash = md5($leave_type_id.SECRETTOKEN);
			$data = array (
				'leave_type'=>$leave_type
			);

			if ($this->leave_type_model->update($leave_type_id,$data))
			{
				$this->session->set_flashdata('success', 'The Leave Type have been successfully updated');
				redirect("leave/edit_leave_type/$leave_type_id/$hash");
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect("leave/edit_leave_type/$leave_type_id/$hash");
			}
		}
		else
		{
			if($this->uri->segment(3))
	    	{
				$leave_type_id = $this->uri->segment(3);
			}
			else
			{
				$leave_type_id = $this->input->post('leave_type_id');
			}
			$data = array();
			if($query = $this->leave_type_model->get_by('leave_type_id',$leave_type_id))
			{
				$data['data_records'] = $query;
			}
			$data['page'] = 'edit_leave_type';
			$data['main'] = 'leave/edit_leave_type';
			$data['js_function'] = array('leave');
			$this->load->view('template/template',$data);
		}
	}


	## Delete apps ##
	function ajax_delete_apply_leave()
	{
			//$this->permission->superadmin_admin_only();
		$leave_application_id = $this->input->post('leave_application_id');

		if($this->leave_model->delete($leave_application_id))
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

	## Deactivated leave ##
	function deactivated_leave()
	{
		$leave_application_id = $this->input->post('leave_application_id');

			$data = array (
				'leave_status'=>'w'
			);

			$query = $this->leave_model->get_by('leave_application_id',$leave_application_id);

			$staff_id = $query->staff_id;
			$leave_type_id = $query->leave_type_id;
			$no_of_day =  $query->no_of_day;

			$get_leave_data = $this->leave_data_model->get_by('staff_id',$staff_id);
			$annual_leave_balance = $get_leave_data->annual_leave_balance;
			$sick_leave_balance = $get_leave_data->sick_leave_balance;

			## if leave not equal withdraw and reject
			if($query->leave_status != "w" && $query->leave_status != "r"){
				if ($this->leave_model->update($leave_application_id,$data))
				{
					// if not medical leave,  add back leave to user
					if($leave_type_id != 5){
						$total_leave = $annual_leave_balance + $no_of_day;
						$this->leave_data_model->update_by(array('staff_id'=>$staff_id),array('annual_leave_balance'=>$total_leave));
					}else{
						$total_leave = $sick_leave_balance + $no_of_day;
						$this->leave_data_model->update_by(array('staff_id'=>$staff_id),array('sick_leave_balance'=>$total_leave));
					}
					$msg = "success";
					echo json_encode($msg);
				}
				else
				{
					$msg = "error";
					echo json_encode($msg);
				}
			}else{
				$msg = "error";
				echo json_encode($msg);
			}
	}


	function login()
	{
		//$this->is_logged_in();
		$this->load->view('login/login.php');
	}

	###############  LEAVE TYPE###################
	//leave type index page
	function leave_type_list()
	{
		$data = array();
		$data['page'] = 'leave_type_list';
		if($query = $this->leave_type_model->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'leave/leave_type_list';
		$data['js_function'] = array('leave');
		$this->load->view('template/template',$data);
	}

	## json for checkbox user list ##
	function checkbox_leave_type_delete()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$id = $this->input->post('leave_type_id');

		foreach($id as $value){

			if($query = $this->leave_type_model->delete($value))
			{
				$data['data_records'] = $query;
			}
		}
		$data['page'] = 'checkbox_leave_type_delete';

		redirect('leave/leave_type_list', $data);
	}

	## Delete user position ##
	function ajax_delete_leave_type()
	{
		$leave_type_id = $this->input->post('leave_type_id');

		//	$query = $this->user_model->view_valid_department()->get_all();

	//	if($query){

			if($this->leave_type_model->delete($leave_type_id))
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

	//add leave type page
	function add_leave_type()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('leave_type', 'Leave Type Name', 'required|trim');
		$this->form_validation->set_message('is_unique', 'The %s already exist.');
		if ($this->form_validation->run() == TRUE)
		{
			$leave_type = $this->input->post('leave_type');
			$data = array (
				'leave_type'=>$leave_type
			);

			if ($this->leave_type_model->insert($data))
			{
				$this->session->set_flashdata('success', 'The Leave Type have been successfully added');
				redirect('leave/add_leave_type');
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect('leave/add_leave_type');
			}
		}
		else
		{
			$data = array();
			$data['page'] = 'add_leave_type';
			$data['main'] = 'leave/add_leave_type';
			$data['js_function'] = array('leave');
			$this->load->view('template/template',$data);
		}
	}

	## edit user position ##
	function edit_leave_type()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('leave_type', 'Leave Type Name', 'required|trim');
		$this->form_validation->set_message('is_unique', 'The %s already exist.');
		if ($this->form_validation->run() == TRUE)
		{
			$leave_type = $this->input->post('leave_type');
			$leave_type_id = $this->input->post('leave_type_id');
			$hash = md5($leave_type_id.SECRETTOKEN);
			$data = array (
				'leave_type'=>$leave_type
			);

			if ($this->leave_type_model->update($leave_type_id,$data))
			{
				$this->session->set_flashdata('success', 'The Leave Type have been successfully updated');
				redirect("leave/edit_leave_type/$leave_type_id/$hash");
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect("leave/edit_leave_type/$leave_type_id/$hash");
			}
		}
		else
		{
			if($this->uri->segment(3))
	    	{
				$leave_type_id = $this->uri->segment(3);
			}
			else
			{
				$leave_type_id = $this->input->post('leave_type_id');
			}
			$data = array();
			if($query = $this->leave_type_model->get_by('leave_type_id',$leave_type_id))
			{
				$data['data_records'] = $query;
			}
			$data['page'] = 'edit_leave_type';
			$data['main'] = 'leave/edit_leave_type';
			$data['js_function'] = array('leave');
			$this->load->view('template/template',$data);
		}
	}

	## update leave type status ##
	function ajax_update_leave_type_status()
	{
			$leave_type_id = $this->input->post('leave_type_id');
			$data = array();
			if($query = $this->leave_type_model->get_by('leave_type_id',$leave_type_id))
			{
				if($query->status == 'N'){
					$data = array (
					'status'=>'Y'
					);
				}else{
					$data = array (
					'status'=>'N'
					);
				}
			}

			if($this->leave_type_model->update($leave_type_id,$data))
			{
				$msg = "success";
				echo json_encode($msg);
			}
			else{
				$msg = "error";
				echo json_encode($msg);
			}
	}
	############### END LEAVE TYPE ###################

	############### WHO ON LEAVE ###################
	//leave type index page
	function who_on_leave()
	{
		$data = array();
		$data['page'] = 'who_on_leave';
		if($query = $this->leave_model->get_whos_on_leave()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'leave/who_on_leave';
		$data['js_function'] = array('leave');
		$this->load->view('template/template',$data);
	}
	############### END WHO ON LEAVE ###################

	############### PENDING LEAVE ###################
	//leave type index page
	function pending_leave()
	{
		$data = array();
		$data['page'] = 'pending_leave';
		$staff_id = $this->session->userdata('staff_id');
		if($this->session->userdata('role_id')==SUPERIOR){
			if($query = $this->leave_model->get_superior_pending_leave($staff_id)->get_all())
			{
				$data['data_records'] = $query;
			}

		}else{

			if($query = $this->leave_model->get_all_pending_leave()->get_all())
			{
				$data['data_records'] = $query;
			}
		}
		$data['main'] = 'leave/pending_leave';
		$data['js_function'] = array('leave');
		$this->load->view('template/template',$data);
	}

	function approved_leave()
	{
		$leave_application_id = $this->input->post('leave_application_id');
		//$leave_application_id = 2;
		$staff_id = $this->session->userdata('staff_id');
		$data = array();

		## minus sick leave and annual leave balance ##
		$query = $this->leave_model->get_staff_data($leave_application_id)->get_all();
		$get_staff_id = $query[0]->staff_id;

		if($query[0]->leave_type_id == 5){
			$leave_balance = $query[0]->sick_leave_balance;

			$minus_leave = $leave_balance  - $query[0]->no_of_day;

			$data_minus_leave = array (
				'sick_leave_balance'=>$minus_leave
			);

		}else{
			$leave_balance = $query[0]->annual_leave_balance;

			$minus_leave = $leave_balance  - $query[0]->no_of_day;

			$data_minus_leave = array (
				'annual_leave_balance'=>$minus_leave
			);
		}

		$this->leave_data_model->update_by(array('staff_id'=>$get_staff_id),$data_minus_leave);
		## end minus sick leave and annual leave balance ##

		$data = array (
			'leave_status'=>'a',
			'approval_id'=>$staff_id
		);

		if($this->leave_model->update($leave_application_id,$data))
		{
			$msg = "success";
			echo json_encode($msg);
		}
		else{
			$msg = "error";
			echo json_encode($msg);
		}
	}

	## json for checkbox leave approve ##
	function checkbox_leave_approve()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();
		$leave_application_id = $this->input->post('leave_application_id');
		$staff_id = $this->session->userdata('staff_id');

		foreach($leave_application_id as $id){

			## minus sick leave and annual leave balance ##
			$query = $this->leave_model->get_staff_data($id)->get_all();
			$get_staff_id = $query[0]->staff_id;

			if($query[0]->leave_type_id == 5){
				$leave_balance = $query[0]->sick_leave_balance;

				$minus_leave = $leave_balance  - $query[0]->no_of_day;

				$data_minus_leave = array (
					'sick_leave_balance'=>$minus_leave
				);

			}else{
				$leave_balance = $query[0]->annual_leave_balance;

				$minus_leave = $leave_balance  - $query[0]->no_of_day;

				$data_minus_leave = array (
					'annual_leave_balance'=>$minus_leave
				);
			}

			$this->leave_data_model->update_by(array('staff_id'=>$get_staff_id),$data_minus_leave);
			## end minus sick leave and annual leave balance ##
		}

		$data = array (
			'leave_status'=>'a',
			'approval_id'=>$staff_id
		);
			foreach($leave_application_id as $value){
				$query = $this->leave_model->update($value,$data);
			}
		$data['page'] = 'checkbox_tab_delete';

		redirect('leave/pending_leave', $data);
	}

	## json for checkbox leave approve ##
	function reject_leave()
	{
		//$this->permission->superadmin_admin_only();
		$data = array();

		$data['page'] = 'pending_leave';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('reject_reason', 'Reject Reason', 'required|trim');
		if ($this->form_validation->run() === TRUE)
		{
			$reject_reason = $this->input->post('reject_reason');
			$leave_application_id = $this->input->post('leave_application_id');
			$staff_id = $this->session->userdata('staff_id');
			$data = array (
				'leave_status'=>'r',
				'reject_reason'=>$reject_reason,
				'approval_id'=>$staff_id
			);

			$this->leave_model->update($leave_application_id,$data);

			## get application data
			$query = $this->leave_model->get_by('leave_application_id',$leave_application_id);
			$staff_id_from_apply_leave = $query->staff_id;
			$leave_type_id = $query->leave_type_id;
			$no_of_day =  $query->no_of_day;

			## get leave type
			$get_leave_data = $this->leave_data_model->get_by('staff_id',$staff_id_from_apply_leave);
			$annual_leave_balance = $get_leave_data->annual_leave_balance;
			$sick_leave_balance = $get_leave_data->sick_leave_balance;
			// if not medical leave,  add back leave to user
			if($leave_type_id != 5){
				$total_leave = $annual_leave_balance + $no_of_day;
				$this->leave_data_model->update_by(array('staff_id'=>$staff_id_from_apply_leave),array('annual_leave_balance'=>$total_leave));
			}else{
				$total_leave = $sick_leave_balance + $no_of_day;
				$this->leave_data_model->update_by(array('staff_id'=>$staff_id_from_apply_leave),array('sick_leave_balance'=>$total_leave));
			}

			$this->session->set_flashdata('success', 'You have successfully rejected the leave');
			redirect('leave/pending_leave');

		}else{


			$data = array();
			$data['page'] = 'pending_leave';
			$staff_id = $this->session->userdata('staff_id');
			if($this->session->userdata('role_id')==SUPERIOR){
				if($query = $this->leave_model->get_superior_pending_leave($staff_id)->get_all())
				{
					$data['data_records'] = $query;
				}

			}else{

				if($query = $this->leave_model->get_all_pending_leave()->get_all())
				{
					$data['data_records'] = $query;
				}
			}
			$data['main'] = 'leave/pending_leave';
			$data['js_function'] = array('leave');
			$this->load->view('template/template',$data);
		}
	}
	############### END PENDING LEAVE ###################

}//end of class
?>