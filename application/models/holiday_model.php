<?php

class Holiday_model extends MY_Model {

	protected $_table = 'tb_public_holiday';
	//protected $primary_key = 'department_id';

	function sort_data(){
		$this->db->order_by('department_name', 'asc');	
		return $this;
	}
}
?>