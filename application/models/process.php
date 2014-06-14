<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	

	

    public function update_num_leaves($emp_id)
    {
		$this->db->where('emp_id', $emp_id);
    	$this->db->select_sum('tot_leaves');
        $query_tot_leaves=$this->db->get('leaves');
        foreach ($query_tot_leaves->result() as $row) {
        	$num_leaves = $row->tot_leaves;
        }

		$this->db->where('id', $emp_id);
    	$this->db->select('allowed_leaves');
        $query_allowed_leaves=$this->db->get('employees');
        foreach ($query_allowed_leaves->result() as $row) {
        	$allowed_leaves = $row->allowed_leaves;
        }

        $num_leaves=$allowed_leaves-intval($num_leaves);

        $leaves_left = array('leaves_left' => $num_leaves );
        $this->db->where('id', $emp_id);
		$this->db->update('employees', $leaves_left);

        return true;
    }

    public function calc_days($from,$to)
    {
    	$from = strtotime($from);
    	$to = strtotime($to);

    	$datediff = intval($to - $from);
    	$days = floor($datediff/(60*60*24)) + 1;

    	return $days;
    }

	public function process_conf_leave()
	{
		$data["date"]=date('Y-m-d',strtotime($this->input->post('leave_date')));
	   	


	   	$data["name"]=$this->input->post('ename');
	  	$data["type"]=$this->input->post('type');
	    if($data["type"]=="Full Leave"){
		   $data["from"]=$this->input->post('date-from');
		   $data["to"]=$this->input->post('date-to');

	       $data["days"]=$this->calc_days($data["from"],$data["to"]);
	       $data["weight"]=1;
	    }
		else{
		   $data["from"]=$this->input->post('time-from');
		   $data["to"]=$this->input->post('time-to');

	       $data["days"]=1;
	    if($data["type"]=="Half Day"){
	        $data["weight"]="0.5";
	    }
	    elseif($data["type"]=="Short Leave"){
	        $data["weight"]="0.3";
	    }
	    }
	   	$data["reason"]=$this->input->post('reason');
	   	$data["emp_id"]=$this->input->post('id');
	   	// $num_leaves=$this->input->post('num_leaves');
       	$data["tot_leaves"]=($data["weight"]*$data["days"]);

		if ($this->input->post("edit")=="do") {
			$this->db->where('id', $this->input->post("l_id"));
			if($this->db->update('leaves', $data))
		    {  
		    	$this->update_num_leaves($data["emp_id"]);
	    	}
	    	else
	    	{ 
	        die(mysql_error());
	    	}
        }
		else if ($this->input->post("edit")!="do")
		{
            if($this->db->insert('leaves', $data))
            {  
                $this->update_num_leaves($data["emp_id"]);

            }
            else
            { 
                die(mysql_error());
            }
    	}
	}

	public function process_emp($method)
	{
		$data["ename"]=$this->input->get_post("ename");
	    $data["desig"]=$this->input->get_post("desig");
	    $data["dept"]=$this->input->get_post("dept");
	    $data["doa"]=$this->input->get_post("doa");
	    $data["dob"]=$this->input->get_post("dob");
	    $data["ph1"]=$this->input->get_post("ph1");
	    $data["ph2"]=$this->input->get_post("ph2");
	    $data["email"]=$this->input->get_post("email");
	    $data["address"]=$this->input->get_post("address");

	    if ($method != "update") {    

		    if($this->db->insert('employees', $data)){
		    	$this->db->order_by('id', 'desc');
		    	$query=$this->db->get('employees', 1);

		    	foreach ($query->result() as $row) 
		    	{
		    		$id=$row->id;
		    	}

	    		return $id;
	    	}
	    }
	    else
	    {
	    	$emp_id=$this->input->get_post("id");

	    	$this->db->where('id', $emp_id);
	    	$this->db->update('employees', $data);

	    	return $emp_id;
	    }
    }

    public function process_emp_pic($files,$type,$skip)
    {
		
   		$id = $this->input->get_post('id');
   		if ($skip!="skip") {
		   	$data["pic_url"]="img/profile_pics/".md5($id).".png";
   		}else{
		   	$data["pic_url"]="img/profile_pics/default.png";
   		}

	   	if ($type == "update") {
	   		if ($this->input->get_post('pic_id') == "") {
	   			$this->db->insert('pictures', $data);
				$this->db->order_by('id', 'desc');
				$query=$this->db->get('pictures',1);

		   		foreach ($query->result() as $row) {
		   			$pic_id["picture_id"]=$row->id;
		   		}

			   	$this->db->where('id', $this->input->get_post('id'));
			   	$this->db->update('employees', $pic_id);
		   		
	   		}else{
		   		$this->db->where('id', $this->input->get_post('pic_id'));
			   	$this->db->update('pictures', $data);

			}
		   		
	   	}
	   	else
	   	{
			$this->db->insert('pictures', $data);
		   	$this->db->order_by('id', 'desc');
		   	$query=$this->db->get('pictures',1);

		   	foreach ($query->result() as $row) {
		   		$pic_id["picture_id"]=$row->id;
		   	}

		   	$this->db->where('id', $this->input->get_post('id'));
		   	$this->db->update('employees', $pic_id);
	   	}

	   	return true;
    }

    public function delete_emp($id)
    {
    	$this->db->where('id', $id);
        $query=$this->db->get('employees');

        foreach ($query->result() as $row) {
        	$pic_id = $row->picture_id;
        }

        $this->db->where('id', $id);
        $this->db->delete('employees');

        if ($pic_id != "NULL") {
	        $this->db->where('id', $pic_id);
	        $this->db->delete('pictures');
	    }

        $this->db->where('emp_id', $id);
        $this->db->delete('leaves');
    }

    public function delete_leave($id)
    {	
    	$this->db->where('id', $id);
    	$this->db->delete('leaves');

    	$this->update_num_leaves($id);
    }
	
}

/* End of file process.php */
/* Location: ./application/models/process.php */