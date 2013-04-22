<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Report extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		//$this->load->model('home_model');
		//$this->load->model('user_model');
		$this->load->model('user_model');
		$this->load->model('leave_model');
		$this->load->model('leave_type_model');
		$this->load->model('leave_data_model');
		$date = date('Y-m-d h:i:s');
	}

	############### STAFF LEAVE BALANCE ###################
	function staff_leave_balance()
	{
		$data = array();
		$data['page'] = 'staff_leave_balance';
		$staff_id = $this->session->userdata('staff_id');
		if($query = $this->leave_model->get_staff_detail_report()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'report/staff_leave_balance';
		$data['js_function'] = array('report');
		$this->load->view('template/template',$data);
	}
	###############  END STAFF LEAVE BALANCE ###################

	###############  STAFF LEAVE DETAIL ###################
	function staff_leave_detail()
	{
/* 		$data = array();
		$data['page'] = 'staff_leave_detail';
		$staff_id = $this->session->userdata('staff_id');
		if($query = $this->user_model->get_staff_detail_report()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'report/staff_leave_detail';
		$data['js_function'] = array('report');
		$this->load->view('template/template',$data); */

		$data = array();
		$data['page'] = 'staff_leave_detail';

		// start pagination
		$config = $this->pagination_config();

		$config['base_url'] = base_url().'report/staff_leave_detail';

		$config['total_rows'] = count($this->user_model->search_list()->get_staff_detail_report()->get_all());

		$this->pagination->initialize($config);
		// end pagination

		if($query = $this->user_model->search_list(null, $config['per_page'],$this->uri->segment(3))->get_staff_detail_report()->get_all())
		{
			$data['data_records'] = $query;
		}

		$data['main'] = 'report/staff_leave_detail';
		$data['js_function'] = array('report');
		$this->load->view('template/template',$data);
	}

	public function search_staff_leave()
	{
		//set the search data
		$this->load->library('searchdata');

		$this->searchdata->_set();

		$content_data = array();

		//Pagination

		$config = $this->pagination_config();

		$config['base_url'] = base_url().'report/search_staff_leave';

		$search_param = array();

		foreach($this->session->userdata('search') as $key => $value)
		{

			$search_param = $search_param + array($key=>$value);

		}

		$config['total_rows'] = count($this->user_model->search_list($search_param, null, null)->get_staff_detail_report()->get_all());

		$this->pagination->initialize($config);
			// end Pagination

		if($query = $this->user_model->search_list($search_param, $config['per_page'], $this->uri->segment(3))->get_staff_detail_report()->get_all())
		{
			$content_data['data_records'] = $query;
		}
		$content_data['page'] = 'staff_leave_detail';
		$content_data['main'] = 'report/staff_leave_detail';
		$content_data['js_function'] = array('report');
		$this->load->view('template/template', $content_data);
	}

	// print to excel
	function search_leave_detail_excel()
	{
		$this->load->library('searchdata');

		//set the search data

		$this->searchdata->_set();

		$data = array();

		$search_param = array();

		foreach($this->session->userdata('search') as $key => $value)
		{
			$search_param = $search_param + array($key=>$value);
		}

		if($query = $this->user_model->search_list($search_param, null, null)->get_staff_detail_report()->get_all())
		{
			$data['data_records'] = $query;
		}
		else
		{
			$data['data_records'] = array();
		}

		$this->load->view('report/staff_leave_detail_excel',$data);

	}
	############### END STAFF LEAVE DETAIL ###################

	############### ADMIN HISTORY REPORT ###################
	function admin_history_report()
	{
	/* 	$data = array();
		$data['page'] = 'admin_history_report';
		if($query = $this->leave_model->get_admin_history_leave_data()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'report/admin_history_report';
		$data['js_function'] = array('report');
		$this->load->view('template/template',$data);*/

		$data = array();
		$data['page'] = 'admin_history_report';

		// start pagination
		$config = $this->pagination_config();

		$config['base_url'] = base_url().'report/admin_history_report';

		$config['total_rows'] = count($this->leave_model->search_admin_history_report_list()->get_admin_history_leave_data()->get_all());



		$this->pagination->initialize($config);
		// end pagination

		if($query = $this->leave_model->search_admin_history_report_list(null, $config['per_page'],$this->uri->segment(3))->get_admin_history_leave_data()->get_all())
		{
			$get_approval_id = $this->user_model->get_admin_history_approval_id()->get_all();

			$data['data_get_approval_id'] = $get_approval_id;

			$data['data_records'] = $query;


		}

		$data['main'] = 'report/admin_history_report';
		$data['js_function'] = array('report');
		$this->load->view('template/template',$data);
	}


	public function search_admin_history()
	{
		//set the search data
		$this->load->library('searchdata');

		$this->searchdata->_set();

		$content_data = array();

		//Pagination

		$config = $this->pagination_config();

		$config['base_url'] = base_url().'report/admin_history_report';

		$search_param = array();

		foreach($this->session->userdata('search') as $key => $value)
		{

			$search_param = $search_param + array($key=>$value);

		}

		$config['total_rows'] = count($this->leave_model->search_admin_history_report_list($search_param, null, null)->get_admin_history_leave_data()->get_all());

		$this->pagination->initialize($config);
			// end Pagination

		if($query = $this->leave_model->search_admin_history_report_list($search_param, $config['per_page'], $this->uri->segment(3))->get_admin_history_leave_data()->get_all())
		{
			$get_approval_id = $this->user_model->get_admin_history_approval_id()->get_all();

			$content_data['data_get_approval_id'] = $get_approval_id;
			$content_data['data_records'] = $query;
		}
		$content_data['page'] = 'admin_history_report';
		$content_data['main'] = 'report/admin_history_report';
		$content_data['js_function'] = array('report');
		$this->load->view('template/template', $content_data);
	}

	// print to excel
	function search_admin_history_excel()
	{
		$this->load->library('searchdata');

		//set the search data

		$this->searchdata->_set();

		$data = array();

		$search_param = array();

		foreach($this->session->userdata('search') as $key => $value)
		{
			$search_param = $search_param + array($key=>$value);
		}
		
		$get_approval_id = $this->user_model->get_admin_history_approval_id()->get_all();

		$data['data_get_approval_id'] = $get_approval_id;
		
		if($query = $this->leave_model->search_admin_history_report_list($search_param, null, null)->get_admin_history_leave_data()->get_all())
		{
			$data['data_records'] = $query;
		}
		else
		{
			$data['data_records'] = array();
		}

		$this->load->view('report/leave_history_excel',$data);

	}
	############### END ADMIN HISTORY REPORT ###################

	############### PENDING LEAVE ###################
	//leave type index page
	function pending_leave()
	{
		$data = array();
		$data['page'] = 'pending_leave';
		if($query = $this->leave_model->get_pending_leave()->get_all())
		{
			$data['data_records'] = $query;
		}
		$data['main'] = 'leave/pending_leave';
		$data['js_function'] = array('leave');
		$this->load->view('template/template',$data);
	}
	############### END PENDING LEAVE ###################



	function pagination_config()
	{
		$this->load->library('pagination');

		$config['per_page'] =10;
		$config['num_links'] = 2;
		$config['first_link'] = false;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['last_link'] = false;
		$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		return $config;

	}
}//end of class
?>