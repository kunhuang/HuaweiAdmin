<?php
class User_model extends CI_Model{

	public function __contruct()
	{
		parent::__contruct();
		$this->load->database();
	}

	public function login($UserID, $UserPassword)
	{
		$token = $this->my_encode($UserPassword);
        $data = array(
        	'user_id' => $UserID,
        	'token' => $token
        	);
        $this->db->where($data);
		$query = $this->db->get('user_info');
        
        if($query->num_rows() == 1)
		{
            $result = $query->row_array();
            $this->session->set_userdata('user_name',$result['user_name']);
            $this->session->set_userdata('user_id',$UserID);
		    return TRUE;
		}
		return FALSE;
	}
    public function logout()
    {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_id');
        return TRUE;
    }
    public function is_login()
    {
        if($this->session->userdata('user_id'))
            return TRUE;
        else
            return FALSE;
    }
    public function get_user_info($item = FALSE)
    {
        $this->db->where(array('user_id'=>$this->get_user_id()));
        if($item)
            $this->db->select($item);
        $query = $this->db->get('user_info');

        if($query->num_rows() == 1)
        {
            $result= $query->row_array();
            if($item)
                return $result[$item];
            return $result;
        }
        return FALSE;
    }
    public function edit_user_info($user_id,$user_name,$tel,$college,$grade,$section,$position)
    {
        if($this->get_user_info('authority') > 2 && $user_id != $this->get_user_id())
            return FALSE; // 没有权限修改别人的信息
        $data = array(
            'user_name' => $user_name,
            'tel' => $tel,
            'college' => $college,
            'grade' => $grade,
            'section' => $section,
            'position' => $position
            );
        $this->db->where(array('user_id'=>$user_id));
        $this->db->update('user_info',$data);
    }
    public function get_user_name()
    {
        return $this->session->userdata('user_name');
    }
    public function get_user_id()
    {
        return $this->session->userdata('user_id');
    }
    public function my_encode($string)
    {
    	return md5($string);
    }

	public function register($UserID, $UserPassword, $UserName)
	{
		//$this->load->database();
		$token = $this->my_encode($UserPassword);
        $data = array(
               'user_id' => $UserID ,
               'token' => $token ,
               'user_name' => $UserName,
               'authority' => '1'
            );
        $query = $this->db->get_where('user_info',array('user_id'=>$UserID));
        if($query->num_rows() > 0)
        	return FALSE;
        $this->db->insert('user_info', $data);
        $this->session->set_userdata('user_name',$UserName);
        $this->session->set_userdata('user_id',$UserID);
        return true;
	}
}
?>