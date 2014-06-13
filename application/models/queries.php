<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queries extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all($table)
	{
		$query=$this->db->get($table);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		# code...
	}

	public function login()
	{
		$usr_name = $this->input->post('username');
	    $usr_pass = $this->input->post('password');

	    $this->db->where('usr_name', $usr_name);
	    $this->db->where('usr_pass', $usr_pass);

	    $query = $this->db->get('login');
	    
	    if($query->num_rows() == 1){
	    	foreach ($query->result() as $row) {
	    		if (isset($_POST["rem_me"])) {
		    		setcookie("usr_name",$row->usr_name, time()+(3600*24*30),"/");
			        setcookie("is_admin",$row->is_admin, time()+(3600*24*30),"/");
	    		}
	    		else
	    		{
	    			setcookie("usr_name",$row->usr_name,0,"/");
			        setcookie("is_admin",$row->is_admin,0,"/");
	    		}

	    	}
		    return TRUE;
	    }
		else {
		    return FALSE;
		}
	}

	public function get_leave_det()
	{
		
		$this->db->where('id', $this->input->get('id'));
		$query = $this->db->get('employees');

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
		}

		
		return $data;
    }	

    public function edit_leave_det($emp_id,$l_id)
    {

    	$this->db->select('*');
		$this->db->from('leaves');
		$this->db->where('leaves.id',$l_id);
		$this->db->join('employees', ' employees.id = leaves.emp_id ', 'left');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;

				return $data;
			}
		}

    }

    public function get_pro_pic($id)
    {
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->where('employees.id',$id);
		$this->db->join('pictures', 'pictures.id = employees.picture_id   ', 'left');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;

				return $data;
			}
		}
    }

    public function get_emp_leaves($id)
    {
    	$this->db->where('emp_id', $id);
    	$query=$this->db->get('leaves');

    	if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}else{
			return FALSE;
		}
    }

    public function get_leave_rpt()
    {
    	$id = $this->input->post('id');
    	$to = $this->input->post('to');
    	$from = $this->input->post('from');

    	$this->db->where('emp_id', $id);
    	$this->db->where('date BETWEEN "'.date("Y-m-d",strtotime($from)).'" AND "'.date("Y-m-d",strtotime($to)).'"');
    	$query = $this->db->get('leaves');

		if($query->num_rows() > 0){
	    	foreach ($query->result() as $row) {
	    		$data[] = $row;
	    	}
	    	return $data;
    	}
    	else {
    		return FALSE;
    	}

    }

    public function get_emp_rpt()
    {
    	$dept = $this->input->post('dept');
    	$desig = $this->input->post('desig');

    	if (($desig != "") && ($dept == "")) {
    		$this->db->where('desig', $desig);
    	}

    	else if (($desig == "") && ($dept != "")) {
    		$this->db->where('dept', $dept);
    	}

    	else if (($desig != "") && ($dept != "")) {
    		$this->db->where('desig', $desig);
    		$this->db->where('dept', $dept);
    	}

    	$query = $this->db->get('employees');

    	if($query->num_rows() > 0){
	    	foreach ($query->result() as $row) {
	    		$data[] = $row;
	    	}
	    	return $data;
    	}
    	else {
    		return FALSE;
    	}
    }
}

/* End of file queries.php */
/* Location: ./application/models/queries.php */