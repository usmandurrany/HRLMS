<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		$this->load->helper('url');
		$this->load->helper('form');

		if ((!isset($_COOKIE['usr_name']) && (!isset($_COOKIE['is_admin'])))){
			if ($this->uri->segment(2)!="login") {
				redirect("view/login");
			}
		}
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function view_add_leave()
	{
		$this->load->view('add_leave');
	}

	public function view_add_emp()
	{
		$this->load->view('add_emp');
	}

	public function view_all_emp()
	{
		$this->load->model('queries');
		if($this->queries->get_all("employees"))
			$data["result"]=$this->queries->get_all("employees");
		else
			$data["result"]=FALSE;

		$this->load->view('all_emp', $data);
	}

	public function view_all_leaves()
	{
		$this->load->model('queries');
		if($this->queries->get_all("leaves"))
			$data["result"]=$this->queries->get_all("leaves");
		else
			$data["result"]=FALSE;

		$this->load->view('all_leaves', $data);
	}

	public function view_conf_leave($emp_id,$l_id,$method)
	{
		
		$this->load->model('queries');
		if(($emp_id != FALSE) && ($l_id != FALSE) && ($method == "edit")){
			$data["result"]=$this->queries->edit_leave_det($emp_id,$l_id);
			
		}
		else{
			$data["result"]=$this->queries->get_leave_det();
		}
		

		$this->load->view('confirm_leave', $data);
	}

	public function view_emp_pic()
	{
		$this->load->model('process');
		$result=$this->process->process_emp("add");
		if ($result != false) 
		{
			$data["id"]=$result;
		}


		$this->load->view('add_emp_pic', $data);
	}

 	public function view_profile_page($id)
 	{
 		$this->load->model('queries');
		if($this->queries->get_pro_pic($id))
			$data["result"]=$this->queries->get_pro_pic($id);

 		$this->load->view('profile_page', $data);
 	}
 	
 	public function view_emp_leaves($id)
 	{
 		$this->load->model('queries');

		if($this->queries->get_emp_leaves($id)){
			$data["result"]=$this->queries->get_emp_leaves($id);
			// $data["ename"] = $name;
			$data["id"] = $id;
		}
		else
		{
			$data["result"] = FALSE;
		}


 		$this->load->view('emp_leaves', $data);
 	}

 	public function view_delete($id,$page,$name)
	{
		$this->load->model('process');

	    if($page=='all_emp')
	    {
	        $this->process->delete_emp($id);
		        redirect("view/view_".$page);

	    }

	    elseif(($page=='all_leaves')||($page=="emp_leaves"))
	    {
	        $this->process->delete_leave($id);
		        redirect("view/view_".$page);


	    }
	}
	public function view_reports($type)
	{
		$report = $this->input->post('report') ? $this->input->post('report') : "";

		if (($type == "emp_rpt")&&($report == "")) {

			$data["type"] = $type;
			$this->load->view('reports', $data);
		}

		else if (($type == "emp_rpt")&&($report == "emp")) {

			$this->load->model('queries');
			if ($this->queries->get_emp_rpt())
				$data["result"] = $this->queries->get_emp_rpt();
			else
				$data["result"] = FALSE;

			$this->load->view('reports', $data);
		}

		else if (($type == "leave_rpt")&&($report == "")) {

			$data["type"] = $type;
			$this->load->view('reports', $data);
		}

		else if (($type == "leave_rpt")&&($report == "leave")) {

			$this->load->model('queries');
			if($this->queries->get_leave_rpt() != FALSE)
				$data["result"] = $this->queries->get_leave_rpt();
			else
				$data["result"] = FALSE;

			$this->load->view('reports', $data);
		}
	}

}

/* End of file view.php */
/* Location: ./application/controllers/view.php */