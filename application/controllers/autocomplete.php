<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
    if(($this->input->get("type")=="dept")||($this->input->get("type")=="desig")){
        if($this->input->get("type")=="dept"){
        	$query = "SELECT DISTINCT dept FROM `employees` WHERE `dept` LIKE '%".$this->input->get('term')."%'";
		}
        else if($this->input->get("type")=="desig"){
            $query = "SELECT DISTINCT desig FROM `employees` WHERE `desig` LIKE '%".$this->input->get('term')."%'";

		}
        $result = $this->db->query($query);
        $num_rows = $result->num_rows();
        echo "[";
        $i=$num_rows;
		foreach ($result->result_array() as $row) {
            echo '{"id":"'.$i.'","label":"'.$row[$this->input->get('type')].'","value":"'.$row[$this->input->get('type')].'"}'; 
            $i--;
            if($i!=0)
                echo ',';
  
        }
                echo "]";

    }
else{
        $this->db->like('ename',$this->input->get("term"));
        $result = $this->db->get('employees');
        $num_rows = $result->num_rows();
        echo "[";
        $i=$num_rows;
		foreach ($result->result() as $row) {
            echo '{"id":"'.$row->id.'","label":"'.$row->ename.'","value":"'.$row->ename.'"}'; 
            $i--;
            if($i!=0)
                echo ',';
  
        }
        
        echo "]";
    }		
	}

}

/* End of file autocomplete.php */
/* Location: ./application/controllers/autocomplete.php */