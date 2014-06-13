<?php 

class FormProcess extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper('url');

	}

	public function index()
	{
		echo "THIS PAGE CANNOT BE VIEWED DIRECTLY";
	}

	public function add_leave()
	{
		$this->load->model('process');
		if($this->process->process_conf_leave())
			$data["result"]=$this->process->process_conf_leave();
		
		redirect("view/view_emp_leaves/".$this->input->post('id')."/".$this->input->post('ename'));
	}

	public function edit_emp()
	{
		$this->load->model('process');
		$id=$this->process->process_emp("update");

		redirect("view/view_profile_page/".$id);
	}

	public function login()
	{
		$this->load->model('queries');
		if($this->queries->login())
			redirect("view");
		else
			redirect("view/login/1");

	}

	public function logout()
	{
		unset($_COOKIE['usr_name']);
        unset($_COOKIE['is_admin']);
        setcookie('usr_name', null, -1, '/');
        setcookie('is_admin', null, -1, '/');

        redirect("view/login");
	}
}

/* End of file process.php */
/* Location: ./application/controllers/process.php */