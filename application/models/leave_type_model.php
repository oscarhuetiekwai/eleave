<?php

class Leave_type_model extends MY_Model {

	protected $_table = 'tb_leave_type';
	protected $primary_key = 'leave_type_id';

	function get_active_leave_type()
	{
		$this->db->where('tb_leave_type.status =','Y');
		return $this;
	}
}
?>