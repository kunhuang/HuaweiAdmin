<?php
class App extends CI_controller{
	var $general_data;
	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("App_model");
		if($this->User_model->is_login() == FALSE)
		{
			$this->User->index();
		}
		$this->general_data['title'] = 'finance';
		$this->general_data['user_name'] = $this->User_model->get_user_name();
		$this->general_data['active'] = 'app';
	}
	public function finance()
	{
		if($this->User_model->is_login() == FALSE)
		{
			$this->User->index();
		}
		else
		{
			$data['finance'] = $this->App_model->finance_get();
			//die(print_r($data));
			$this->load->view("templates/header",$this->general_data);
			$this->load->view("finance",$data);
			$this->load->view("templates/footer");
		}
	}
	public function finance_add()
	{
		if($this->User_model->is_login() == FALSE)
		{
			$this->User->index();
		}
		else
		{
			if($this->input->post('submit_time'))
			{
				$submit_name = $this->User_model->get_user_info('user_name');
				$submit_user_id = $this->User_model->get_user_info('user_id');
				$submit_time = strtotime($this->input->post('submit_time'));
				
				$result = $this->App_model->finance_add(
						$submit_user_id,
						$submit_name,
						$submit_time,
						$this->input->post('expense'),
						$this->input->post('use'));
		        header('Location: '.site_url('app/finance'));
			}
			else
			{
				$this->load->view('templates/header',$this->general_data);
				$this->load->view('finance_add');
				$this->load->view('templates/footer');
			}
		}
	}
}
?>