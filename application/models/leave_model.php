<?php

class Leave_model extends MY_Model {

	protected $_table = 'tb_leave_application';
	protected $primary_key = 'leave_application_id';

	function leave_type()
	{
		$this->db->select('tb_leave_type.*');
		$this->db->from('tb_leave_type');
		$query = $this->db->get();

		return $query->result();
	}



	function get_staff_detail($staff_id)
	{
		$this->db->join('tb_leave_type', 'tb_leave_application.leave_type_id = tb_leave_type.leave_type_id');
		$this->db->where('tb_leave_application.staff_id', $staff_id);
		$this->db->order_by("leave_status", "desc");
		$this->db->order_by("date_apply", "desc");
		return $this;
	}

	function get_staff_data($leave_application_id)
	{
		$this->db->join('tb_leave_data', 'tb_leave_application.staff_id = tb_leave_data.staff_id');
		$this->db->join('tb_staff', 'tb_leave_application.staff_id = tb_staff.staff_id');
		$this->db->where('tb_leave_application.leave_application_id', $leave_application_id);

		return $this;
	}

	function get_whos_on_leave()
	{
		$this->db->join('tb_staff', 'tb_leave_application.staff_id = tb_staff.staff_id');
		$this->db->join('tb_leave_type', 'tb_leave_application.leave_type_id = tb_leave_type.leave_type_id');
		$this->db->where('tb_staff.staff_id !=','1');
		$this->db->where('tb_leave_application.leave_status =','a');
		$this->db->order_by("end_date", "desc");
		return $this;
	}

	function get_all_pending_leave()
	{
		$this->db->join('tb_staff', 'tb_leave_application.staff_id = tb_staff.staff_id');
		$this->db->join('tb_leave_type', 'tb_leave_application.leave_type_id = tb_leave_type.leave_type_id');
		$this->db->where('tb_leave_application.leave_status', "p");
		$this->db->where('tb_staff.staff_id !=','1');
		$this->db->order_by("end_date", "desc");
		return $this;
	}

	function get_superior_pending_leave($staff_id)
	{
		$this->db->join('tb_staff', 'tb_leave_application.staff_id = tb_staff.staff_id');
		$this->db->join('tb_leave_type', 'tb_leave_application.leave_type_id = tb_leave_type.leave_type_id');
		$this->db->where('tb_leave_application.leave_status', "p");
		$this->db->where('tb_staff.superior_id', $staff_id);
		//$this->db->where('end_date >', DATE_SUB(NOW(), INTERVAL 1 WEEK);
		$this->db->order_by("end_date", "desc");
		return $this;
	}

	function get_admin_history_leave_data()
	{
		$this->db->join('tb_leave_type', 'tb_leave_application.leave_type_id = tb_leave_type.leave_type_id');
		$this->db->join('tb_staff', 'tb_leave_application.staff_id = tb_staff.staff_id');
		$this->db->join('tb_role', 'tb_staff.role_id = tb_role.role_id');
		$this->db->where('tb_staff.staff_id !=','1');
		$this->db->where('tb_leave_application.leave_status !=','p');

		return $this;
	}

	function search_admin_history_report_list($searchData=array(), $per_page=null, $current_page=null)
	{

		if (isset($per_page) && isset($current_page) ){
			$this->db->limit($per_page, $current_page);
		}

		if (isset($searchData['search_name'])){
			$this->db->like('username', $searchData['search_name']);
		}

		if (isset($searchData['search_leave_status'])){
			$this->db->where('leave_status', $searchData['search_leave_status']);
		}

		if (isset($searchData['search_start_date'])){
			$this->db->where('date(date_apply) >=  ', $searchData['search_start_date']);
		}

		if (isset($searchData['search_end_date'])){
			$this->db->where('date(date_apply) <=  ', $searchData['search_end_date']);
		}

		$this->db->order_by('date_created','desc');
		return $this;
	}
}
?>