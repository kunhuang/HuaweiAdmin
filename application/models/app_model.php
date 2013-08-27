<?php
class App_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function finance_add($submit_user_id,$submit_name,$submit_time,$expense,$use)
	{
		$sql = "INSERT INTO finance values('','".$submit_user_id."','".$submit_name."','".$submit_time."','".$expense."','".$use."')";
		$result = $this->db->simple_query($sql);
		return $result;
	}
	public function finance_get($id = FALSE)
	{
		if($id == FALSE)
		{
			$sql = "SELECT * from finance order by id desc";
			$result = $this->db->query($sql);
			$result = $result->result();
			return $result;
		}
		else
		{
			$sql = "SELECT * from finance where id = ".$user_id;
			$result = $this->db->query($sql);
			$result = $result->result();
			return $result;
		}
	}
	public function finnance_delete($id)
	{
		$sql = "DELETE from finance where id = ".$id;
		$result = $this->db->simple_query($sql);
		return $result;
	}
}
?>