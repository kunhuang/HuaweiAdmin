<?php
class Conference extends CI_controller{
	
	var $general_data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Conference_model');
		$this->general_data['title'] = 'conference';
		$this->general_data['user_name'] = $this->User_model->get_user_name();
		$this->general_data['active'] = 'conference';
		if($this->User_model->is_login() == FALSE)
		{
			$this->User->index();
		}
	}
	//index预览
	public function index($conference_id = FALSE)
	{
		//$data['title'] = 'conference';
		if($conference_id)
		{
			$data['conference'] = $this->Conference_model->get($conference_id);
			$data['conference']['user_id_array'] = explode(',', base64_decode($data['conference']['user_ids']));
			unset($data['conference']['user_ids']);
			//die(print_r($data['conference']));
			//die(print_r($data['conference']['user_id_array']));
		}
		else
			$data['conference_array'] = $this->Conference_model->get();
		$this->load->view('templates/header',$this->general_data);
		if($conference_id)
		{
			$this->load->view('conference_detail',$data);
		}
		else
		{
			$this->load->view('conference_general',$data);
		}
		$this->load->view('templates/footer');
	}
	//新建
	public function add()
	{
		if($this->input->post('title'))
		{
			$conference_id = $this->Conference_model->add(
				$this->input->post('time'),
				$this->input->post('place'),
				$this->input->post('title'),
				$this->input->post('keynote')
				);
			//成功信息
			$this->index($conference_id);
		}
		else
		{
			$data['title'] = 'conference';
			$this->load->view('templates/header',$this->general_data);
			$this->load->view('conference_new',$data);
			$this->load->view('templates/footer');
		}
	}

	//签到
	public function sign_in($conference_id,$user_id_array = FALSE)
	{
		if($this->User_model->get_user_info('authority') > 1)
			$user_id_array = FALSE;
		$user_id_array = array($this->User_model->get_user_id());
		$this->Conference_model->sign_in($conference_id, $user_id_array);
		$this->index($conference_id);
	}
	//修改
	public function edit($conference_id)
	{
		if($this->input->post('time'))
		{
			$this->Conference_model->edit(
				$conference_id,
				$this->input->post('time'),
				$this->input->post('place'),
				$this->input->post('title'),
				$this->input->post('keynote')
				);
			//成功信息
			$this->index($conference_id);
		}
		else
		{
			$data['conference'] = $this->Conference_model->get($conference_id);
			$this->load->view('templates/header',$this->general_data);
			$this->load->view('conference_edit',$data);
			$this->load->view('templates/footer');
		}
	}
	//会议纪录
	public function record()
	{

	}
}
?>