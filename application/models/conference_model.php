<?php
class Conference_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		if($this->User_model->is_login() == FALSE)
		{
			$this->User->index();
		}
	}

	public function get($conference_id = FALSE)
	{
		if($conference_id == FALSE)
		{
			$this->db->order_by('id','desc');
			$query = $this->db->get('conference');
			if($query->num_rows() > 0)
			{
				$result = $query -> result_array();
				return $result;
			}
			else
				return false;
		}
		else
		{
			$this->db->where(array('id'=>$conference_id));
			$query = $this->db->get('conference');
			if($query->num_rows() > 0)
			{
				$result = $query -> row_array();
				return $result;
			}
			else
				return false;
		}
	}

	public function add($time,$place,$title,$keynote)
	{
		$data = array(
			'time'=>$time,
			'place'=>$place,
			'title'=>$title,
			'keynote'=>$keynote);
		$this->db->insert('conference',$data);
		
		$this->db->select('id');
		$this->db->where($data);
		$this->db->order_by('id','desc');
		$query = $this->db->get('conference');
		if($query -> num_rows() > 0)
		{
			$result = $query -> row_array();
			return $result['id'];
		}
		else
			return FALSE;
	}

	public function edit($conference_id,$time,$place,$title,$keynote)
	{
		$this->db->where(array('id'=>$conference_id));

		$data = array(
			'time'=>$time,
			'place'=>$place,
			'title'=>$title,
			'keynote'=>$keynote);
		return $this->db->update('conference',$data);
	}
	public function sign_in($conference_id, $user_id_array)
	{
		$this->db->where(array('id'=>$conference_id));
		$this->db->select('user_ids');
		$query = $this->db->get('conference');
		if($query -> num_rows() == 0)
			return FALSE;
		$result = $query -> row_array();
		$former_user_ids = $result['user_ids'];
		$former_user_ids = base64_decode($former_user_ids);//string decode
		$former_user_id_array = explode(',', $former_user_ids);//string-->array

		$user_id_array = array_merge($former_user_id_array,$user_id_array);
		$user_id_array = array_unique($user_id_array);//delete the overlap data
		$user_ids = implode(',', $user_id_array);
		$user_ids = base64_encode($user_ids);

		$this->db->where(array('id'=>$conference_id));
		$this->db->update('conference',array('user_ids'=>$user_ids));
	}
}
?>