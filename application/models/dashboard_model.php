<?php
class Dashboard_model extends MY_Model {

	protected $_table = 'tb_leave_notification';
	protected $primary_key = 'notification_id';
	
	function sort_date(){
		$this->db->order_by("date_created", "desc"); 
		return $this;
	}

}
?>