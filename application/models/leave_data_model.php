<?php

class Leave_data_model extends MY_Model {

	protected $_table = 'tb_leave_data';
	protected $primary_key = 'leave_data_id';

	function get_staff()
	{
		$this->db->join('tb_staff', 'tb_leave_data.staff_id = tb_staff.staff_id');
		$this->db->where('tb_staff.role_id !=', '1');
		//$this->db->join('tb_role', 'tb_staff.role_id = tb_role.role_id');
		//$this->db->join('tb_position', 'tb_staff.position_id = tb_position.position_id');
		//$this->db->join('tb_department', 'tb_staff.department_id = tb_department.department_id');
		return $this;
	}

	function get_staff_data($staff_id)
	{
		//$this->db->join('tb_staff', 'tb_leave_data.staff_id = tb_staff.staff_id');
		$this->db->where('tb_leave_data.staff_id =', $staff_id);
		//$this->db->join('tb_role', 'tb_staff.role_id = tb_role.role_id');
		//$this->db->join('tb_position', 'tb_staff.position_id = tb_position.position_id');
		//$this->db->join('tb_department', 'tb_staff.department_id = tb_department.department_id');
		return $this;
	}
}
?>