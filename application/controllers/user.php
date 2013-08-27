<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
    var $general_data;
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model("User_model");
        //$this->load->helper('form')
        $this->general_data['user_name'] = $this->User_model->get_user_name(); 
        $this->general_data['title'] = 'User';
        $this->general_data['active'] = 'user';
    }

	public function index()
	{
        if($data['user_name'] = $this->User_model->get_user_name())
        {   
            header('Location: '.site_url('user/info'));
            die();
        }
        else
        {
    		$this->load->view('templates/header',$this->general_data);
    		$this->load->view("login.php");
    		$this->load->view('templates/footer');
        }
		//die();
	}

	public function register()
	{
        $UserID = $this->input->post("UserID");
        $UserPassword = $this->input->post("UserPassword");
        $UserName = $this->input->post("UserName");

        if($UserID == "")
        {
            $this->load->view('templates/header',$this->general_data);
        	$this->load->view('register');
        	$this->load->view('templates/footer');
        }
        else
        {
        	if($this->User_model->register($UserID,$UserPassword,$UserName) == TRUE)
        		$this->welcome($UserName);
        	else
        	{
            	$this->load->view('templates/header',$this->data);
            	$this->load->view('register');
        	    $this->load->view('templates/footer');
            }
        }
	}

	public function login()
	{
		$UserID = $this->input->post("UserID");
		$UserPassword = $this->input->post("UserPassword");

        if($this->User_model->login($UserID, $UserPassword) == true)
		{
			header('Location: '.site_url('user/index'));
            die();
        }
		else
		{
			$this->load->view('templates/header',$this->general_data);
		    $this->load->view("login.php");
		    $this->load->view('templates/footer');
	    }
	}

    public function logout()
    {
        $this->User_model->logout();
        header('Location: '.site_url('user/index'));
        die();
    }
	
    public function info()
    {
        
        $data = $this->User_model->get_user_info();
        
        $this->load->view('templates/header',$this->general_data);
        $this->load->view('user_info',$data);
        $this->load->view('templates/footer');
    }
    public function info_edit()
    {
        if($this->input->post('user_id'))
        {
            $config['upload_path'] = './';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
              
            $this->load->library('upload', $config);
             
            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());   
                die(print_r($error));
            //    $this->load->view('user_info_edit', $error);
            } 
            else
            {
                $data = array('upload_data' => $this->upload->data());   
            }
         
            $this->User_model->edit_user_info(
                $this->input->post('user_id'),
                $this->input->post('user_name'),
                $this->input->post('tel'),
                $this->input->post('college'),
                $this->input->post('grade'),
                $this->input->post('section'),
                $this->input->post('position')
                );
            header('Location: '.site_url('user/info'));
            die();
        }
        else
        {
            $data = $this->User_model->get_user_info();
            
            $this->load->view('templates/header',$this->general_data);
            $this->load->view('user_info_edit',$data);
            $this->load->view('templates/footer');
        }
    }
}
?>